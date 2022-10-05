<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\UX\LiveComponent\Form\Type\LiveCollectionType;

class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DatePickerType::class, [])
            ->add('select', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'value1' => 'value1',
                    'value2' => 'value2',
                ]
            ])
            ->add('items', LiveCollectionType::class, [
                'entry_type' => CollectionItemType::class,
            ]);
    }
}
