<?php include '../view/header.php'; ?>
<main>
    <h2>Search Customers</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="display_customers">

        <label>Last Name:</label>
        <input type="text" name="last_name">
        <input type="submit" value="Search">
    </form>
    
    <h2>Add a new customer</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="show_add_form">
        <input type="submit" value="Add Customer">
    </form>
    
    <p><a href="../index.php">Home</a></p>
</main>
<?php include '../view/footer.php'; ?>