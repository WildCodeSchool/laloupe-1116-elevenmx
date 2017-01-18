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
                ->add('user')
                ->add('marque')
                ->add('produit', ChoiceType::class, array(
                    'choices'  => array(
                        'Casque' => 'Casque',
                        'Combinaison' => 'Combinaison',
                        'Moto' => 'Moto',
                    ),
                    // *this line is important*
                    'choices_as_values' => true,
                ))
                ->add('nomGraphiste', ChoiceType::class, array(
                    'choices'  => array(
                        'Nico' => 'Nico',
                        'Ludo' => 'Ludo',
                        'Max' => 'Max',
                        'Yannick' => 'Yannick',
                    ),
                    // *this line is important*

                    'choices_as_values' => true,))
//                ->add('status');

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
