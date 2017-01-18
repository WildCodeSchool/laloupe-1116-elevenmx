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
                ->add('client', ChoiceType::class, array(
                    'choices'  => array(
                        'Who' => true,
                        'Whoo' => true,
                        'Whooo' => true,
                        'Whoooo' => true,
                    ),
                    // *this line is important*
                    'choices_as_values' => true,
                ))
                /*->add('client', EntityType::class, array(
                    'class' => 'ElevenmxBundle\Entity\User',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->orWhere('u.categorie like :client')
                            ->orderBy('u.nom', 'ASC')
                            ->setParameter('client', 'client') ;
                    },
                    'choice_label' => 'nom',
                    'choices_as_values' => true,
                ))*/
/*//                ->add('marque')*/
                /*->add('marque', EntityType::class, array(
                    'class' => 'ElevenmxBundle\Entity\Marque',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('m')
                            ->orderBy('m.nom', 'ASC');
                    },
                    'choice_label' => 'nom',
                    'choices_as_values' => true,
                ))*/
                ->add('produit', ChoiceType::class, array(
                    'choices'  => array(
                        'Casque' => true,
                        'Combinaison' => true,
                        'Moto' => true,
                    ),
                    // *this line is important*
                    'choices_as_values' => true,
                ))
                /*->add('produit', EntityType::class, array(
                    'class' => 'ElevenmxBundle\Entity\Produit',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('p')
                            ->orderBy('p.nom', 'ASC');
                    },
                    'choice_label' => 'nom',
                    'choices_as_values' => true,
                ))*/
                ->add('nomGraphiste', ChoiceType::class, array(
                    'choices'  => array(
                        'Nico' => true,
                        'Ludo' => true,
                        'Max' => true,
                        'Yannick' => true,
                    ),
                    // *this line is important*
                    'choices_as_values' => true,))
                ->add('status')
                /*->add('nomGraphiste', EntityType::class, array(
                    'class' => 'ElevenmxBundle\Entity\User',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('n')
                            ->orWhere('n.categorie like :graph')
                            ->orderBy('n.nom', 'ASC')
                            ->setParameter('graph', 'graphiste') ;
                    },
                    'choice_label' => 'nom',
                    'choices_as_values' => true,
                ))*/
        ;
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
