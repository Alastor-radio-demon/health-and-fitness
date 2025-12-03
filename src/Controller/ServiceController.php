<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    private function getMockServices(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Coaching Personnel',
                'description' => 'Séances individuelles avec un coach certifié pour un programme sur mesure adapté à vos objectifs.',
                'price' => 120,
                'image' => 'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?w=400&h=300&fit=crop',
                'duration' => 60,
                'type' => 'Individuel'
            ],
            [
                'id' => 2,
                'title' => 'Cours de Yoga',
                'description' => 'Séances de yoga en groupe pour améliorer flexibilité et relaxation.',
                'price' => 80,
                'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=400&h=300&fit=crop',
                'duration' => 90,
                'type' => 'Groupe'
            ],
            [
                'id' => 3,
                'title' => 'HIIT Training',
                'description' => 'Entraînement par intervalles à haute intensité pour brûler les graisses.',
                'price' => 65,
                'image' => 'https://images.unsplash.com/photo-1534258936925-c58bed479fcb?w=400&h=300&fit=crop',
                'duration' => 45,
                'type' => 'Groupe'
            ],
            [
                'id' => 4,
                'title' => 'Consultation Nutrition',
                'description' => 'Plan alimentaire personnalisé avec suivi par un nutritionniste diplômé.',
                'price' => 150,
                'image' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=400&h=300&fit=crop',
                'duration' => 60,
                'type' => 'Individuel'
            ],
            [
                'id' => 5,
                'title' => 'CrossFit',
                'description' => 'Entraînement fonctionnel haute intensité avec équipements spécialisés.',
                'price' => 95,
                'image' => 'https://images.unsplash.com/photo-1526506118085-60ce8714f8c5?w=400&h=300&fit=crop',
                'duration' => 60,
                'type' => 'Groupe'
            ],
            [
                'id' => 6,
                'title' => 'Pilates',
                'description' => 'Renforcement musculaire en profondeur avec concentration sur la posture.',
                'price' => 70,
                'image' => 'https://images.unsplash.com/photo-1518611012118-696072aa579a?w=400&h=300&fit=crop',
                'duration' => 55,
                'type' => 'Groupe'
            ]
        ];
    }

    #[Route('/services', name: 'app_services')]
    public function index(): Response
    {
        $services = $this->getMockServices();
        
        return $this->render('service/index.html.twig', [
            'services' => $services,
        ]);
    }

    #[Route('/service/{id}', name: 'app_service_show')]
    public function show(int $id): Response
    {
        $services = $this->getMockServices();
        $service = null;
        
        foreach ($services as $s) {
            if ($s['id'] === $id) {
                $service = $s;
                break;
            }
        }
        
        if (!$service) {
            throw $this->createNotFoundException('Service non trouvé');
        }
        
        return $this->render('service/show.html.twig', [
            'service' => $service,
        ]);
    }
}