<?php

namespace App\Form;

use App\Entity\Pin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

use  Symfony\Component\Form\Extension\Core\Type\TextType;
use  Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class) // autofocus to autoselect:  null, [ 'attr' => ['autofocus' => true] ]
            ->add('description', TextareaType::class) // textarea no of rows & columns : ,  null, ['attr' => ['rows' => 10, 'cols' => 50]]
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image (JPG or PNG file)',
                'required' => false,
                'allow_delete' => true,
                'delete_label' => 'Delete?',
                // 'download_label' => 'Download',
                'download_uri' => false,
                'imagine_pattern' => 'squared_thumbnail_small',
                // 'image_uri' => true,
                // 'asset_helper' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pin::class,
        ]);
    }
}
