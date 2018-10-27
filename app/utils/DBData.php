<?php

/**
 * Classe permettant de retourner des données stockées dans la base de données
 * $dbh pour data base handler (gestionnaire de bdd)
 * config.dist.conf : fichier de connexion que l'on distribue (template vierge de connexion)
 * config.conf contient les infos de connexion en local, il n'est pas pushé (cf .gitignore)
*/
class DBData {
	/** @var PDO */
	private $dbh;

    /**
     * Constructeur se connectant à la base de données à partir des informations du fichier de configuration
     */
    public function __construct() {
        // Récupération des données du fichier de config
        //   la fonction parse_ini_file parse le fichier et retourne un array associatif
        // Attention, "config.conf" ne doit pas être versionné,
        //   on versionnera plutôt un fichier d'exemple "config.dist.conf" ne contenant aucune valeur
        $configData = parse_ini_file(__DIR__.'/../config.conf');
        
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        }
        catch(\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }
    /**
     * 1. écriture de la requête
     * 2. exécution et récupération de la requête PDOStatement
     * 3. on récupère les données depuis le PDOstatement
     * (PDO::FETCH_CLASS permet de mapper les résultats dans la classe Category)
     * 4. on retourne les données
     */


    /**
     * Méthode permettant de retourner les données sur un produit donné
     *
     * @param int $productId
     * @return Product
     */
    public function getProductDetails($productId) {
        // TODO
        $sql = "SELECT * FROM product WHERE id='{$productId}'";
        $stmt = $this->dbh->query($sql);
        $product = $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
        //dump($product);
        return $product;
    }
    
    /**
     * Méthode permettant de retourner les données sur une catégorie donnée
     *
     * @param int $categoryId
     * @return Category
     */
    public function getCategoryDetails($categoryId) {
        // TODO
        $sql = "SELECT * FROM category WHERE id='{$categoryId}'";
        $stmt = $this->dbh->query($sql);
        $category = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $category;
    }
    
    /**
     * Méthode permettant de retourner les données sur une marque donnée
     *
     * @param int $brandId
     * @return Brand
     */
    public function getBrandDetails($brandId) {
        // TODO
        $sql = "SELECT * FROM brand WHERE id='{$brandId}'";
        $stmt = $this->dbh->query($sql);
        $brand = $stmt->fetchAll(PDO::FETCH_CLASS, 'Brand');
        return $brand;
    }
    
    /**
     * Méthode permettant de retourner les données sur un type de produit donné
     *
     * @param int $typeId
     * @return ProductType
     */
    public function getProductTypeDetails($typeId) {
        // TODO
        $sql = "SELECT * FROM type WHERE id='{$typeId}'";
        $stmt = $this->dbh->query($sql);
        $type = $stmt->fetchAll(PDO::FETCH_CLASS, 'Type');
        return $type;
    }
    
    /**
     * Méthode permettant de retourner les 5 catégories sur la page d'accueil
     *
     * @return Category[]
     */
    public function getHomeCategories() {
        // TODO
        $sql = 'SELECT * FROM category WHERE home_order > 0 ORDER BY home_order ASC LIMIT 5';
        $stmt = $this->dbh->query($sql);
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories;
    }
    
    /**
     * Méthode permettant de retourner les 5 marques en bas de page
     *
     * @return Brand[]
     */
    public function getFooterBrands() {
        // TODO
        $sql = 'SELECT * FROM brand WHERE footer_order > 0 ORDER BY footer_order ASC LIMIT 5';
        $stmt = $this->dbh->query($sql);
        $brands = $stmt->fetchAll(PDO::FETCH_CLASS, 'Brand');
        return $brands;
    }
    
    /**
     * Méthode permettant de retourner les 5 types de produit en bas de page
     *
     * @return ProductType[]
     */
    public function getFooterProductTypes() {
        // TODO
        $sql = 'SELECT * FROM type WHERE footer_order > 0 ORDER BY footer_order ASC LIMIT 5';
        $stmt = $this->dbh->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
        return $products;
    }

    // BONUS

    /**
     * Méthode permettant de retourner tous les produits d'une catégorie donnée et le nom de la catégorie
     *
     * @param int $categoryId
     * @return Products[]
     */
    public function getAllProductsCategory($categoryId) {
        // TODO
        $sql = "SELECT product.name, category.name AS 'name-category' FROM product INNER JOIN category ON product.category_id = category.id WHERE category.id ='{$categoryId}'";
        $stmt = $this->dbh->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
        return $products;
    }

    /**
         * Méthode permettant de retourner tous les produits d'une marque donnée et le nom de la marque
         *
         * @param int $brandId
         * @return Products[]
         */
        public function getAllProductsBrand($brandId) {
            // TODO
            $sql = "SELECT product.name, brand.name AS 'name-brand' FROM product INNER JOIN brand ON product.brand_id = brand.id WHERE brand.id ='{$brandId}'";
            $stmt = $this->dbh->query($sql);
            $products = $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
            return $products;
        }

}