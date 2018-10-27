<h1>Chaussure #<?php echo $viewVars['id'] ?></h1>

<h2>Infos sur le produit </h2>

<div class="container">
    <div class="row">
        <div class="col">
            <ul>
                <li>Nom : 
                <?= $viewVars['infos-product'][0]->getName(); ?>
                </li>
                <li>Description : <?= $viewVars['infos-product'][0]->getDescription(); ?></li>
                <li>Prix : <?= $viewVars['infos-product'][0]->getPrice(); ?> € TTC</li>
                <li>Disponibilité : <?= $viewVars['infos-product'][0]->getStatus(); ?></li>
                <li>Catégorie : <?= $viewVars['infos-product'][0]->getName(); ?></li>
                <li>Marque : <?= $viewVars['infos-product'][0]->getBrand_id(); ?></li>
                <li>Catégorie : <?= $viewVars['infos-product'][0]->getCategory_id(); ?></li>
                <li>Note : <?= $viewVars['infos-product'][0]->getRate(); ?></li>
            </ul>
        </div>
        <div class="col">
      
        <img src="<?= $viewVars['baseUrl'] .'/'. $viewVars['infos-product'][0]->getPicture(); ?>" alt="">
        </div>
    </div>
    <div class="row justify-content-center">
        <form action="<?php echo $router->generate('cart-add') ?>" method="post">
            <button type="submit">Ajouter au panier</button>
        </form>
    </div>
</div>

<!-- Champs en base de la table product
    $id;
    $name;
    $description;
    $picture;
    $price;
    $rate;
    $status;
    $home_order;
    $created_at;
    $updated_at;
    $brand_id;
    $category_id;
    $type_id;
-->