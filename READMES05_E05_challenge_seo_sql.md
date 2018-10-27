# SEO & SQL

On continue de mettre en place notre boutique _oShop_.
 
On va préparer la récupération des données depuis la base de données : les requêtes SQL.  
Le bonus SEO, à la base, faisait parti du challenge. Mais, après cette loooongue journée, on va vous laisser un peu tranquille... Mais pas totalement, faut pas exagérer non plus :smiling_imp:

## SQL

- Actuellement, il y a beaucoup de contenus en dur dans le code HTML
- il faut analyser quels contenus peut-on récupérer de la base de données
- pour chaque contenu, écrire la requête SQL et décrire ce qu'elle permet de récupérer

### Exemple

<details><summary>Récupèrer tous les produits</summary>

```sql
SELECT * FROM product
```

</details>

## Bonus SEO

Pour un bon référencement, on va mettre en place les microdonnées sur la page produit. 

- On va améliorer le référencement des pages "produit" de la boutique
- Si l'intégration des pages "produit" n'a pas encore été faite, c'est le moment :wink:
    - tu peux prendre n'importe quel produit comme exemple (parmi les images fournies)
- Ajouter des métadonnées avec les microdatas pour obtenir sur Google un "Rich snippet" produit
    - https://developers.google.com/search/docs/data-types/products
- Pour tester les métadonnées : https://search.google.com/structured-data/testing-tool
    - Tu dois obtenir les infos suivantes : nom, image, description, marque, avis, prix, devise, disponibilité

## Bonus

Plusieurs bonus sur le SEO et SQL.  
Comme d'habitude, les bonus sont réservés à ceux qui n'ont pas rencontré de grandes difficultés avec le challenge, et qui souhaitent aller plus loin.  

### ... fun :sparkles:

Pour améliorer le SEO, notre client pense à mettre en place un blog.  
A nous de lui proposer les mot-clés sur lesquels se positionner pour le référencement naturel.  
Ensuite, pour chaque mot-clé, proposer un ou deux sujet d'article à poster sur le blog.

:warning: ce bonus ne sera pas corrigé lors du prochain cours, trop subjectif :wink:

### ... qui pique :spades:

Récupérer le nom & le prix des produits de la catégorie dont l'ID est 1 + le nom de la catégorie en question.  
Le tout en une seule requête :smiling_imp:

<details><summary>notions nécessaires</summary>

Tu vas avoir besoin de ça : https://sql.sh/cours/jointures  
Les 2 jointures les + utilisées sont [`INNER JOIN`](https://sql.sh/cours/jointures/inner-join) et [`LEFT JOIN`](https://sql.sh/cours/jointures/left-join)

</details>

:warning: ce bonus ne sera corrigé lors du prochain cours que si le temps le permet

### ... de la mort :skull:

Récupérer le nombre de produits pour chaque catégorie.  
Le résultat doit ressembler à ceci :

| nb | id | name |
|--|--|--|
| 4 | 1 | Vintage |
| 5 | 2 | Au travail |
| ... | ... | ... |

<details><summary>notions nécessaires</summary>

- jointures : https://sql.sh/cours/jointures
- fonction `count` : https://sql.sh/fonctions/agregation/count
- aggrégation `GROUP BY` : https://sql.sh/cours/group-by
- définir le nom d'une colonne de résultat `AS` : https://sql.sh/cours/alias

</details>

:warning: ce bonus ne sera pas corrigé lors du prochain cours
