<!DOCTYPE html>
<html>
<head>
    <title>FWAS - Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="POST" action="/login">
        <label>Username</label><br>
        <input type="text" name="username" required><br>
        <label>Password</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
