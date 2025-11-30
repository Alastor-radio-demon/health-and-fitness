<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private function getMockProducts(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Protéine Whey',
                'description' => 'Protéine de lactosérum de haute qualité pour la récupération musculaire',
                'price' => 89.99,
                'image' => 'proteine-whey.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Crêatine Monohydrate',
                'description' => 'Crêatine pure pour augmenter la force et la puissance',
                'price' => 29.99,
                'image' => 'creatine.jpg'
            ],
            [
                'id' => 3,
                'name' => 'BCAA',
                'description' => 'Acides aminés branchés pour préserver la masse musculaire',
                'price' => 39.99,
                'image' => 'bcaa.jpg'
            ],
            [
                'id' => 4,
                'name' => 'Shaker Sport',
                'description' => 'Shaker de qualité professionnelle 700ml',
                'price' => 12.99,
                'image' => 'shaker.jpg'
            ],
            [
                'id' => 5,
                'name' => 'Gants de Fitness',
                'description' => 'Gants de protection pour la musculation',
                'price' => 24.99,
                'image' => 'gants.jpg'
            ],
            [
                'id' => 6,
                'name' => 'Ceinture de Force',
                'description' => 'Ceinture de soutien lombaire pour les lifts lourds',
                'price' => 45.99,
                'image' => 'ceinture.jpg'
            ]
        ];
    }

    #[Route('/products', name: 'app_products')]
    public function index(): Response
    {
        $products = $this->getMockProducts();
        
        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/product/{id}', name: 'app_product_show')]
    public function show(int $id): Response
    {
        $products = $this->getMockProducts();
        $product = null;
        
        foreach ($products as $p) {
            if ($p['id'] === $id) {
                $product = $p;
                break;
            }
        }
        
        if (!$product) {
            throw $this->createNotFoundException('Produit non trouvé');
        }
        
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }
}