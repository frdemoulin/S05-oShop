<?php

class CartController
{
    public function cart()
    {
        $this->show('cart', [
            'title' => 'Mon panier'
        ]);
    }

    public function add()
    {
        echo 'Produit ajouté, redirection vers panier';
    }

    private function show($viewName, $viewVars = array())
    {
        global $router;
        // $viewVars est disponible dans chaque fichier de vue
        $viewVars['baseUrl'] = $_SERVER['BASE_URI'];

        include(__DIR__.'/../views/header.tpl.php');
        include(__DIR__.'/../views/'.$viewName.'.tpl.php');
        include(__DIR__.'/../views/footer.tpl.php');
    }
}