<?php
namespace ElevenmxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class MailType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                'attr' => array (
                    'placeholder' => 'nom',
                )))
            ->add('prenom', TextType::class, array(
                'attr' => array (
                    'placeholder' => 'prenom',
                )))
            ->add('mail')
            ->add('telephone')
            ->add('entreprise', TextType::class, array (
                'attr' => array (
                    'placeholder' => 'entreprise'
                )))
            ->add('login', TextType::class, array (
                'attr' => array (
                    'placeholder' => 'login'
                )))
            ->add('password', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'password'
                )))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ElevenmxBundle\Entity\Mail'
        ));
    }
}
