<?php namespace App\Datatables;

use Distilleries\DatatableBuilder\EloquentDatatable;

class PostDatatable extends EloquentDatatable
{
    public function build()
    {
        $this
            ->add('id',null,trans('datatable.id'))
            ->add('libelle',null,trans('datatable.libelle'));

        $this->addDefaultAction();

    }
}
