<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartItemController extends AbstractController
{
    private function getMockCartItems(): array
    {
        return [
            [
                'id' => 1,
                'user' => ['name' => 'Mohamed Ali'],
                'product' => [
                    'name' => 'Protéine Whey',
                    'price' => 89.99,
                    'image' => 'proteine-whey.jpg',
                    'description' => 'Protéine de lactosérum de haute qualité'
                ],
                'quantity' => 2
            ],
            [
                'id' => 2,
                'user' => ['name' => 'Mohamed Ali'],
                'product' => [
                    'name' => 'BCAA',
                    'price' => 39.99,
                    'image' => 'bcaa.jpg',
                    'description' => 'Acides aminés branchés'
                ],
                'quantity' => 1
            ]
        ];
    }

    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        $cartItems = $this->getMockCartItems();
        
        return $this->render('cart/index.html.twig', [
            'cartItems' => $cartItems,
        ]);
    }

    #[Route('/cart/item/{id}', name: 'app_cart_item_show')]
    public function show(int $id): Response
    {
        $cartItems = $this->getMockCartItems();
        $cartItem = null;
        
        foreach ($cartItems as $item) {
            if ($item['id'] === $id) {
                $cartItem = $item;
                break;
            }
        }
        
        if (!$cartItem) {
            throw $this->createNotFoundException('Article du panier non trouvé');
        }
        
        return $this->render('cart/show.html.twig', [
            'cartItem' => $cartItem,
        ]);
    }
}