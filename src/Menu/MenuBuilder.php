<?php

// src/Menu/MenuBuilder.php

namespace App\Menu;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createNavHeader(RequestStack $requestStack): ItemInterface
    {
        $header = $this->factory->createItem('header')->setChildrenAttribute('class', 'col-lg-9 col-10 d-md-flex justify-content-between perso_link_dark fs-5 m-0 d-none');
        // setChildrenAttribute pour modifier l'ul
        // setAttribute pour modifier li
        // setLinkAttribute pour modifier a
        $header->addChild('ACCUEIL', ['route' => 'index']);
        $header->addChild('CHIEN', ['route' => 'category_show', 'routeParameters' => ['idcategory' =>  12] ]);
        $header->addChild('CHAT', ['route' => 'category_show', 'routeParameters' => ['idcategory' =>  12] ]);
        $header->addChild('RONGEUR', ['route' => 'category_show', 'routeParameters' => ['idcategory' =>  12] ]);
        $header->addChild('OISEAU', ['route' => 'category_show', 'routeParameters' => ['idcategory' =>  12] ]);
        $header->addChild('POISSON', ['route' => 'category_show', 'routeParameters' => ['idcategory' =>  12] ]);
        $header->addChild('REPTILE', ['route' => 'category_show', 'routeParameters' => ['idcategory' =>  12] ]);

        return $header;
    }

    public function createNavFooter(RequestStack $requestStack): ItemInterface
    {
        $footer = $this->factory->createItem('footer')->setChildrenAttribute('class', 'p-0 perso_link_light d-flex flex-md-row flex-column text-center justify-content-evenly w-100');
        // setChildrenAttribute pour modifier l'ul
        // setAttribute pour modifier li
        // setLinkAttribute pour modifier a
        $footer->addChild('A Propos de Nous', ['route' => 'app_propos']);
        $footer->addChild('Nous Contacter', ['route' => 'app_contact']);
        $footer->addChild('FAQ', ['route' => 'app_faq']);
        $footer->addChild('Mentions Légales', ['route' => 'app_mentions']);
        $footer->addChild('Confidentialité', ['route' => 'app_conf']);
        $footer->addChild('Conditions Générales', ['route' => 'app_cgu']);

        return $footer;
    }

    public function createSocialNetwork(RequestStack $requestStack): ItemInterface
    {
        $network = $this->factory->createItem('network');
        // setChildrenAttribute pour modifier l'ul
        // setAttribute pour modifier li
        // setLinkAttribute pour modifier a
        $network->addChild("facebook", ['uri' => 'https://facebook.com', 'extras' => ['img' => 'fa fa-home']])->setLinkAttribute('target', '_blank');
        $network->addChild('twitter', ['uri' => 'https://twitter.com'])->setLinkAttribute('target', '_blank');
        $network->addChild('instagram', ['uri' => 'https://instagram.com'])->setLinkAttribute('target', '_blank');
        $network->addChild('pinterest', ['uri' => 'https://pinterest.com'])->setLinkAttribute('target', '_blank');
        
        return $network;
    }

    public function createCategoryList(RequestStack $requestStack, CategoryRepository $categoryRepository): ItemInterface
    {

        $cat = $this->factory->createItem('categoryList')->setChildrenAttribute('class', "align-items-center justify-content-center p-0");

        $animal = $categoryRepository->findAnimalMenu();

        foreach($animal as $category){

            $cat->addChild($category['namecategory'], ['uri' => '/category/'.$category['idcategory']])
                ->setAttribute('class', 'bg-secondary text-white rounded-3 d-flex justify-content-between align-items-center')
                ->setLinkAttribute('class', 'fw-bold text-white text-center');

            $catPrime = $categoryRepository->findCatSubMenu($category['idcategory']);

            foreach ($catPrime as $primary) {

                $cat[$category['namecategory']]
                    ->addChild($primary['namecategory'], ['uri' => '/category/'.$primary['idcategory']])
                    ->setAttribute('class', 'd-flex flex-column align-items-lg-center')
                    ->setLinkAttribute('class', 'fw-bold text-warning');

                $catSub = $categoryRepository->findCatSubMenu($primary['idcategory']);
                
                foreach ($catSub as $secondary) {

                    $cat[$category['namecategory']][$primary['namecategory']]
                        ->addChild($secondary['namecategory'], ['uri' => '/category/'.$secondary['idcategory']])
                        ->setLinkAttribute('class', 'd-flex text-white align-items-center justify-content-between');

                    $categoryRepository->findCatSubMenu($secondary['idcategory']);
                }
            }
        }

        return $cat;
    }
}
?>