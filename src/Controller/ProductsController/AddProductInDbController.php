<?php

    namespace App\Controller\ProductsController;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use  App\Forms\Fields\ProductsInsertionFields;
    use App\Forms\Types\ProductsInsertionTypes;
    use App\Entity\Tables\Products;
    use Doctrine\Persistence\ManagerRegistry as Doctrine;
    use Symfony\Component\Routing\Annotation\Route;

    class AddProductInDbController extends AbstractController
    {
        #[Route(path: '/p/db/add-product', name: 'add_product_db')]
        public function addProductInDb(Doctrine $doctrine, Request $request): Response
        {
            $productEntity = new Products();
            $productFields = new ProductsInsertionFields();

            $em = $doctrine->getManager();

            $productTypes = $this->createForm(ProductsInsertionTypes::class, $productFields);

            $productTypes->handleRequest($request);

            if($productTypes->isSubmitted() && $productTypes->isValid()) {
                $formData = $productTypes->getData();

                $productEntity->setName($formData->getName());
                $productEntity->setPrice($formData->getPrice());
                $productEntity->setImage(file_get_contents($formData->getImage()));

                $em->persist($productEntity);
                $em->flush();

                return $this->redirectToRoute('product_db_list');
            }

            return $this->render('public/addProduct.html.twig', [
                'addProductForm' => $productTypes->createView(),
            ]);
        }
    }