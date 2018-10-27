<?php

// Inclusion autoload de Composer
require '../vendor/autoload.php';

// Point d'entrée unique = front controller
// grâce à la réécriture d'URL
// (donc la présence d'un .htaccess dans ce dossier)

require __DIR__.'/../app/utils/DBData.php';
require __DIR__.'/../app/models/CoreModel.php';
require __DIR__.'/../app/models/Brand.php';
require __DIR__.'/../app/models/Category.php';
require __DIR__.'/../app/models/Product.php';
require __DIR__.'/../app/models/Type.php';
require __DIR__.'/../app/controllers/MainController.php';
require __DIR__.'/../app/controllers/CatalogController.php';
require __DIR__.'/../app/controllers/CartController.php';

// On instancie AltoRouter
$router = new AltoRouter();

// Définition du chemin (l'URL) de base ($basePath)
// Depius http://localhost jusqu'à public
// Attention le chemin !!! SANS SLASH !!!
// Ex. : /lunar/saison5/e03/S05-E03-oShop-jc-oclock/public
// Cette URL est transmise depuis le .htaccess vers la variable d'environnement serveur
// $_SERVER de PHP
// De cette façon, cette URL de base sera dynamique quelque soit le chemin du projet
$baseUrl = isset($_SERVER['BASE_URI']) ? $_SERVER['BASE_URI'] : '';
$router->setBasePath($baseUrl);

// Mapping de nos routes
// Le 3ème paramètre de map() est la "cible" du mapping
// On demande à AltoRouter d'associer cette cible à la méthode GET et à l'URL /
// La chaine de caractères MainController#home est juste une façon à nous
// d'indiquer que l'on souhaite instancier ce contrôleur et appeler cette méthode
// 4ème param = nom de la route, à titre de référence ultérieure
$router->map('GET', '/', 'MainController#home', 'home');
$router->map('GET', '/mentions-legales', 'MainController#legalMentions', 'legal-mentions');
$router->map('GET', '/catalogue/categorie/[i:id]', 'CatalogController#category', 'category');
$router->map('GET', '/catalogue/type/[i:id]', 'CatalogController#type', 'type');
$router->map('GET', '/catalogue/marque/[i:id]', 'CatalogController#brand', 'brand');
$router->map('GET', '/catalogue/produit/[i:id]', 'CatalogController#product', 'product');
$router->map('GET', '/mon-panier', 'CartController#cart', 'cart');
$router->map('POST', '/ajout-panier', 'CartController#add', 'cart-add');

// On demande à AltoRouter si la route demandée existe dans le mapping
$match = $router->match();

// Si $match === false = 404
if ($match) {
    // dump($match);
    // On récupère les infos du dispatcher contenu dans la cible (target)
    // En séparant la chaine via # et en récupérant un tableau
    // cf : http://php.net/manual/fr/function.explode.php
    $dispatcherInfos = explode('#', $match['target']);

    // On récupère le contrôleur en partie 1 du tableau
    // $controllerName = string
    $controllerName = $dispatcherInfos[0];
    // On récupère la méthode en partie 2
    // $methodName = string
    $methodName = $dispatcherInfos[1];

    // dump($controllerName);
    // dump($methodName);

    // Précédemment
    // $controller = new MainController();
    // $controller->legalMentions();

    // On va instancier le contrôleur en dynamique
    // PHP va remplacer le contenu de $controllerName pas sa valeur
    // cf : http://php.net/manual/fr/language.variables.variable.php
    $controller = new $controllerName(); // par ex. MainController
    // On appelle la méthode selon le même concept
    // $match['params'] contient les paramètres d'URL
    // On les transmet à la méthode
    $controller->$methodName($match['params']); // par ex. home

    // Alternative
    // call_user_func(array($controller, $methodName));

} else {
    // Page non trouvée 404
    // On modifie l'entête de réponse pour avoir un statut 404
    header("HTTP/1.0 404 Not Found");

    $controller = new MainController();
    $controller->error404();
}