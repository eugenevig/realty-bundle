<?php

namespace App\RealtyBundle\Admin;

use App\RealtyBundle\Entity\Project;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class ProjectAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('internalId')
            ->add('externalId')
            ->add('name')
            ->add('description')
            ->add('gallery', null, ['required' => false])
            ->add('seoTitle', null, ['required' => false])
            ->add('seoDescription', null, ['required' => false])
            ->add('slug', null, ['required' => false])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('internalId')
            ->add('name')
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('name')
            ->add('internalId')
            ->add('externalId')
        ;
    }
}
