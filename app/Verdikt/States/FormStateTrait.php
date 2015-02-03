<?php


namespace Verdikt\States;

use \View, \FormBuilder, \Input, \Redirect;

trait FormStateTrait {

    /**
     * @var EloquentDatatable $datatable
     * Injected by the constructor
     */
    protected $form;


    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------

    public function getEdit($id = '')
    {
        $model = (!empty($id)) ? $this->model->findOrFail($id) : $this->model;
        $form  = FormBuilder::create(get_class($this->form), [
            'model' => $model
        ]);


        $form_content = View::make('admin.form.components.formgenerator.full', [
            'form' => $form
        ]);
        $content      = View::make('admin.form.state.form', [

        ]);

        $this->addToLayout($form_content, 'form');
        $this->addToLayout($content, 'content');

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

        $primary = Input::get($this->model->getKeyName());
        if (empty($primary))
        {
            $this->model->create(Input::only($this->model->getFillable()));
        } else
        {
            $this->model = $this->model->find($primary);
            $this->model->update(Input::only($this->model->getFillable()));
        }

        return Redirect::to(action(get_class($this) . '@getIndex'));

    }


    // ------------------------------------------------------------------------------------------------

    public function getView($id)
    {
        $model = (!empty($id)) ? $this->model->findOrFail($id) : $this->model;
        $form  = FormBuilder::create(get_class($this->form), [
            'model' => $model
        ]);


        $action       = explode('@', \Route::currentRouteAction());
        $form_content = View::make('admin.form.components.formgenerator.info', [
            'form'  => $form,
            'id'    => $id,
            'route' => !empty($action) ? $action[0] . '@' : '',
        ]);
        $content      = View::make('admin.form.state.form', [

        ]);

        $this->addToLayout($form_content, 'form');
        $this->addToLayout($content, 'content');

    }


} 