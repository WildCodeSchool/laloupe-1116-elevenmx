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
        $builder->add('titreProjet', null, array('label' => 'Nom du projet'))
                ->add('user', EntityType::class, array(
                        'label' => 'Nom de l\'utilisateur',
                        'class' => 'ElevenmxBundle\Entity\User',
                        'property' => 'username',
                        'query_builder' => function (EntityRepository $er) {
                            return $er->createQueryBuilder('m')
                                ->orwhere('m.categorie like :categorie')
                                ->orderBy('m.username', 'ASC')
                                ->setParameter('categorie', 'client') ;
                        },
                        'choice_label' => 'username',
                        'choices_as_values' => true,
                    ))
                ->add('marque')
                ->add('produit')
                ->add('nomGraphiste', EntityType::class, array(
                    'label' => 'Nom du Graphiste',
                    'class' => 'ElevenmxBundle\Entity\User',
                    'property' => 'username',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('m')
                            ->orwhere('m.categorie like :categorie')
                            ->orderBy('m.username', 'ASC')
                            ->setParameter('categorie', 'graphiste') ;
                    },
                    'choice_label' => 'username',
                    'choices_as_values' => true,
                ))
            ->add('dateCreationProjet', null, array('label' => 'Date de création du projet'))
            ->add('status')
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
