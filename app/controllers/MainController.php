<?php

class MainController
{
    public function home()
    {
        // c'est ici dans le controller que l'on fait le lien entre les données et la vue

        $dbdata = new DBData();
        $categories = $dbdata->getHomeCategories();

        // affichage de la vue
        // ce tableau est transmis aux vues
        // templator->setVar et getVar() si on travaille avec templator
        $this->show('home', [
            'title' => 'Dans les shoe',
            'categories' => $categories
        ]);
    }

    public function legalMentions()
    {
        $this->show('legal_mentions', [
            'title' => 'Mentions légales'
        ]);
    }

    public function error404()
    {
        $this->show('error404', [
            'title' => 'Page non trouvée'
        ]);
    }

    private function show($viewName, $viewVars = array())
    {
        global $router;
        // $viewVars est disponible dans chaque fichier de vue
        $viewVars['baseUrl'] = $_SERVER['BASE_URI'];

        // on transmet les infos des types et des marques à la home
        $dbData = new DBData();
        $infosTypes = $dbData->getFooterProductTypes();
        $infosBrands = $dbData->getFooterBrands();
        $viewVars['infos-types'] = $infosTypes;
        $viewVars['infos-brands'] = $infosBrands;

        include(__DIR__.'/../views/header.tpl.php');
        include(__DIR__.'/../views/'.$viewName.'.tpl.php');
        include(__DIR__.'/../views/footer.tpl.php');
    }
}