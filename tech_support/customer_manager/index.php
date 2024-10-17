<?php
require('../model/database.php');
require('../model/customer_db.php');

// فعال کردن نمایش خطاها برای خطایابی
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'search_customers';
    }
}

// صفحه جستجوی مشتریان
if ($action == 'search_customers') {
    include('customer_search.php');

// نمایش مشتریان پس از جستجو
} elseif ($action == 'display_customers') {
    $last_name = filter_input(INPUT_POST, 'last_name');
    if ($last_name == NULL || $last_name == FALSE) {
        $error = "Please enter a last name.";
        include('../errors/error.php');
    } else {
        $customers = get_customers_by_last_name($last_name);
        include('customer_list.php');
    }

// انتخاب مشتری برای ویرایش
} elseif ($action == 'select_customer') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    if ($customer_id == NULL || $customer_id == FALSE) {
        $error = "Invalid customer ID.";
        include('../errors/error.php');
    } else {
        $customer = get_customer($customer_id);
        include('customer_edit.php');
    }

// به‌روزرسانی مشتری
} elseif ($action == 'update_customer') {
    $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postal_code = filter_input(INPUT_POST, 'postal_code');
    $country_code = filter_input(INPUT_POST, 'country_code');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    // تعریف آرایه خطاها
    $errors = [];

    // اعتبارسنجی فیلدها
    if (empty($first_name)) {
        $errors['first_name'] = "First name is required.";
    }
    if (empty($last_name)) {
        $errors['last_name'] = "Last name is required.";
    }
    if (empty($address)) {
        $errors['address'] = "Address is required.";
    }
    if (empty($city)) {
        $errors['city'] = "City is required.";
    }
    if (empty($state)) {
        $errors['state'] = "State is required.";
    }
    if (empty($postal_code)) {
        $errors['postal_code'] = "Postal code is required.";
    }
    if (empty($country_code)) {
        $errors['country_code'] = "Country code is required.";
    }
    if (!preg_match('/^\(\d{3}\) \d{3}-\d{4}$/', $phone)) {
        $errors['phone'] = 'Phone must be in the format (999) 999-9999.';
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif ($email === false) {
        $errors['email'] = "Invalid email address.";
    }
    if (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters long.";
    }

    // اگر خطا وجود داشت، فرم با پیام‌های خطا نمایش داده شود
    if (!empty($errors)) {
        $customer = [
            'customerID' => $customer_id,
            'firstName' => $first_name,
            'lastName' => $last_name,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'postalCode' => $postal_code,
            'countryCode' => $country_code,
            'phone' => $phone,
            'email' => $email,
            'password' => $password
        ];
        include('customer_edit.php');
    } else {
        // به‌روزرسانی اطلاعات مشتری در دیتابیس
        update_customer($customer_id, $first_name, $last_name, $address, $city, $state, $postal_code, $country_code, $phone, $email, $password);
        header("Location: .?action=search_customers");
    }

// افزودن مشتری جدید
} elseif ($action == 'add_customer') {
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $postal_code = filter_input(INPUT_POST, 'postal_code');
    $country_code = filter_input(INPUT_POST, 'country_code');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    // اعتبارسنجی مشابه برای افزودن مشتری جدید
    $errors = [];
    if (empty($first_name)) {
        $errors['first_name'] = "First name is required.";
    }
    if (empty($last_name)) {
        $errors['last_name'] = "Last name is required.";
    }
    if (empty($email)) {
        $errors['email'] = "Email is required.";
    }

    if (!empty($errors)) {
        include('customer_edit.php');
    } else {
        // مشتری جدید اضافه شود
        add_customer($first_name, $last_name, $address, $city, $state, $postal_code, $country_code, $phone, $email, $password);
        header("Location: .?action=search_customers");
    }

// نمایش فرم افزودن مشتری جدید
} elseif ($action == 'show_add_form') {
    $customer = null; // فرم بدون اطلاعات قبلی
    include('customer_edit.php');

} else {
    $error = 'Unknown action: ' . $action;
    include('../errors/error.php');
}
?>