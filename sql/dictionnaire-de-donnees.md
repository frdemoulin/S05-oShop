# Dictionnaire de données

# Entité Produit (`product`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du produit|
| name | VARCHAR(64) | NOT NULL | Nom du produit |
| picture | VARCHAR(128) | NULL | Image du produit (à partir de "public/") |
| rate | TINYINT(1) | NOT NULL, DEFAULT 0 | Note du produit |
| price | DECIMAL(6, 2) | NOT NULL, DEFAULT 0 | Prix du produit (6 chiffres dont 2 après la virgule) |
| description | TEXT | NULL | Description du produit |
| status | TINYINT(1) | NOT NULL, DEFAULT 0 | Statut du produit (1=en stock, 2=pas dispo, 3=fin de stock) |
|created_at|TIMESTAMP|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de création du produit|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du produit|
|brand|entity|NULL|La marque (autre entité) du produit|
|category|entity|NULL|La catégorie (autre entité) du produit|
|type|entity|NULL|Le type (autre entité) du produit|

# Entité Catégorie (`category`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la catégorie|
| name | VARCHAR(64) | NOT NULL | Nom de la catégorie |
| home_order | TINYINT(1) | NOT NULL, DEFAULT 0 | Ordre d'affichage de la catégorie sur la page d'accueil |
| picture | VARCHAR(128) | NULL | Image de la catégorie sur la page d'accueil |
| subtitle | VARCHAR(255) | NULL | sous-titre de la catégorie |
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP|La date de création de la catégorie|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la catégorie|

# Entité Marque (`brand`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la marque|
| name | VARCHAR(64) | NOT NULL | Nomde la marque |
| footer_order | TINYINT(1) | NOT NULL, DEFAULT 0 | Ordre d'affichage de la marque dans le pied de page |
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP|La date de création de la marque|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la marque|


# Entité Type (`type`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du type de produits
| name | VARCHAR(64) | NOT NULL | Nom du type de produits |
| footer_order | TINYINT(1) | NOT NULL, DEFAULT 0 | Ordre d'affichage du type dans le pied de page |
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP|La date de création du type|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du type|