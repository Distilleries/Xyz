<?php namespace Admin;

use Distilleries\Expendable\Contracts\StateDisplayerContract;
use Distilleries\Expendable\Controllers\AdminBaseComponent;
use Xyz\Datatables\CountryDatatable;
use Xyz\Forms\CountryForm;


class CountryController extends AdminBaseComponent {

    public function __construct(\Country $model, StateDisplayerContract $stateProvider, CountryDatatable $datatable, CountryForm $form)
    {
        parent::__construct($model, $stateProvider);
        $this->datatable = $datatable;
        $this->form      = $form;
    }



    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------


}