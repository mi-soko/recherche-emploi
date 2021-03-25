<?php

namespace App\Form;

use App\Entity\User\Compagnie;
use App\Entity\User\Jobseeker;
use App\Entity\User\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public string $className;

    public function __construct(RequestStack $request)
    {
        $controller = $request
            ->getCurrentRequest()
            ->query
            ->get("account","job-seeker");

        $controller === "job-seeker"
            ?  $this->className = Jobseeker::class
            : $this->className = Compagnie::class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options):void
    {

        if($this->className === Compagnie::class)
        {
            $builder->add('compagnieName');
        }


        $builder
            ->add('fullName',TextType::class,[
                'required'   => false,
            ])
            ->add('phoneNumber',NumberType::class,[
                'attr' => [
                    'required'   => false,
                ]
            ])
            ->add('email',TextType::class,[
                'attr' => [
                    'required'   => false,
                ]
            ])
            ->add('plainPassword',PasswordType::class,[
                'attr' => [
                    'required'   => false,
                ]
            ]);

    }


    public function configureOptions(OptionsResolver $resolver):void
    {

        $resolver->setDefaults([
            'data_class' => $this->className,
        ]);
    }
}
