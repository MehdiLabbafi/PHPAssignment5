<?php include '../view/header.php'; ?>
<main>
    <h2>Add Technician</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="add_technician">

        <label>First Name:</label>
        <input type="text" name="first_name"><br>

        <label>Last Name:</label>
        <input type="text" name="last_name"><br>

        <label>Email:</label>
        <input type="email" name="email"><br>

        <label>Phone:</label>
        <input type="text" name="phone"><br>

        <label>Password:</label>
        <input type="text" name="password"><br>

        <input type="submit" value="Add Technician">
    </form>
    <p><a href=".">View Technician List</a></p>
</main>
<?php include '../view/footer.php'; ?>
