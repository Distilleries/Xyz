<?php
/**
 * Plugin.php
 *
 * Copyright 2003-2013, Moxiecode Systems AB, All rights reserved.
 */

if (session_id() == '') {
    @session_start();
}

/**
 * This class handles MoxieManager SessionAuthenticator stuff.
 */
class MOXMAN_ExternalAuthenticator_Plugin implements MOXMAN_Auth_IAuthenticator {
    const AUTH_USER = "moxiemanager.auth.user";

	public function authenticate(MOXMAN_Auth_User $user) {
		$config = MOXMAN::getConfig();
        $this->validateConfig($config);
		$json = $this->getJson($config);
        $this->updateUserAndConfig($this->parseJson($json), $user, $config);
        $this->cacheJsonResult($json);

		return true;
	}

    private function validateConfig(MOXMAN_Util_Config $config) {
        $secretKey = $config->get("ExternalAuthenticator.secret_key");
		$authUrl = $config->get("ExternalAuthenticator.external_auth_url");

		if (!$secretKey || !$authUrl) {
			throw new MOXMAN_Exception("No key/url set for ExternalAuthenticator, check config.");
		}
    }

    private function cacheJsonResult($json) {
		$_SESSION["moxiemanager.auth.time"] = time();
        $_SESSION["moxiemanager.auth.json"] = $json;
    }

    private function updateUserAndConfig($result, MOXMAN_Auth_User $user, MOXMAN_Util_Config $config) {
		if ($result["user"]) {
			$config->replaceVariable("user", $result["user"]);
			$user->setName($result["user"]);
		}

        $config->extend($result["config"]);
    }

    private function getJson(MOXMAN_Util_Config $config) {
        $json = "";

        // Use cached auth state valid for 5 minutes
		if (isset($_SESSION["moxiemanager.auth.time"]) && (time() - $_SESSION["moxiemanager.auth.time"]) < 60 * 5) {
            $json = $_SESSION["moxiemanager.auth.json"];
		}

        if (!$json) {
            $json = $this->sendRequest($config);
        }

        return $json;
    }

    private function sendRequest(MOXMAN_Util_Config $config) {
        $secretKey = $config->get("ExternalAuthenticator.secret_key");
		$authUrl = $config->get("ExternalAuthenticator.external_auth_url");
        $url = "";
        $defaultPort = 80;

		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") {
			$url = "https://";
			$defaultPort = 443;
		}

		$url .= $_SERVER['HTTP_HOST'];

		if ($_SERVER['SERVER_PORT'] != $defaultPort) {
			$url .= ':' . $defaultPort;
		}

        $httpClient = new MOXMAN_Http_HttpClient($url);
		$httpClient->setProxy($config->get("general.http_proxy", ""));

		$authUrl = MOXMAN_Util_PathUtils::toAbsolute(dirname($_SERVER["REQUEST_URI"]) . '/plugins/ExternalAuthenticator', $authUrl);
		$request = $httpClient->createRequest($authUrl, "POST");

		$authUser = $config->get("ExternalAuthenticator.basic_auth_user");
		$authPw = $config->get("ExternalAuthenticator.basic_auth_password");
		if ($authUser && $authPw) {
			$request->setAuth($authUser, $authPw);
		}

		$cookie = isset($_SERVER["HTTP_COOKIE"]) ? $_SERVER["HTTP_COOKIE"] : "";
		if ($cookie) {
			$request->setHeader('cookie', $cookie);
		}

		$seed = hash_hmac('sha256', $cookie . uniqid() . time(), $secretKey);
		$hash = hash_hmac('sha256', $seed, $secretKey);

		$response = $request->send(array(
			"seed" => $seed,
			"hash" => $hash
		));

		if ($response->getCode() < 200 || $response->getCode() > 399) {
			throw new MOXMAN_Exception("Did not get a proper http status code from Auth url: " . $url . $authUrl . ".", $response->getCode());
		}

		return $response->getBody();
    }

    private function parseJson($json) {
        $config = array();
        $user = null;
        $json = json_decode($json, true);

        if (!$json) {
            throw new MOXMAN_Exception("Generic unknown error, did not get a proper JSON response from Auth url.");
        } else if (isset($json["error"])) {
            throw new MOXMAN_Exception($json["error"]["message"] . " - ". $json["error"]["code"]);
        }

        foreach ($json["result"] as $key => $value) {
            $config[$key] = $value;
        }

        if (isset($json["result"][self::AUTH_USER])) {
            $user = $json["result"][self::AUTH_USER];
        }

        return array(
            "config" => $config,
            "user" => $user
        );
    }
}

MOXMAN::getAuthManager()->add("ExternalAuthenticator", new MOXMAN_ExternalAuthenticator_Plugin());

?>
