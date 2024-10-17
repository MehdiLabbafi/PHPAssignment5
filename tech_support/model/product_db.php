<?php
function get_products() {
    global $db;
    $query = 'SELECT * FROM products ORDER BY productCode';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $products;
}

function delete_product($product_code) {
    global $db;
    $query = 'DELETE FROM products WHERE productCode = :product_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    try {
        $statement->execute();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
    $statement->closeCursor();
}

function add_product($code, $name, $version, $release_date) {
    global $db;
    $query = 'INSERT INTO products
                 (productCode, name, version, releaseDate)
              VALUES
                 (:code, :name, :version, :release_date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);

   // Make sure the date is stored in the correct format
    try {
        $date = new DateTime($release_date);
        $formatted_date = $date->format('Y-m-d');
    } catch (Exception $e) {
        $formatted_date = null;
    }

    $statement->bindValue(':release_date', $formatted_date);

    try {
        $statement->execute();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
    
    $statement->closeCursor();
}
?>
