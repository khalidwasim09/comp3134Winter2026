<?php
session_start();
$_SESSION["confirmation"] = rand();
?>

<form action="csfr_action.php" method="POST">
    <input type="hidden" name="confirmation" value="<?php echo $_SESSION["confirmation"]; ?>">
    <input type="submit">
</form>