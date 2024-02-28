<?php

    namespace App\Controller\ProductsController;

    use App\Entity\Tables\Products;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Doctrine\Persistence\ManagerRegistry as Doctrine;

    class ProductsInDbDetailsController extends AbstractController
    {
        #[Route(path: '/p/db/product-detail/{id_product}', name: 'product_db_details')]
        public function productInDbDetails($id_product, Doctrine $doctrine): Response
        {
            $product = $doctrine->getRepository(Products::class)->find($id_product);

            $imgData = '';
            $imgType = '';

            $image = $product->getImage();

            if($image) {
                $imgData = base64_encode(stream_get_contents($image));
                $imgType = mime_content_type('data://image/jpeg;base64,' . $imgData);
            }


            return $this->render('public/productInDbDetails.html.twig', [
                'productDetails' => $product,
                'imgType' => $imgType,
                'imgData' => $imgData,
            ]);
        }
    }