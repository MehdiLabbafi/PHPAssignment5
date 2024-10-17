<?php
require('../model/database.php');
require('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_technicians';
    }
}

if ($action == 'list_technicians') {
    $technicians = get_technicians();
    include('technician_list.php');

} elseif ($action == 'delete_technician') {
    $tech_id = filter_input(INPUT_POST, 'tech_id', FILTER_VALIDATE_INT);
    if ($tech_id == NULL || $tech_id == FALSE) {
        $error = "Invalid technician ID.";
        include('../errors/error.php');
    } else {
        delete_technician($tech_id);
        header("Location: .");
    }

} elseif ($action == 'show_add_form') {
    include('technician_add.php');

} elseif ($action == 'add_technician') {
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone');
    $password = filter_input(INPUT_POST, 'password');

    if ($first_name == NULL || $last_name == NULL || $email == NULL || $phone == NULL || $password == NULL ||
        $first_name == FALSE || $last_name == FALSE || $email == FALSE || $phone == FALSE || $password == FALSE) {
        $error = "All fields are required.";
        include('../errors/error.php');
    } else {
        add_technician($first_name, $last_name, $email, $phone, $password);
        header("Location: .");
    }

} else {
    $error = 'Unknown action: ' . $action;
    include('../errors/error.php');
}
?>
