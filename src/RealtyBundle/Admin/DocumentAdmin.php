<?php

namespace App\RealtyBundle\Admin;

use App\RealtyBundle\Entity\Document;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\Type\ModelType;

class DocumentAdmin extends AbstractAdmin
{

    protected function configureRoutes(\Sonata\AdminBundle\Route\RouteCollectionInterface $collection): void
    {
        $collection->remove('show');
    }

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('realEstateObject', ModelType::class)
            ->add('title')
            ->add('filePath')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('realEstateObject')
            ->add('title')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('id')
            ->add('title')
            ->add('realEstateObject')
            ->add('filePath')
            ->add(ListMapper::NAME_ACTIONS, null, [
                'actions' => [
                    'edit' => [],
                    'delete' => []
                ]
            ]);
    }
}
