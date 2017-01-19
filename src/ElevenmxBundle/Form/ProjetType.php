<?php

namespace ElevenmxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProjetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titreProjet')
                ->add('client', ChoiceType::class, array(
                    'choices'  => array(
                        'Client' => true,
                        'Cliente' => true,
                        'Cliient' => true,
                        'Cliiente' => true,
                    ),
                    // *this line is important*
                    'choices_as_values' => true,
                ))
                ->add('marque')
                ->add('produit', ChoiceType::class, array(
                    'choices'  => array(
                        'Casque' => true,
                        'Combinaison' => true,
                        'Moto' => true,
                    ),
                    // *this line is important*
                    'choices_as_values' => true,
                ))
                ->add('nomGraphiste', ChoiceType::class, array(
                    'choices'  => array(
                        'Nico' => true,
                        'Ludo' => true,
                        'Max' => true,
                        'Yannick' => true,
                    ),
                    // *this line is important*
                    'choices_as_values' => true,))
                ->add('dateCreationProjet');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ElevenmxBundle\Entity\Projet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'elevenmxbundle_projet';
    }


}
