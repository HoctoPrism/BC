<?php

// src/Menu/MenuBuilder.php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createNavHeader(RequestStack $requestStack)
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

    public function createNavFooter(RequestStack $requestStack)
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

    public function createSocialNetwork(RequestStack $requestStack)
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
}
?>