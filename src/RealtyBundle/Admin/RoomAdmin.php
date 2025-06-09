<?php

namespace App\RealtyBundle\Admin;

use App\RealtyBundle\Entity\Room;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

class RoomAdmin extends AbstractAdmin
{

    protected function configureRoutes(\Sonata\AdminBundle\Route\RouteCollectionInterface $collection): void
    {
        $collection->remove('show');
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('realEstateObject', ModelType::class)
            ->add('roomDefinition', ModelType::class)
            ->add('customName', null, ['required' => false])
            ->add('area', null, ['required' => false])
            ->add('gallery', null, ['required' => false])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter->add('realEstateObject')->add('roomDefinition');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('id')
            ->addI('customName')
            ->add('realEstateObject')
            ->add('roomDefinition')
            ->add('area')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'edit' => [],
                    'delete' => []
                ]
            ]);
    }
}
