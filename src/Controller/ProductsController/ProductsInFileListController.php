<?php

    namespace App\Controller\ProductsController;

    use App\Entity\Tables\ProductsInFile;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Doctrine\Persistence\ManagerRegistry as Doctrine;

    class ProductsInFileListController extends AbstractController
    {
        #[Route(path: '/p/file/product-list', name: 'product_file_list')]
        public function productInFileList(Doctrine $doctrine): Response
        {
            $productsList = $doctrine->getRepository(ProductsInFile::class)->findAll();

            return $this->render('public/productInFileList.html.twig', [
                'productsInFile' => $productsList
            ]);
        }
    }