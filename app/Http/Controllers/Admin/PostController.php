<?php namespace App\Http\Controllers\Admin;

use Distilleries\Expendable\Contracts\LayoutManagerContract;
use Distilleries\Expendable\Http\Controllers\Admin\Base\BaseComponent;
use App\Forms\PostForm;
use App\Datatables\PostDatatable;

class PostController extends BaseComponent {

    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------

    public function __construct(PostDatatable $datatable, PostForm $form, \App\Post $model, LayoutManagerContract $layoutManager)
    {
       parent::__construct($model, $layoutManager);
       
       $this->datatable = $datatable;
       $this->form      = $form;
    }
}