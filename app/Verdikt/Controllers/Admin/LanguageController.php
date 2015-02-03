<?php


namespace Verdikt\Controllers\Admin;


use Verdikt\Contracts\StateDisplayerContract;
use Verdikt\Controllers\AdminBaseComponent;
use Verdikt\Datatables\Language\LanguageDatatable;
use Verdikt\Forms\Language\LanguageForm;

class LanguageController  extends AdminBaseComponent {

    public function __construct(\Language $model, StateDisplayerContract $stateProvider, LanguageDatatable $datatable, LanguageForm $form)
    {
        parent::__construct($model, $stateProvider);
        $this->datatable = $datatable;
        $this->form      = $form;
    }



    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------


}