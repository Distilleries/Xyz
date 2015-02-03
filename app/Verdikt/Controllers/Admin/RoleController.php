<?php


namespace Verdikt\Controllers\Admin;

use Verdikt\Contracts\StateDisplayerContract;
use Verdikt\Controllers\AdminBaseComponent;
use Verdikt\Datatables\Role\RoleDatatable;
use \FormBuilder, \View;
use Verdikt\Forms\Role\RoleForm;


class RoleController extends AdminBaseComponent {

    public function __construct(\Role $model, StateDisplayerContract $stateProvider, RoleDatatable $datatable, RoleForm $form)
    {
        parent::__construct($model, $stateProvider);
        $this->datatable = $datatable;
        $this->form      = $form;
    }


    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------


}