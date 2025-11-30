<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    private function getMockOrders(): array
    {
        return [
            [
                'id' => 1,
                'user' => ['name' => 'Mohamed Ali'],
                'total' => 159.98,
                'status' => 'Livré',
                'createdAt' => new \DateTime('2024-01-10'),
                'items' => [
                    ['product' => 'Protéine Whey', 'quantity' => 1, 'price' => 89.99],
                    ['product' => 'Shaker Sport', 'quantity' => 1, 'price' => 12.99]
                ]
            ],
            [
                'id' => 2,
                'user' => ['name' => 'Sarah Ben Ahmed'],
                'total' => 75.98,
                'status' => 'En cours',
                'createdAt' => new \DateTime('2024-01-12'),
                'items' => [
                    ['product' => 'Crêatine Monohydrate', 'quantity' => 1, 'price' => 29.99],
                    ['product' => 'BCAA', 'quantity' => 1, 'price' => 39.99],
                    ['product' => 'Gants de Fitness', 'quantity' => 1, 'price' => 24.99]
                ]
            ]
        ];
    }

    #[Route('/orders', name: 'app_orders')]
    public function index(): Response
    {
        $orders = $this->getMockOrders();
        
        return $this->render('order/index.html.twig', [
            'orders' => $orders,
        ]);
    }

    #[Route('/order/{id}', name: 'app_order_show')]
    public function show(int $id): Response
    {
        $orders = $this->getMockOrders();
        $order = null;
        
        foreach ($orders as $o) {
            if ($o['id'] === $id) {
                $order = $o;
                break;
            }
        }
        
        if (!$order) {
            throw $this->createNotFoundException('Commande non trouvée');
        }
        
        return $this->render('order/show.html.twig', [
            'order' => $order,
        ]);
    }
}