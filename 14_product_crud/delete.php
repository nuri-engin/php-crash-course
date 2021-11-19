<?php
    require_once "helpers/databaseConnection.php"; 

    $id = $_POST['id'] ?? null;

    if (!$id) {
        header('Location: index.php');
        exit;
    }

    echo $id;

    $statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    header("Location: index.php");
?>
