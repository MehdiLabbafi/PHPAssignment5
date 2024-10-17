<?php include '../view/header.php'; ?>
<main>
    <h2>Technician List</h2>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($technicians as $technician) : ?>
        <tr>
            <td><?php echo htmlspecialchars($technician['firstName']); ?></td>
            <td><?php echo htmlspecialchars($technician['lastName']); ?></td>
            <td><?php echo htmlspecialchars($technician['email']); ?></td>
            <td><?php echo htmlspecialchars($technician['phone']); ?></td>
            <td><?php echo htmlspecialchars($technician['password']); ?></td>
            <td>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_technician">
                    <input type="hidden" name="tech_id" value="<?php echo htmlspecialchars($technician['techID']); ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="?action=show_add_form">Add Technician</a></p>
    <p><a href="../index.php">Home</a></p>
</main>
<?php include '../view/footer.php'; ?>
