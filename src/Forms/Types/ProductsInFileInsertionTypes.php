<?php

    namespace App\Forms\Types;

    use App\Forms\Fields\ProductsInFileInsertionFields;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\NumberType;
    use Symfony\Component\Form\Extension\Core\Type\FileType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class ProductsInFileInsertionTypes extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
                ->add('name', TextType::class, [
                    'attr' => ['placeholder' => 'Nom du produit']
                ])

                ->add('price', NumberType::class, [
                    'attr' => ['placeholder' => 'Prix du produit']
                ])

                ->add('image', FileType::class);
            ;
        }


        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => ProductsInFileInsertionFields::class,
            ]);
        }
    }