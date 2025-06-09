<?php

namespace App\RealtyBundle\Admin;

use App\RealtyBundle\Entity\Attribute;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class AttributeAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('name')
            ->add('inputType', ChoiceType::class, [
            'choices' => [
                'Text' => 'text',
                'Textarea' => 'textarea',
                'Number' => 'number',
                'Checkbox' => 'checkbox',
                'Select (Single)' => 'select',
                'Multi-select' => 'multiselect',
                'Date' => 'date',
            ],
            'placeholder' => 'Select input type',
        ])
            ->add('isFilterable')
            ->add('sortOrder', null, ['required' => false])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter->add('name')->add('isFilterable');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list
            ->addIdentifier('id')
            ->add('name')
            ->add('inputType', ChoiceType::class, [
                'choices' => [
                    'Text' => 'text',
                    'Textarea' => 'textarea',
                    'Number' => 'number',
                    'Checkbox' => 'checkbox',
                    'Select (Single)' => 'select',
                    'Multi-select' => 'multiselect',
                    'Date' => 'date',
                ],
            'placeholder' => 'Select input type',
            ])
            ->add('isFilterable', null, [
                'editable' => true,
            ])
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



