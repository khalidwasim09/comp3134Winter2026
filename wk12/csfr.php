<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === "host" && $password === "pass") {
        $message = "Login Successful";
    } else {
        $message = "Login Failed";
    }
}
?>

<h1>CSRF Demo</h1>

<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit">
</form>

<div>
    <?php echo $message; ?>
</div>