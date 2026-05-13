<?php
require 'database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: view_users.php?error=" . urlencode("ID tidak valid."));
    exit;
}

$checkStmt = $mysqli->prepare("SELECT id FROM users WHERE id = ?");
$checkStmt->bind_param("i", $id);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows === 0) {
    $checkStmt->close();
    header("Location: view_users.php?error=" . urlencode("User dengan ID $id tidak ditemukan."));
    exit;
}
$checkStmt->close();

$deleteStmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
$deleteStmt->bind_param("i", $id);

if (!$deleteStmt->execute()) {
    $errMsg = "Penghapusan gagal: " . $deleteStmt->error;
    $deleteStmt->close();
    header("Location: view_users.php?error=" . urlencode($errMsg));
    exit;
}

$deleteStmt->close();
$mysqli->close();

header("Location: view_users.php?success=" . urlencode("User dengan ID $id berhasil dihapus."));
exit;
