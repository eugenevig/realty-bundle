<?php

namespace App\RealtyBundle\Admin;

use App\RealtyBundle\Entity\AttributeValue;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

class AttributeValueAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('attribute', ModelType::class)
            ->add('realEstateObject', ModelType::class)
            ->add('value')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter->add('attribute')->add('realEstateObject');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('id')
            ->add('value')
            ->add('attribute')
            ->add('realEstateObject')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'edit' => [],
                    'delete' => []
                ]
            ]);
    }

    protected function configureRoutes(\Sonata\AdminBundle\Route\RouteCollectionInterface $collection): void
    {
        $collection->remove('show');
    }
}
