<h1>Catégorie numéro <?php echo $viewVars['id'] ?></h1>



<!-- TODO : lister les produits de la catégorie et le nom de la catégorie -->

<div class="col">
    <h6 class="text-dark mb-3">Liste des produits de la catégorie <?= $viewVars['infos-category'][0]->getName(); ?></h6>

    <ul class="list-unstyled">
        <?php //dump($viewVars); 
        // TODO
        foreach ($viewVars['infos-all-products-category'] as $type): ?>
            
            <li> <a href="#" class="text-muted"><?= $type->getName(); ?></a></li>

        <?php endforeach; ?>
    </ul>
</div>
