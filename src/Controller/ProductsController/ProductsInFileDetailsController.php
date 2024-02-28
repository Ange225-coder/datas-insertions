<?php

    namespace App\Controller\ProductsController;

    use App\Entity\Tables\ProductsInFile;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Doctrine\Persistence\ManagerRegistry as Doctrine;
    use Symfony\Component\Routing\Annotation\Route;

    class ProductsInFileDetailsController extends AbstractController
    {
        #[Route(path: '/p/file/product-details/{product_id}', name: 'product_file_details')]
        public function productInFileDetails(int $product_id, Doctrine $doctrine): Response
        {
            $product = $doctrine->getRepository(ProductsInFile::class)->find($product_id);

            return $this->render('public/productInFileDetails.html.twig', [
                'product' => $product,
            ]);
        }
    }