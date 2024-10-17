<?php
function get_customers_by_last_name($last_name) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE LOWER(lastName) = LOWER(:last_name)
              ORDER BY firstName';
    $statement = $db->prepare($query);
    $statement->bindValue(':last_name', $last_name);
    $statement->execute();
    $customers = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $customers;
}

function get_customer($customer_id) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
    $statement->execute();
    $customer = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $customer;
}

function update_customer($customer_id, $first_name, $last_name, $address, $city, $state, $postal_code, $country_code, $phone, $email, $password) {
    global $db;
    $query = 'UPDATE customers
              SET firstName = :first_name,
                  lastName = :last_name,
                  address = :address,
                  city = :city,
                  state = :state,
                  postalCode = :postal_code,
                  countryCode = :country_code,
                  phone = :phone,
                  email = :email,
                  password = :password
              WHERE customerID = :customer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postal_code', $postal_code);
    $statement->bindValue(':country_code', $country_code);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

function add_customer($first_name, $last_name, $address, $city, $state, $postal_code, $country_code, $phone, $email, $password) {
    global $db;
    $query = 'INSERT INTO customers
                 (firstName, lastName, address, city, state, postalCode, countryCode, phone, email, password)
              VALUES
                 (:first_name, :last_name, :address, :city, :state, :postal_code, :country_code, :phone, :email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':first_name', $first_name);
    $statement->bindValue(':last_name', $last_name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':postal_code', $postal_code);
    $statement->bindValue(':country_code', $country_code);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}
?>