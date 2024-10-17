<?php include '../view/header.php'; ?>
<main>
    <h2>Customer Login</h2>
    <form action="." method="post">
        <input type="hidden" name="action" value="authenticate_login">
        
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        
        <input type="submit" value="Login">
    </form>
    <p><a href="../index.php">Home</a></p>
</main>
<?php include '../view/footer.php'; ?>
