<?php

    namespace App\Controller\ProductsController;

    use App\Entity\Tables\ProductsInFile;
    use App\Forms\Fields\ProductsInFileInsertionFields;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use  App\Forms\Types\ProductsInFileInsertionTypes;
    use Doctrine\Persistence\ManagerRegistry as Doctrine;
    use Symfony\Component\HttpFoundation\Request;

    class AddProductInFileController extends AbstractController
    {
        #[Route(path: '/p/file/add-product', name: 'add_product_file')]
        public function addProductInFile(Request $request, Doctrine $doctrine): Response
        {
            $em = $doctrine->getManager();

            $productInFileEntity = new ProductsInFile();
            $productsInFileFields = new ProductsInFileInsertionFields();

            $productsInFileTypes = $this->createForm(ProductsInFileInsertionTypes::class, $productsInFileFields);

            $productsInFileTypes->handleRequest($request);

            if($productsInFileTypes->isSubmitted() && $productsInFileTypes->isValid()) {
                $formData = $productsInFileTypes->getData();

                $productInFileEntity->setName($formData->getName());
                $productInFileEntity->setPrice($formData->getPrice());

                //move image to the file system
                $image = $formData->getImage();
                $imageName = md5(uniqid()). '.' . $image->guessExtension();
                $image->move(
                    $this->getParameter('productsImg'),
                    $imageName
                );

                //save the file path in the database
                $productInFileEntity->setImage($this->getParameter('productsImg') . '/' . $imageName);

                $em->persist($productInFileEntity);
                $em->flush();

                return $this->redirectToRoute('product_file_list');
            }

            return $this->render('public/addProductInFile.html.twig', [
                'productInFile' => $productsInFileTypes->createView(),
            ]);
        }
    }