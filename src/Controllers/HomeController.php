<?php

declare(strict_types=1);

namespace App\Controllers;

use Twig\Environment;

class HomeController
{
    public function __construct(private readonly Environment $twig)
    {
    }

    public function index(): void
    {
        echo $this->twig->render('home.html.twig', [
            'title'   => 'Accueil',
            'project' => 'RAIL – Robot Autonome d\'Inventaire et Logistique',
        ]);
    }

    public function about(): void
    {
        echo $this->twig->render('home.html.twig', [
            'title'   => 'À propos',
            'project' => 'RAIL – Robot Autonome d\'Inventaire et Logistique',
        ]);
    }
}
