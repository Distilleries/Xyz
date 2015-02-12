<?php

namespace Admin;


class UserController extends \Distilleries\Expendable\Controllers\Admin\UserController {


    public function postCustomerSearch()
    {
        $role = \Role::customer()->get()->last();

        return $this->searchWithRole($role->id);
    }

    public function postClinicSearch()
    {

        $role = \Role::clinic()->get()->last();

        return $this->searchWithRole($role->id);

    }

    protected function searchWithRole($role)
    {
        $this->model = $this->model->where('role_id', '=', $role);

        return $this->postSearch();
    }
}