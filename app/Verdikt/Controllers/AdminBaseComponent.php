<?php


namespace Verdikt\Controllers;


use Verdikt\Contracts\DatatableStateContract;
use Verdikt\Contracts\FormStateContract;
use Verdikt\States\DatatableStateTrait;
use Verdikt\States\FormStateTrait;

class AdminBaseComponent extends AdminModelBaseController implements DatatableStateContract, FormStateContract  {

    use DatatableStateTrait;
    use FormStateTrait;

    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------

    public function getIndex()
    {
        return $this->getIndexDatatable();
    }

} 