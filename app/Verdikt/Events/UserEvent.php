<?php


namespace Verdikt\Events;


class UserEvent extends EventDispatcher {

    const LOGIN_EVENT  = 'user.login';
    const LOGOUT_EVENT = 'user.logout';

} 