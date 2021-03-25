<?php

declare(strict_types=1);

namespace App\Form\User\JobSeeker;


use App\Entity\Job\Categories;
use App\Entity\Job\Cv;
use App\Entity\Job\Skills;
use App\Repository\Job\CategoriesRepository;
use App\Repository\Job\SkillsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CvFormType extends AbstractType
{

    private CategoriesRepository $categoriesRepository;
    /**
     * @var SkillsRepository
     */
    private SkillsRepository $skillsRepository;

    public function __construct(CategoriesRepository $categoriesRepository,SkillsRepository $skillsRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->skillsRepository = $skillsRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options):void
    {
        $builder->add("categories",EntityType::class,[
            'required' => true,
            'class' => Categories::class,
            'placeholder' => 'choisir votre categories',
            'choices' => $this->categoriesRepository->findAll(),
            'choice_label' => 'name',
        ]);

        $builder->add("skills",EntityType::class,[
            'class' => Skills::class,
            'multiple' => true,
            'placeholder' => 'choisir votre categories',
            'choice_label' => 'name',
            'choices' => $this->skillsRepository->findAll(),
        ]);


        $builder->add("profileTitle", TextType::class,[
            'attr' => [
                'placeholder' => 'Ex: Développeur PHP senior,Ingénieur en Reseau',
            ]
        ]);

            $builder->add("phoneNumber", TextType::class,[
                'attr' => [
                    'placeholder' => 'Ex: 772199737 ',
                ]
            ])
            ->add("address", TextType::class,[
                'attr' => [
                    'placeholder' => 'Ex: Dakar Fann Hock',
                ]
            ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cv::class,
            "allow_extra_fields" => true
        ]);
    }

}
