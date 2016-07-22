<?php

namespace App\Http\Middleware;

use Closure;
use Distilleries\Expendable\Models\Language;
use Illuminate\Contracts\Foundation\Application;

class LanguageDetector
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        preg_match_all('/(\W|^)([a-z]{2})([^a-z]|$)/six', $request->server->get('HTTP_ACCEPT_LANGUAGE'), $m, PREG_PATTERN_ORDER);
        $userLangs = $m[2];

        if (! empty($userLangs[0])) {
            $total = Language::where('iso', '=', $userLangs[0])->count();

            if ($total > 0) {
                return redirect()->to('/' . $userLangs[0]);
            }
        }

        return redirect()->to('/fr');
    }
}