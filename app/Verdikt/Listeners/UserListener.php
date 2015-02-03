<?php


namespace Verdikt\Listeners;


use Verdikt\Helpers\PermissionUtils;

class UserListener extends BaseListener {

    /**
     * @var array[
     * 'user.login'=>[
     *      'action'=>'handleLogin',
     *      'priority'=>0
     *  ]
     * ]
     *
     */
    protected $events = [
        'user.login' => [
            'action'   => 'handleLogin',
            'priority' => 0,
        ],
        'user.logout' => [
            'action'   => 'handleLogOut',
            'priority' => 0,
        ]
    ];


    public function handleLogin($model)
    {

        $areaServices = [];
        foreach ($model->role->permissions as $permission)
        {
            $areaServices[] = $permission->service->action;
        }

        PermissionUtils::setArea($areaServices);
        PermissionUtils::setDisplayAllStatus();

    }

    public function handleLogOut($model)
    {
        PermissionUtils::forgotArea();
        PermissionUtils::forgotDisplayAllStatus();
    }
} 