<?php
    require_once 'database.php';

    $query = "SELECT * FROM users";
    $result = $mysqli->query($query);
?>
<html>
    <head><title>View Users</title></head>
    <body>
        <h1>Users</h1>
        <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "</tr>";
        }
        ?>
        </table>
    </body>
</html>
<?php
    $mysqli->close();
?>