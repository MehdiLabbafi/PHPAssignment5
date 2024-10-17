<?php include '../view/header.php'; ?>
<main>
    <h2><?php echo isset($customer) ? 'Update Customer' : 'Add Customer'; ?></h2>
    <form action="." method="post">
        <!-- تغییر اکشن فرم به صورت دینامیک برای افزودن یا به‌روزرسانی مشتری -->
        <input type="hidden" name="action" value="<?php echo isset($customer) ? 'update_customer' : 'add_customer'; ?>">
        
        <?php if (isset($customer)) : ?>
            <!-- در صورت وجود مشتری، شناسه مشتری اضافه می‌شود -->
            <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer['customerID']); ?>">
        <?php endif; ?>

        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo isset($customer) ? htmlspecialchars($customer['firstName']) : ''; ?>">
        <?php if (isset($errors['first_name'])) : ?>
            <span class="error"><?php echo $errors['first_name']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php echo isset($customer) ? htmlspecialchars($customer['lastName']) : ''; ?>">
        <?php if (isset($errors['last_name'])) : ?>
            <span class="error"><?php echo $errors['last_name']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Address:</label>
        <input type="text" name="address" value="<?php echo isset($customer) ? htmlspecialchars($customer['address']) : ''; ?>">
        <?php if (isset($errors['address'])) : ?>
            <span class="error"><?php echo $errors['address']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>City:</label>
        <input type="text" name="city" value="<?php echo isset($customer) ? htmlspecialchars($customer['city']) : ''; ?>">
        <?php if (isset($errors['city'])) : ?>
            <span class="error"><?php echo $errors['city']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>State:</label>
        <input type="text" name="state" value="<?php echo isset($customer) ? htmlspecialchars($customer['state']) : ''; ?>">
        <?php if (isset($errors['state'])) : ?>
            <span class="error"><?php echo $errors['state']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Postal Code:</label>
        <input type="text" name="postal_code" value="<?php echo isset($customer) ? htmlspecialchars($customer['postalCode']) : ''; ?>">
        <?php if (isset($errors['postal_code'])) : ?>
            <span class="error"><?php echo $errors['postal_code']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Country:</label>
        <select name="country_code">
            <option value="US" <?php if (!isset($customer['countryCode']) || $customer['countryCode'] == 'US') echo 'selected'; ?>>United States</option>
            <option value="CA" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'CA') echo 'selected'; ?>>Canada</option>
            <option value="GB" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'GB') echo 'selected'; ?>>United Kingdom</option>
            <option value="FR" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'FR') echo 'selected'; ?>>France</option>
            <option value="DE" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'DE') echo 'selected'; ?>>Germany</option>
            <option value="JP" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'JP') echo 'selected'; ?>>Japan</option>
            <option value="AU" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'AU') echo 'selected'; ?>>Australia</option>
            <option value="BR" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'BR') echo 'selected'; ?>>Brazil</option>
            <option value="CN" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'CN') echo 'selected'; ?>>China</option>
            <option value="IN" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'IN') echo 'selected'; ?>>India</option>
            <option value="IR" <?php if (isset($customer['countryCode']) && $customer['countryCode'] == 'IR') echo 'selected'; ?>>Iran</option>
        </select>
        <br><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo isset($customer) ? htmlspecialchars($customer['phone']) : ''; ?>">
        <?php if (isset($errors['phone'])) : ?>
            <span class="error"><?php echo $errors['phone']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo isset($customer) ? htmlspecialchars($customer['email']) : ''; ?>">
        <?php if (isset($errors['email'])) : ?>
            <span class="error"><?php echo $errors['email']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo isset($customer) ? htmlspecialchars($customer['password']) : ''; ?>">
        <?php if (isset($errors['password'])) : ?>
            <span class="error"><?php echo $errors['password']; ?></span>
        <?php endif; ?>
        <br><br>

        <!-- تغییر دکمه ارسال به صورت دینامیک -->
        <input type="submit" value="<?php echo isset($customer) ? 'Update Customer' : 'Add Customer'; ?>">
    </form>

    <p><a href=".?action=search_customers">Search Customers</a></p>
    <p><a href="../index.php">Home</a></p>
</main>
<?php include '../view/footer.php'; ?>