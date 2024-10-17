<?php
// model/registration_db.php

function register_product($customer_id, $product_id) {
    global $db;
    $query = 'INSERT INTO registered_products
                (customerID, productID)
              VALUES
                (:customer_id, :product_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
    $statement->bindValue(':product_id', $product_id, PDO::PARAM_INT);
    try {
        $statement->execute();
        $registration_id = $db->lastInsertId();
        $statement->closeCursor();
        return $registration_id;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}

function get_registered_product($registration_id) {
    global $db;
    $query = 'SELECT rp.*, p.productCode, p.productName
              FROM registered_products rp
              JOIN products p ON rp.productID = p.productID
              WHERE rp.registrationID = :registration_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':registration_id', $registration_id, PDO::PARAM_INT);
    $statement->execute();
    $registration = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $registration;
}
?>
