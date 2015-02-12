<?php namespace Xyz\Datatables;


use Distilleries\DatatableBuilder\EloquentDatatable;

class CountryDatatable extends EloquentDatatable
{
    public function build()
    {
        $this
            ->add('id',null,_('Id'))
            ->add('libelle',null,_('Libelle'));

        $this->addDefaultAction();

    }
}
