
<?php
    //Database Connection with PDO (more powerfull, OOP) instead mysqli
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo '<pre>';
    // var_dump($_GET);
    // var_dump($_POST);
    // echo '</pre>';

    // echo $_SERVER['REQUEST_METHOD'].'<br>';

    $errors = [];
    $title = '';
    $price = '';
    $description = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $date = date('Y-m-d H:i:s');

        if (!$title) {
            $errors[] = "Please provide TITLE!";
        }

        if (!$price) {
            $errors[] = "Please provide price!";
        }
        
        if (empty($errors)) {

            // Avoid directly to run 'exec'! SQL injection code may attempt!
            // $pdo->exec("
            //     INSERT INTO products(title, image, description, price, create_date)
            //     VALUES:('$title', '', '$description', $price, '$date')
            // ");

            $statement = $pdo->prepare("INSERT INTO products(title, image, description, price, create_date)
                VALUES:(:title, :image, :description, :price, :date)");

            $statement->bindValue(':title', $title);
            $statement->bindValue(':image', '');
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':date', $date);
            // $statement->execute();   
        }     
    }
?>

<?php include_once "components/header.php"; ?> 
    <h1>Create new product</h1>
    <p>
        <a href="create.php" class="btn btn-success">
            Create Product
        </a>
    </p>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $key => $error): ?>
                <div>
                    <?php echo $error ?>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Product Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $title ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Product Description</label>
            <textarea name="description" class="form-control" value="<?php echo $description ?>"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" name="price" step=".01" class="form-control" value="<?php echo $price ?>">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php include_once "components/footer.php"; ?> 