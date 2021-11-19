<?php
    // Errors that to be rendered to inform end-user.
    $errors = [];

    $title = $product['title'];
    $price = $product['price'];
    $description = $product['description'];
    $imagePath = '';

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
        if(!is_dir(__DIR__.'/public/images')) {
            mkdir(__DIR__.'/public/images');
        }
        
        if (empty($errors)) {

            $image = $_FILES['image'] ?? null;
            $imagePath = '';

            if ($image && $image['tmp_name']) {
                // Ensure products' previous file has been removed!
                if ($product['image']) {
                    unlink(__DIR__.'/public/'.$product['image']);
                }

                // Need to be sure PATH of file should be unique
                $imagePath = 'images/'.randomString(8).'/'.$image['name'];
                
                mkdir(dirname(__DIR__.'/public/'.$imagePath));
                move_uploaded_file($image['tmp_name'], __DIR__.'/public/'.$imagePath);
            }
        }     
    }
?>