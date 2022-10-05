<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DatePickerType extends AbstractType
{

    public function getParent()
    {
        return DateType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'widget' => 'single_text',
            'format' => 'dd/MM/yyyy',
            'html5' => false,
        ]);

        $resolver->setNormalizer('attr', function (Options $options, $value) {
            return array_merge($value, [
                'autocomplete' => 'off',
                'data-datepicker-target' => 'input',

            ]);
        });
    }
}
