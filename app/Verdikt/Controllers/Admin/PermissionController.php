<?php


namespace Verdikt\Controllers\Admin;


use \Permission, \Redirect, \Input, \FormBuilder;
use Verdikt\Contracts\FormStateContract;
use Verdikt\Contracts\StateDisplayerContract;
use Verdikt\Controllers\AdminModelBaseController;
use Verdikt\Forms\Permission\PermissionForm;
use Verdikt\States\FormStateTrait;

class PermissionController extends AdminModelBaseController implements FormStateContract {

    use FormStateTrait;


    public function __construct(Permission $model, StateDisplayerContract $stateProvider, PermissionForm $form)
    {
        parent::__construct($model, $stateProvider);
        $this->form = $form;
    }




    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------

    public function getIndex()
    {
        return Redirect::to(action(get_class($this) . '@getEdit'));
    }

    // ------------------------------------------------------------------------------------------------

    public function postEdit()
    {


        $form = FormBuilder::create(get_class($this->form), [
            'model' => $this->model
        ]);


        if ($form->hasError())
        {
            return $form->validateAndRedirectBack();
        }

        $permissions = Input::get('permission');
        $this->model->truncate();


        foreach($permissions as $role_id=>$permission){

            foreach($permission as $service_id){
                $permModel = new $this->model;
                $permModel->role_id = $role_id;
                $permModel->service_id = $service_id;
                $permModel->save();
            }
        }


        return Redirect::to(action(get_class($this).'@getIndex'));

    }

    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------


}