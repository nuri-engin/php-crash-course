
<?php
    require_once "../helpers/databaseConnection.php"; 
    require_once "../helpers/randomString.php"; 

    $errors = [];
    $title = '';
    $price = '';
    $description = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {        
        if (empty($errors)) {

            require_once "products/validate.php";

            // Talk to the database! Firstly get read with query
            // Avoid directly to run 'exec'! SQL injection code may attempt!
            $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                VALUES:(:title, :image, :description, :price, :date)");
            
            // Ensure the query values are filled.
            $statement->bindValue(':title', $title);
            $statement->bindValue(':image', $imagePath);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':date', date('Y-m-d H:i:s'));
            // $statement->execute();

            // Fly back dear user...
            header('Location: index.php');   
        }     
    }
?>

<?php include_once "components/header.php"; ?> 
    <h1>Create new product</h1>

    <?php require_once "components/goBack_btn.php"; ?>
    <?php require_once "products/form.php"; ?>

<?php include_once "components/footer.php"; ?> 