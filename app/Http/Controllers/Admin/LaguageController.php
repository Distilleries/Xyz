<?php namespace App\Http\Controllers\Admin;

use Distilleries\Expendable\Contracts\LayoutManagerContract;
use Distilleries\Expendable\Http\Controllers\Backend\Base\BaseComponent;
use App\Http\Forms\LaguageForm;
use App\Http\Datatables\LaguageDatatable;

class LaguageController extends BaseComponent {

    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------

    public function __construct(LaguageDatatable $datatable, LaguageForm $form, \App\User $model, LayoutManagerContract $layoutManager)
    {
       parent::__construct($model, $layoutManager);
       
       $this->datatable = $datatable;
       $this->form      = $form;
    }
}