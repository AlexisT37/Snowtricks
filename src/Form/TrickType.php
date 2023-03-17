<?php

namespace App\Form;

use App\Entity\Trick;
use App\Form\ImageLinkType;
use App\Form\VideoLinkType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('trickgroup')
            ->add('imagelinks', CollectionType::class, [
                'entry_type' => ImageLinkType::class,
                // No label for the image links
                'entry_options' => ['label' => false],
                // allows the user to add as many image links as they want
                'allow_add' => true,
            ])
            ->add('videolinks', CollectionType::class, [
                'entry_type' => VideoLinkType::class,
                // No label for the image links
                'entry_options' => ['label' => false],
                // allows the user to add as many video links as they want
                'allow_add' => true,
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
