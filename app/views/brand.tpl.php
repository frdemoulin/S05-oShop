<h1>Marque numéro <?php echo $viewVars['id'] ?></h1>

<!-- TODO : lister les produits de la marque et le nom de la marque -->

<div class="col">
    <h6 class="text-dark mb-3">Liste des produits de la marque <?= $viewVars['infos-brand'][0]->getName(); ?></h6>

    <ul class="list-unstyled">
        <?php //dump($viewVars); 
        // TODO
        foreach ($viewVars['infos-all-products-brand'] as $type): ?>
            
            <li> <a href="#" class="text-muted"><?= $type->getName(); ?></a></li>

        <?php endforeach; ?>
    </ul>
</div>
