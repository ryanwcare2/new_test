<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: sash
 * Date: 27.06.19
 * Time: 14:26
 */

namespace App\Forms;


use App\Entity\PetitionOutputFormat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetitionOutputFormatType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isTitlePresent', CheckboxType::class, [
                'mapped' => true,
                'required' => false
            ])
            ->add('isLinkPresent', CheckboxType::class, [
                'mapped' => true,
                'required' => false
            ])
            ->add('isDescriptionPresent', CheckboxType::class, [
                'mapped' => true,
                'required' => false
            ])
            ->add('isPetitionIDPresent', CheckboxType::class, [
                'mapped' => true,
                'required' => false
            ])
            ->add('isSignatureCountPresent', CheckboxType::class, [
                'mapped' => true,
                'required' => false
            ])
            ->add('isSummaryPresent', CheckboxType::class, [
                'mapped' => true,
                'required' => false
            ])
            ->add('download', SubmitType::class, ['label' => 'Download CSV'])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'data_class' => PetitionOutputFormat::class
        ]);
    }
}