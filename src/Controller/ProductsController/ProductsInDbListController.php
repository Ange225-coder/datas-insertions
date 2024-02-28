<?php

    namespace App\Controller\ProductsController;

    use App\Entity\Tables\Products;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Doctrine\Persistence\ManagerRegistry as Doctrine;

    class ProductsInDbListController extends AbstractController
    {
        #[Route(path: '/p/db/product-list', name: 'product_db_list')]
        public function productInDbList(Doctrine $doctrine): Response
        {
            $products = $doctrine->getRepository(Products::class)->findAll();

            $imgDataArray = [];
            $imgTypeArray = [];

            foreach ($products as $product) {
                $imgData = '';
                $imgType = '';

                $image = $product->getImage();

                if ($image) {
                    $imgData = base64_encode(stream_get_contents($image));
                    $imgType = mime_content_type('data://image/jpeg;base64,' . $imgData);
                }

                $imgDataArray[] = $imgData;
                $imgTypeArray[] = $imgType;
            }

            return $this->render('public/productsInDbList.html.twig', [
                'products' => $products,
                'imgType' => $imgTypeArray,
                'imgData' => $imgDataArray,
            ]);
        }
    }