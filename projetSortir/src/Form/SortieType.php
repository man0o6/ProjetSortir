<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Etat;
use App\Entity\Lieu;
use App\Entity\Sortie;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',
            TextType::class,
            ['label'=>'Nom de la sortie'])
            ->add('dateHeureDebut',
            DateType::class,
            ['label'=>'Date et heure de la sortie'])
            ->add('dateLimiteInscription',
            DateType::class,
                ['label'=>'Date Limite d\'inscription'])
            ->add('nbInscriptionsMax',
            NumberType::class,
                ['label'=>''])
            ->add('duree',
                NumberType::class,
                ['label'=>'Durée'])
            ->add('infosSortie',
            TextareaType::class,
                ['label'=>'Description et infos'])
            ->add('campus',
            EntityType::class,
            ['class'=>Campus::class,

                'label'=>'Campus',
                'choice_label'=>'nom'])
            ->add('lieu',
                EntityType::class,
            ['class'=>Lieu::class,
                'label'=>'Lieu',
                'choice_label'=>'nom'])
            ->add('enregistrer', SubmitType::class, ['label' => 'Enregistrer'])
            ->add('publier', SubmitType::class, ['label' => 'Publier'])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
