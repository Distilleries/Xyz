<?php


namespace Verdikt\Controllers;

use \File, \Config, \View, \Input, \Redirect, \Validator;
use Verdikt\Contracts\StateDisplayerContract;
use Verdikt\Models\BaseModel;

class AdminModelBaseController extends AdminBaseController {

    /**
     * @var Eloquant $model
     * Injected by the constructor
     */
    protected $model;


    // ------------------------------------------------------------------------------------------------

    public function __construct(BaseModel $model, StateDisplayerContract $stateProvider)
    {
        parent::__construct($stateProvider);
        $this->model         = $model;
    }

    // ------------------------------------------------------------------------------------------------

    /**
     * @return Eloquant
     */
    public function getModel()
    {
        return $this->model;
    }

    // ------------------------------------------------------------------------------------------------

    /**
     * @param Eloquant $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }


    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------

    public function putDestroy()
    {
        $data = $this->model->find(Input::get('id'));
        $data->delete();

        $validation = Validator::make(Input::all(), [
            'id'=>'required'
        ]);
        if ($validation->fails())
        {
            $this->hasError = true;
        }



        return Redirect::to(action(get_class($this).'@getIndex'));
    }

    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------

} 