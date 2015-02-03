<?php

namespace Verdikt\Controllers\Admin;

use Verdikt\Contracts\StateDisplayerContract;
use Verdikt\Controllers\AdminBaseComponent;
use Verdikt\Controllers\AdminModelBaseController;
use Verdikt\Datatables\Email\EmailDatatable;
use \Email;
use Verdikt\Forms\Email\EmailForm;

class EmailController extends AdminBaseComponent {

    public function __construct(Email $model, StateDisplayerContract $stateProvider, EmailDatatable $datatable, EmailForm $form)
    {
        parent::__construct($model, $stateProvider);
        $this->datatable = $datatable;
        $this->form      = $form;
    }



    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------


}