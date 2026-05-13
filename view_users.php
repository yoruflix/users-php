<?php
    require_once 'database.php';

    $query = "SELECT * FROM users";
    $result = $mysqli->query($query);
?>
<html>
    <head><title>View Users</title></head>
    <body>
        <h1>Users</h1>

        <?php
        if (!empty($_GET['error'])) {
            echo '<p>' . htmlspecialchars($_GET['error']) . '</p>';
        }
        if (!empty($_GET['success'])) {
            echo '<p>' . htmlspecialchars($_GET['success']) . '</p>';
        }
        ?>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id'])       . "</td>";
                echo "<td>" . htmlspecialchars($row['email'])    . "</td>";
                echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                echo "<td><a href='delete_user.php?id=" . (int)$row['id'] . "'>Hapus</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>
<?php
    $mysqli->close();
?>
