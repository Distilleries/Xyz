<?php

namespace Verdikt\Controllers\Admin;

use Verdikt\Contracts\StateDisplayerContract;
use Verdikt\Controllers\AdminBaseComponent;
use Verdikt\Controllers\AdminModelBaseController;
use Verdikt\Datatables\User\UserDatatable;
use \User, \Auth;
use Verdikt\Forms\User\UserForm;

class UserController extends AdminBaseComponent {

    public function __construct(User $model, StateDisplayerContract $stateProvider, UserDatatable $datatable, UserForm $form)
    {
        parent::__construct($model, $stateProvider);
        $this->datatable = $datatable;
        $this->form      = $form;
    }



    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------


    public function getProfile()
    {
        return $this->getEdit(Auth::administrator()->get()->getKey());
    }

    // ------------------------------------------------------------------------------------------------

    public function postProfile()
    {
        $this->postEdit();

        return $this->getProfile();
    }

    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------


}