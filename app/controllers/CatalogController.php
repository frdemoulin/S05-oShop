<?php

class CatalogController
{
    public function category($params = [])
    {
        // $params = $match['params']
        $this->show('category', [
            'title' => 'Chaussures de la catégorie #'.$params['id'],
            'id' => $params['id']
        ]);
    }

    public function type($params = [])
    {
        
        $this->show('type', [
            'title' => 'Chaussures du type #'.$params['id'],
            'id' => $params['id'],
        ]);
    }

    public function product($params = [])
    {
        $dbData = new DBData();
        $infosProduct = $dbData->getProductDetails($params['id']);
        $this->show('product', [
            'title' => 'Page de la chaussure #'.$params['id'],
            'id' => $params['id'],
            'infos-product' => $infosProduct
        ]);
    }

    private function show($viewName, $viewVars = array())
    {
        global $router;
        // $viewVars est disponible dans chaque fichier de vue
        $viewVars['baseUrl'] = $_SERVER['BASE_URI'];

        // on transmet les infos des types et des marques au footer
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