# Requêtes SQL boutique oShop

## Page d'accueil

* Sélectionner 5 catégories selon un ordre défini (mises en avant sur la page d'accueil) :

    `SELECT * FROM category WHERE home_order > 0 ORDER BY home_order LIMIT 5`

* Sélectionner 5 marques de produits selon un ordre défini (footer) :

    `SELECT * FROM brand WHERE footer_order >0 ORDER BY footer_order LIMIT 5`

* Sélectionner 5 types de produits selon un ordre défini (footer) :

    `SELECT * FROM product WHERE footer_order >0 ORDER BY footer_order LIMIT 5`

Variante : 

   `SELECT * FROM product WHERE footer_order BETWEEN 1 AND 5`

## Page catégorie

* Récupérer tous les produits de la catégorie 1, triés par nom :

    `SELECT * FROM product WHERE category_id = 1 ORDER BY name`

* Récupérer tous les produits de la catégorie 1, triés par prix :

    `SELECT * FROM product WHERE category_id = ?`

* Récupérer tous les produits d'une catégorie et d'une marque données :

    `SELECT * FROM product WHERE category_id = ? AND product_id = ?`

* Récupérer le nom et le sous-titre de la catégorie :

    `SELECT * FROM category WHERE id=1`

## Page produit

* Récupérer un produit en particulier :

    `SELECT * FROM product WHERE id = 23`

    `SELECT * FROM product WHERE id = 23`

# Bonus qui pique

Récupérer le nom et le prix des produits de la catégorie dont l'ID est 1 + le nom de la catégorie en question

`SELECT product.name, price, category.name FROM product INNER JOIN category ON product.category_id = category.id WHERE category.id = 1`

name est une colonne ambigue car présente dans les tables product et category

# Bonus de la mort

Récupérer le nombre de produits pour chaque catégorie

`SELECT COUNT(*) AS 'nb', category.id, category.name FROM product INNER JOIN category ON product.category_id = category.id GROUP BY category.id`
