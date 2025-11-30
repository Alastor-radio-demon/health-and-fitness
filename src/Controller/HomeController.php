<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // Solution temporaire sans template
        return new Response('
            <!DOCTYPE html>
            <html>
            <head>
                <title>Health & Fitness</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            </head>
            <body>
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand" href="/">🏋️ Health & Fitness</a>
                    </div>
                </nav>
                <div class="container text-center mt-5">
                    <h1>Bienvenue sur Health & Fitness 🏋️‍♀️</h1>
                    <p>L\'application démarre correctement !</p>
                    <a href="/products" class="btn btn-primary">Voir les Produits</a>
                    <a href="/services" class="btn btn-success">Voir les Services</a>
                </div>
            </body>
            </html>
        ');
    }
}