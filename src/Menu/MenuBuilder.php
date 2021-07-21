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
        $header = $this->factory->createItem('header')->setChildrenAttribute('class', 'col-lg-9 col-10 d-md-flex justify-content-between perso_link_dark fs-5 d-none');
        // setChildrenAttribute pour modifier l'ul
        // setAttribute pour modifier li
        // setLinkAttribute pour modifier a
        $header->addChild('ACCUEIL', ['route' => 'index']);
        $header->addChild('CHIEN', ['route' => 'app_main']);
        $header->addChild('CHAT', ['route' => 'app_main']);
        $header->addChild('RONGEUR', ['route' => 'app_main']);
        $header->addChild('OISEAU', ['route' => 'app_main']);
        $header->addChild('POISSON', ['route' => 'app_main']);
        $header->addChild('REPTILE', ['route' => 'app_main']);

        return $header;
    }

    public function createNavFooter(RequestStack $requestStack): ItemInterface
    {
        $footer = $this->factory->createItem('footer')->setChildrenAttribute('class', 'p-0 perso_link_light d-flex flex-md-row flex-column text-center justify-content-evenly w-100');
        // setChildrenAttribute pour modifier l'ul
        // setAttribute pour modifier li
        // setLinkAttribute pour modifier a
        $footer->addChild('A Propos de Nous', ['route' => 'index']);
        $footer->addChild('Nous Contacter', ['route' => 'app_contact']);
        $footer->addChild('FAQ', ['route' => 'app_main']);
        $footer->addChild('Mentions Légales', ['route' => 'app_mentions']);
        $footer->addChild('Confidentialité', ['route' => 'app_main']);
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

        $cat = $this->factory->createItem('categoryList')->setChildrenAttribute('class', "align-items-center justify-content-center m-lg-4 m-2 mt-2");

        $animal = $categoryRepository->findAnimalMenu();

        foreach($animal as $category){

            $cat->addChild($category['namecategory'], ['uri' => '/category/'.$category['idcategory']])->setAttribute('class', 'row row-cols-lg-5 row-cols-md-2 row-cols-1 bg-secondary text-white rounded-3 p-3 m-3 d-flex justify-content-between align-items-center')->setLinkAttribute('class', 'col-12 col-md-12 col-lg-12 mb-3 fw-bold text-white text-center');
            $catPrime = $categoryRepository->findCatSubMenu($category['idcategory']);

            foreach ($catPrime as $primary) {

                $cat[$category['namecategory']]->addChild($primary['namecategory'], ['uri' => '/category/'.$primary['idcategory']])->setAttribute('class', 'col d-flex flex-column align-items-lg-center py-2 py-lg-0')->setLinkAttribute('class', 'fs-6 fw-bold text-warning');
                $catSub = $categoryRepository->findCatSubMenu($primary['idcategory']);
                
                foreach ($catSub as $secondary) {

                    $cat[$category['namecategory']][$primary['namecategory']]->addChild($secondary['namecategory'], ['uri' => '/category/'.$secondary['idcategory']])->setLinkAttribute('class', 'd-flex text-white align-items-center justify-content-between');
                    $categoryRepository->findCatSubMenu($secondary['idcategory']);
                }
            }
        }

        return $cat;
    }
}
?>