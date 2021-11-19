
<?php
    require_once "helpers/databaseConnection.php"; 
    require_once "helpers/randomString.php"; 
    
    // Ensure to set to NULL if no value exist to avoid runtime error
    $id = $_GET['id'] ?? null;

    // User may come without a proper ID value!
    if (!$id) {
        header('Location: index.php');
        exit;
    }

    // Talk to the database!
    $statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    $product = $statement->fetch(PDO::FETCH_ASSOC);

    // echo var_dump($product);
    // exit;

    $errors = [];
    $title = $product['title'];
    $price = $product['price'];
    $description = $product['description'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];

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

            // Ensure products' previous file has been removed!
            if ($product['image']) {
                unlink($product['image']);
            }

            if ($image && $image['tmp_name']) {
                // Need to be sure PATH of file should be unique
                $imagePath = 'images/'.randomString(8).'/'.$image['name'];
                
                mkdir(dirname($imagePath));
                move_uploaded_file($image['tmp_name'], $imagePath);
            }

            $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                VALUES:(:title, :image, :description, :price, :date)");

            $statement->bindValue(':title', $title);
            $statement->bindValue(':image', $imagePath);
            $statement->bindValue(':description', $description);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':date', $date);
            // $statement->execute();
            header('Location: index.php');   
        }     
    }
?>

<?php include_once "components/header.php"; ?> 
    <h1>Update a product</h1>
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
        <?php if ($product['image']): ?>
            <img src="<?php echo $product['image'] ?>" class="update_image">
        <?php elseif (!$product['image']): ?>
            <?php echo "This product has no image!" ?>
        <?php endif; ?>

        <hr>

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