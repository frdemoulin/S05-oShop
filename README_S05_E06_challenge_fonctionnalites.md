# Fonctionnalités

## DBData

### Intro

- coder le corps des méthodes de la classe `DBData`
- utiliser ces méthodes afin de dynamiser les pages du site
    - les méthodes de `DBData` sont à appeler uniquement dans le corps des méthodes de _Controller_
    - on stocke le résultat dans une variable
    - ensuite, on transfert à la _View_
    - enfin, on utilise (parcours) la donnée dans la _View_

### TODO

1. **Page produit** : informations sur le produit
2. **Footer** : 5 marques dans l'ordre
3. **Footer** : 5 types de produit dans l'ordre

## Héritage

### Intro

- on a factorisé le code des _Models_ en créant une classe "parent" **CoreModel**
- chaque _Model_ hérite de **CoreModel**
- ainsi, les propriétés et méthodes de **CoreModel** sont héritées dans les classes _enfants_ :tada:

### TODO

- _**Controllers**_ : utiliser la même procédure pour factoriser les codes communs (qui ont été dupliqués ou copié-collé) des classes _Controllers_

## Bonus - DBData

- **Page catégorie** : liste des produits de la catégorie, et nom de la catégorie
- **Page marque** : liste des produits de la marque, et nom de la marque