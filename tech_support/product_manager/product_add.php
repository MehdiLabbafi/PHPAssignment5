<?php include '../view/header.php'; ?>
<main>
    <h2>Add Product</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_product">

        <label>Code:</label>
        <input type="text" name="code" required><br><br>

        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Version:</label>
        <input type="text" name="version" required><br><br>

        <label>Release Date:</label>
        <input type="text" name="release_date" placeholder="Enter release date (e.g., May 20, 2023)" required><br><br>

        <input type="submit" value="Add Product">
    </form>

    <p><a href="index.php?action=list_products">View Product List</a></p>
</main>
<?php include '../view/footer.php'; ?>
