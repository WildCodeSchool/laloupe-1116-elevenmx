<?php

namespace ElevenmxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

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
                /*->add('marque', EntityType::class, array(
                    'class' => 'ElevenmxBundle\Entity\Marque',
                    'property' => 'nom_marque',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('m')
                            ->orderBy('m.nom', 'ASC');
                    },
                    'choice_label' => 'nom',
                    'choices_as_values' => true,
                ))*/
                ->add('produit')
                /*->add('produit', ChoiceType::class, array(
                    'choices'  => array(
                        'Casque' => 'Casque',
                        'Combinaison' => 'Combinaison',
                        'Moto' => 'Moto',
                    ),
                    // *this line is important*
                    'choices_as_values' => true,
                ))*/
                ->add('nomGraphiste', ChoiceType::class, array(
                    'choices'  => array(
                        'Nico' => 'Nico',
                        'Ludo' => 'Ludo',
                        'Max' => 'Max',
                        'Yannick' => 'Yannick',
                    ),
                    // *this line is important*

                    'choices_as_values' => true,));
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
