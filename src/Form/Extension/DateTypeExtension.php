<?php

namespace App\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateTypeExtension extends AbstractTypeExtension
{

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

    /**
     * Returns an array of extended types.
     */
    public static function getExtendedTypes(): iterable
    {
        // return [FormType::class] to modify (nearly) every field in the system
        return [DateType::class, DateTimeType::class];
    }
}
