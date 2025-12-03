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
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcontents.mediadecathlon.com%2Fm18155302%2Fk%2467192125708a3a5e34e0d3f16a928478%2Fsq%2Fwhey-proteine-mega-whey-750g-vanille.jpg?w=400&h=300&fit=crop'
            ],
            [
                'id' => 2,
                'name' => 'Créatine Monohydrate',
                'description' => 'Créatine pure pour augmenter la force et la puissance',
                'price' => 29.99,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcontents.mediadecathlon.com%2Fm15247653%2Fk%24c5d979f4214fddb3cfeda149eea446ac%2Fsq%2Fcreatine-100-creatine-monohydrate-saveur-neutre-300g.jpg?w=400&h=300&fit=crop'
            ],
            [
                'id' => 3,
                'name' => 'BCAA',
                'description' => 'Acides aminés branchés pour préserver la masse musculaire',
                'price' => 39.99,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fm.media-amazon.com%2Fimages%2FI%2F71n0uAjqepL.jpg&f=1&nofb=1&ipt=d0f3266c27de4dd2b5a474d81ea2365a5c0eb737e850d746e0d0737ce3d83441'
            ],
            [
                'id' => 4,
                'name' => 'Shaker Sport',
                'description' => 'Shaker de qualité professionnelle 700ml',
                'price' => 12.99,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.cdiscount.com%2Fpdt2%2F4%2F5%2F8%2F1%2F550x550%2Fauc1710899475458%2Frw%2Fshaker-de-bar-classic-shaker-en-acier-inoxyd.jpg&f=1&nofb=1&ipt=6af903b36c3cd57b7243596854814b2fc7d3c1325488fbed3dffdc3aae348f7a'
            ],
            [
                'id' => 5,
                'name' => 'Gants de Fitness',
                'description' => 'Gants de protection pour la musculation',
                'price' => 24.99,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fgantunivers.com%2Fwp-content%2Fuploads%2F2023%2F03%2F2023_03_gant_musculation_de_protection_pour_paume_de_main_1.jpg&f=1&nofb=1&ipt=8a6647805657c47b56ac00b1971ef4dadfd0dc60ca17121d855becb15e1b1f4d'
            ],
            [
                'id' => 6,
                'name' => 'Ceinture de Force',
                'description' => 'Ceinture de soutien lombaire pour les lifts lourds',
                'price' => 45.99,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.pharmaleo.fr%2Fresize%2F600x600%2Fmedia%2Ffinish%2Fimg%2Fnormal%2F91%2Forliman-lombofit-ceinture-de-soutien-lombaire-21cm-5.jpg&f=1&nofb=1&ipt=977c1c764be09a3f35701a6455ad0670fcdc2e16daf1e69ed86302fe4548c716'
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