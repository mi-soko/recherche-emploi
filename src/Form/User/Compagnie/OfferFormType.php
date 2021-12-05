<?php


namespace App\Form\User\Compagnie;


use App\Entity\Job\Categories;
use App\Entity\Job\Experience;
use App\Entity\Job\Offer;
use App\Entity\Job\Skills;
use App\Repository\Job\CategoriesRepository;
use App\Repository\Job\SkillsRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfferFormType extends AbstractType
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

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('jobDescription',CKEditorType::class);

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

        $builder->add("experienceLevels",HiddenType::class);
        $builder->add("title",TextType::class,[
            'attr' => [
                'id' => 'cv_form_experienceLevels',
            ]
        ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
            'allow_extra_fields'=> true,
        ]);
    }
}
