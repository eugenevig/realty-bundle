<?php

namespace App\RealtyBundle\Admin;

use App\RealtyBundle\Entity\RealEstateObject;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

class RealEstateObjectAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('building', ModelType::class)
            ->add('type', null, ['required' => false])
            ->add('internalId')
            ->add('externalId', null, ['required' => false])
            ->add('name')
            ->add('description', null, ['required' => false])
            ->add('objectId')
            ->add('floor', null, ['required' => false])
            ->add('orientation', null, ['required' => false])
            ->add('areaTotal', null, ['required' => false])
            ->add('ceilingHeight', null, ['required' => false])
            ->add('price', null, ['required' => false])
            ->add('pricePerSqm', null, ['required' => false])
            ->add('discount', null, ['required' => false])
            ->add('discountValidUntil', null, ['widget' => 'single_text', 'required' => false])
            ->add('currency', null, ['required' => false])
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('name')
            ->add('internalId')
            ->add('building')
            ->add('floor')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('name')
            ->add('internalId')
            ->add('building')
            ->add('price')
            ->add('status', null, ['required' => false])
        ;
    }
}
