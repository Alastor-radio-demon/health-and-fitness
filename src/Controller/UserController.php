<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private function getMockUsers(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Mohamed Ali',
                'email' => 'mohamed.ali@email.com',
                'roles' => ['ROLE_USER'],
                'phone' => '+216 12 345 678',
                'createdAt' => new \DateTime('2023-06-15')
            ],
            [
                'id' => 2,
                'name' => 'Sarah Ben Ahmed',
                'email' => 'sarah.ben@email.com',
                'roles' => ['ROLE_USER'],
                'phone' => '+216 23 456 789',
                'createdAt' => new \DateTime('2023-07-20')
            ],
            [
                'id' => 3,
                'name' => 'Karim Jlassi',
                'email' => 'karim.jlassi@email.com',
                'roles' => ['ROLE_ADMIN', 'ROLE_USER'],
                'phone' => '+216 34 567 890',
                'createdAt' => new \DateTime('2023-05-10')
            ],
            [
                'id' => 4,
                'name' => 'Amina Trabelsi',
                'email' => 'amina.trabelsi@email.com',
                'roles' => ['ROLE_USER'],
                'phone' => '+216 45 678 901',
                'createdAt' => new \DateTime('2023-08-05')
            ]
        ];
    }

    #[Route('/users', name: 'app_users')]
    public function index(): Response
    {
        $users = $this->getMockUsers();
        
        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('/user/{id}', name: 'app_user_show')]
    public function show(int $id): Response
    {
        $users = $this->getMockUsers();
        $user = null;
        
        foreach ($users as $u) {
            if ($u['id'] === $id) {
                $user = $u;
                break;
            }
        }
        
        if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
        
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }
}