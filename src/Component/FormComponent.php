<?php

namespace App\Component;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('form_component')]
class FormComponent extends AbstractController
{
    use DefaultActionTrait;
    use ComponentWithFormTrait;


    #[LiveProp(fieldName: 'data')]
    public ?array $data = [];

    protected function instantiateForm(): FormInterface
    {
        return $this->createFormBuilder($this->data)
            ->add('date', DateType::class, [
                'format' => 'yyyy-MM-dd',
                'html5' => false,
                'widget' => 'single_text',
                'attr' => [
                    'data-datepicker-target' => 'input'
                ]
            ])
            ->add('select', ChoiceType::class, [
                'choices' => [
                    'value1' => 'value1',
                    'value2' => 'value2',
                ]
            ])
            ->getForm();
    }
}
