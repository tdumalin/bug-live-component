<?php

namespace App\Component;

use App\Form\Type\DemoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;

#[AsLiveComponent('form_component')]
class FormComponent extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;


    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(DemoType::class);
    }
}
