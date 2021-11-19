
<?php
    require_once "../../helpers/databaseConnection.php"; 
    require_once "../../helpers/randomString.php"; 
    
    // Ensure to set to NULL if no value exist to avoid runtime error
    $id = $_GET['id'] ?? null;

    // User may come without a proper ID value!
    if (!$id) {
        header('Location: index.php');
        exit;
    }

    // Get the product from DB
    $statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    $product = $statement->fetch(PDO::FETCH_ASSOC);
    $title = $product['title'];
    $price = $product['price'];
    $description = $product['description'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        require_once "../../views/products/validate.php";

        // Update the product
        if (empty($errors)) {
            $statement = $pdo->prepare("UPDATE products SET title =:title, image = :image, description = :description, price = :price WHERE id = :id");
            $statement->bindValue(':id', $id);
            $statement->bindValue(':title', $title);
            $statement->bindValue(':image', $imagePath);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':date', $date);
            $statement->execute();

            // Fly back dear user...
            header('Location: index.php');   
        }     
    }
?>

<?php include_once "../../views/components/header.php"; ?> 
    <h1>Update a product</h1>

    <?php require_once "../../views/components/goBack_btn.php"; ?>
    <?php require_once "../../views/products/form.php"; ?>

<?php include_once "../../views/components/footer.php"; ?> 