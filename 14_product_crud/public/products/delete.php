<?php
    require_once "../../helpers/databaseConnection.php"; 

    // Ensure to set to NULL if no value exist to avoid runtime error
    $id = $_POST['id'] ?? null;

    // User may come without a proper ID value!
    if (!$id) {
        header('Location: index.php');
        exit;
    }

    // Talk to the database!
    $statement = $pdo->prepare('DELETE FROM products WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();

    // Fly back dear user...
    header("Location: index.php");
?>
