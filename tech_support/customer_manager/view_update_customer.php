<?php include '../view/header.php'; ?>
<main>
    <h2>View/Update Customer</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="update_customer">

        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
        <?php if (isset($errors['first_name'])) : ?>
            <span class="error"><?php echo $errors['first_name']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>">
        <?php if (isset($errors['last_name'])) : ?>
            <span class="error"><?php echo $errors['last_name']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Address:</label>
        <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>"><br><br>

        <label>City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>">
        <?php if (isset($errors['city'])) : ?>
            <span class="error"><?php echo $errors['city']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>State:</label>
        <input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>"><br><br>

        <label>Postal Code:</label>
        <input type="text" name="postal_code" value="<?php echo htmlspecialchars($postal_code); ?>"><br><br>

        <label>Country:</label>
        <select name="country">
    <option value="US" <?php if ($country == 'US') echo 'selected'; ?>>United States</option>
    <option value="CA" <?php if ($country == 'CA') echo 'selected'; ?>>Canada</option>
    <option value="GB" <?php if ($country == 'GB') echo 'selected'; ?>>United Kingdom</option>
    <option value="AU" <?php if ($country == 'AU') echo 'selected'; ?>>Australia</option>
    <option value="DE" <?php if ($country == 'DE') echo 'selected'; ?>>Germany</option>
    <option value="FR" <?php if ($country == 'FR') echo 'selected'; ?>>France</option>
    <option value="IN" <?php if ($country == 'IN') echo 'selected'; ?>>India</option>
    <option value="JP" <?php if ($country == 'JP') echo 'selected'; ?>>Japan</option>
    <option value="CN" <?php if ($country == 'CN') echo 'selected'; ?>>China</option>
    <option value="IT" <?php if ($country == 'IT') echo 'selected'; ?>>Italy</option>
    <option value="ES" <?php if ($country == 'ES') echo 'selected'; ?>>Spain</option>
    <option value="MX" <?php if ($country == 'MX') echo 'selected'; ?>>Mexico</option>
    <option value="BR" <?php if ($country == 'BR') echo 'selected'; ?>>Brazil</option>
    <option value="RU" <?php if ($country == 'RU') echo 'selected'; ?>>Russia</option>
    <option value="ZA" <?php if ($country == 'ZA') echo 'selected'; ?>>South Africa</option>
    <option value="KR" <?php if ($country == 'KR') echo 'selected'; ?>>South Korea</option>
    <option value="NG" <?php if ($country == 'NG') echo 'selected'; ?>>Nigeria</option>
    <option value="AR" <?php if ($country == 'AR') echo 'selected'; ?>>Argentina</option>
    <option value="NL" <?php if ($country == 'NL') echo 'selected'; ?>>Netherlands</option>
    <option value="SE" <?php if ($country == 'SE') echo 'selected'; ?>>Sweden</option>
    <option value="IR" <?php if ($country == 'IR') echo 'selected'; ?>>Iran</option>
        </select><br><br>
       
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
        <?php if (isset($errors['phone'])) : ?>
            <span class="error"><?php echo $errors['phone']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <?php if (isset($errors['email'])) : ?>
            <span class="error"><?php echo $errors['email']; ?></span>
        <?php endif; ?>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
        <?php if (isset($errors['password'])) : ?>
            <span class="error"><?php echo $errors['password']; ?></span>
        <?php endif; ?>
        <br><br>

        <input type="submit" value="Update Customer">
    </form>

    <p><a href="index.php?action=search_customers">Search Customers</a></p>
</main>
<?php include '../view/footer.php'; ?>