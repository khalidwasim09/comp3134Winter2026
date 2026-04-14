<?php
$conn = new mysqli("localhost", "root", "", "comp3134");

$q = isset($_GET['q']) ? $_GET['q'] : "";

?>

<form method="GET">
    <input name="q" placeholder="Enter First Name">
    <input type="submit">
</form>

<table border="1">
<tr>
    <th>ID</th><th>Username</th><th>Email</th><th>First</th><th>Last</th><th>Active</th>
</tr>

<?php
if ($q != "") {
    $stmt = $conn->prepare("SELECT * FROM users WHERE firstname = ? AND active = 1");
    $stmt->bind_param("s", $q);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['username']}</td>
        <td>{$row['email']}</td>
        <td>{$row['firstname']}</td>
        <td>{$row['lastname']}</td>
        <td>{$row['active']}</td>
        </tr>";
    }
}
?>
</table>
