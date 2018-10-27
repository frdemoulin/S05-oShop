<h1>Bienvenue sur <i>Dans les shoe</i></h1>

<div class="row">

<?php foreach($viewVars['categories'] as $category): ?>

    <div class="col-4" style="height: 16rem; background-size: cover; background-image:url(<?php echo $viewVars['baseUrl'] .'/'. $category->getPicture() ?>)">
        <h2><?php echo $category->getName() ?></h2>
        <h3><?php echo $category->getSubtitle() ?></h3>
        <p><?php echo $category->getCreated_at() ?></p>
    </div>
    
<?php endforeach; ?>

</div>

<ul>
    <li><a href="<?php echo $router->generate('category', ['id' => 1]); ?>">En ville</a></li>
    <li><a href="<?php echo $router->generate('category', ['id' => 2]); ?>">A la maison</a></li>
    <li><a href="<?php echo $router->generate('type', ['id' => 11]); ?>">Bottines</a></li>
    <li><a href="<?php echo $router->generate('type', ['id' => 12]); ?>">Baskets</a></li>
    <li><a href="<?php echo $router->generate('product', ['id' => 23]); ?>">Bottes en cuir à franges</a></li>
    <li><a href="<?php echo $router->generate('cart'); ?>">Voir mon panier</a></li>
</ul>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptas assumenda, voluptatum ratione laborum quaerat cumque, inventore corrupti temporibus, autem sed maiores nihil aspernatur adipisci enim? Commodi labore suscipit praesentium.</p>
