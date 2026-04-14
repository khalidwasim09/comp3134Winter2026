<?php
session_start();
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_SESSION["confirmation"] === $_POST["confirmation"]) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username == "host" && $password == "pass") {
            $message = "Login Success!";
        } else {
            $message = "Login Failed!";
        }

    } else {
        $message = "CSRF Attack Detected!";
    }
}
?>

<form method="POST">
    <input type="hidden" name="confirmation" value="<?php echo $_SESSION['confirmation']; ?>">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>

<div><?php echo $message; ?></div>