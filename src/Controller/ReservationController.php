<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    private function getMockReservations(): array
    {
        return [
            [
                'id' => 1,
                'user' => ['name' => 'Mohamed Ali'],
                'service' => ['title' => 'Coaching Personnel'],
                'date' => new \DateTime('2024-01-15 10:00:00')
            ],
            [
                'id' => 2,
                'user' => ['name' => 'Sarah Ben'],
                'service' => ['title' => 'Cours de Yoga'],
                'date' => new \DateTime('2024-01-16 14:30:00')
            ],
            [
                'id' => 3,
                'user' => ['name' => 'Karim Jlassi'],
                'service' => ['title' => 'HIIT Training'],
                'date' => new \DateTime('2024-01-17 09:00:00')
            ]
        ];
    }

    #[Route('/reservations', name: 'app_reservations')]
    public function index(): Response
    {
        $reservations = $this->getMockReservations();
        
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservations,
        ]);
    }

    #[Route('/reservation/{id}', name: 'app_reservation_show')]
    public function show(int $id): Response
    {
        $reservations = $this->getMockReservations();
        $reservation = null;
        
        foreach ($reservations as $r) {
            if ($r['id'] === $id) {
                $reservation = $r;
                break;
            }
        }
        
        if (!$reservation) {
            throw $this->createNotFoundException('Réservation non trouvée');
        }
        
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }
}