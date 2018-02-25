<?php

/*
 * Appytrac API
 * (c) MesierAS <i@gobinath.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * Github : https://github.com/mesieras/appytrac-api
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DogType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', TextType::class)
            ->add('type', TextType::class)
            ->add('age', IntegerType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'data_class' => 'App\Entity\Dog',
            'allow_extra_fields' => true,
        ));
    }

    public function getName() {
        return 'dog';
    }
}
