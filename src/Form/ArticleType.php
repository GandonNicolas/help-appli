<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Keyword;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('content')
            ->add('image')
            ->add('createDate')
            ->add('Keywords', EntityType::class,
            [
                'class' => Keyword::class,
                'choice_label' => 'label',
                'multiple' => 'true',
                'required' => 'false'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
