<?php include '../view/header.php'; ?>
<main>
    <h2>Register Product</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="submit_register_product">
        
        <label>Select Product:</label>
        <select name="product_id" required>
            <option value="">-- Select a Product --</option>
            <?php foreach ($products as $product) : ?>
                <option value="<?php echo htmlspecialchars($product['productID']); ?>">
                    <?php echo htmlspecialchars($product['productName']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>
        
        <input type="submit" value="Register Product">
    </form>
    <p><a href=".?action=login">Logout</a></p>
    <p><a href="../index.php">Home</a></p>
</main>
<?php include '../view/footer.php'; ?>
