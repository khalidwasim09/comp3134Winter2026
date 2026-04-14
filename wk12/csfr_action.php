<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $session_token = $_SESSION["confirmation"];
    $post_token = $_POST["confirmation"];

    if ($session_token === $post_token) {
        $message = "Valid Request";
    } else {
        $message = "CSRF Attack Detected";
    }
}
?>

<form method="POST">
    <input type="hidden" name="confirmation" value="<?php echo $_SESSION['confirmation']; ?>">
    <input type="submit">
</form>

<div><?php echo $message; ?></div>