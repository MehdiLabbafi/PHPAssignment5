<?php include '../view/header.php'; ?>
<main>
    <h2>Customer List</h2>
    <?php if (empty($customers)) : ?>
        <p>No customers found with that last name.</p>
        <p><a href=".?action=search_customers">Search Again</a></p>
    <?php else: ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName']); ?></td>
                <td><?php echo htmlspecialchars($customer['email']); ?></td>
                <td><?php echo htmlspecialchars($customer['city']); ?></td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action" value="select_customer">
                        <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer['customerID']); ?>">
                        <input type="submit" value="Select">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <p><a href=".?action=search_customers">Search Customers</a></p>
    <p><a href="../index.php">Home</a></p>
</main>
<?php include '../view/footer.php'; ?>
