<?php


namespace App\Form\User\JobSeeker;


use App\Entity\Job\Experience;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExperienceFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('compagnieName',TextType::class);
       $builder->add('posteOccupe',TextType::class,[
           'attr' => [
               'placeholder' => "Ex: Developer Senior, IT Manager ........"
           ]
       ]);
       $builder->add("dure",TextType::class,[
           'attr' => [
               'placeholder' => "Ex: Octobre 2020 - Aujourd'hui"
           ]
       ]);
       $builder->add('description',CKEditorType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
       $resolver->setDefaults([
              'data_class' => Experience::class
          ]);
    }
}
