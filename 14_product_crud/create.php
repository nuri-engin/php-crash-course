
<?php
    require_once "helpers/databaseConnection.php"; 
    require_once "helpers/randomString.php"; 
    
    // echo randomString(8);
    // exit;

    // echo '<pre>';
    // var_dump($_GET);
    // var_dump($_POST);
    // var_dump($_FILES); // tmp_name; Apache safes the file temporary folder
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

        // Validation process starts;
        if (!$title) {
            $errors[] = "Please provide TITLE!";
        }

        if (!$price) {
            $errors[] = "Please provide price!";
        }

        // Ensure the required folder exist to be able to save the file.
        if(!is_dir('images')) {
            mkdir('images');
        }
        
        if (empty($errors)) {

            $image = $_FILES['image'] ?? null;
            $imagePath = '';

            if ($image && $image['tmp_name']) {
                // Need to be sure PATH of file should be unique
                $imagePath = 'images/'.randomString(8).'/'.$image['name'];
                
                mkdir(dirname($imagePath));
                move_uploaded_file($image['tmp_name'], $imagePath);
            }

            // Avoid directly to run 'exec'! SQL injection code may attempt!
            // $pdo->exec("
            //     INSERT INTO products(title, image, description, price, create_date)
            //     VALUES:('$title', '', '$description', $price, '$date')
            // ");

            // Talk to the database! Firstly get read with query
            $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                VALUES:(:title, :image, :description, :price, :date)");
            // Ensure the query values are filled.
            $statement->bindValue(':title', $title);
            $statement->bindValue(':image', $imagePath);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':date', $date);
            // $statement->execute();

            // Fly back dear user...
            header('Location: index.php');   
        }     
    }
?>

<?php include_once "components/header.php"; ?> 
    <h1>Create new product</h1>

    <?php require_once "components/goBack_btn.php"; ?>

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