<?php

namespace App\Http\Datatables;

use Distilleries\DatatableBuilder\EloquentDatatable;

class LaguageDatatable extends EloquentDatatable
{
    public function build()
    {
        $this
            ->add('id', null, trans('datatable.id'));

        $this->addDefaultAction();
    }
}
