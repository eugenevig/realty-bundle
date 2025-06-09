<?php

namespace App\RealtyBundle\Admin;

use App\RealtyBundle\Entity\Building;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

class BuildingAdmin extends AbstractAdmin
{

    protected function configureRoutes(\Sonata\AdminBundle\Route\RouteCollectionInterface $collection): void
    {
        $collection->remove('show');
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('externalId')
            ->add('section')
            ->add('buildingNumber')            ->add('street')
            ->add('coordinates', null, ['required' => false])
            ->add('buildingType', null, ['required' => false])
            ->add('yearBuilt', null, ['widget' => 'single_text'])
            ->add('plannedDeliveryDate', null, ['widget' => 'single_text'])
            ->add('gallery', null, ['required' => false])
            ->add('project', ModelType::class)
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('buildingNumber')        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('id')
            ->add('buildingNumber')            ->add('project')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'edit' => [],
                    'delete' => []
                ]
            ]);
    }
}
