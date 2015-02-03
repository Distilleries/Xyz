<?php namespace Verdikt\Datatables\Service;

use Verdikt\Datatables\EloquentDatatable;

class ServiceDatatable extends EloquentDatatable
{
    public function build()
    {
        $this
            ->add('id',null,_('Id'))
            ->add('action',null,_('Action'));

        $this->addDefaultAction();

    }
}
