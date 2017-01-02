<?php
namespace ElevenmxBundle\Form;

use FOS\UserBundle\Util\LegacyFormHelper;
use ElevenmxBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /**
             * @Assert\Regex(pattern="/(^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$)/")
             */
            ->add('email', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\EmailType'), array(
                'label' => 'E-mail :',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('username', null, array(
                'label' => 'Code Utilisateur : ',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('plain_password', 'password', array(
                'label' => 'Mot de Passe : '
            ))
            ->add('nom', TextType::class, array(
                'attr' => array (
                    'placeholder' => 'nom',
                )))
            ->add('prenom', TextType::class, array(
                'attr' => array (
                    'placeholder' => 'prenom',
                )))
            ->add('telephone')
            ->add('entreprise', TextType::class, array (
                'attr' => array (
                    'placeholder' => 'entreprise'

                )))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ElevenmxBundle\Entity\User'
        ));
    }
}
