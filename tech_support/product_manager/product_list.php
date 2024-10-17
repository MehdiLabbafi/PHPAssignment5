<?php include '../view/header.php'; ?>
<main>
    <h2>Product List</h2>
    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Version</th>
            <th>Release Date</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($products as $product) : ?>
        <tr>
            <td><?php echo htmlspecialchars($product['productCode']); ?></td>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo htmlspecialchars($product['version']); ?></td>
            <td>
                <?php
                    if (!empty($product['releaseDate'])) {
                        try {
                            $date = new DateTime($product['releaseDate']);
                            //Format date as m-d-yyyy without leading zeros
                            echo $date->format('n-j-Y');
                        } catch (Exception $e) {
                            echo 'Invalid Date'; // If the date format is incorrect
                        }
                    } else {
                        echo 'N/A'; // If no date is available
                    }
                ?>
            </td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_product">
                    <input type="hidden" name="product_code" value="<?php echo htmlspecialchars($product['productCode']); ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Product</a></p>
    <p><a href="../index.php">Home</a></p>
</main>
<?php include '../view/footer.php'; ?>
