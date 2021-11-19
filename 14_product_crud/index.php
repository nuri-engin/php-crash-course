<?php
    //Database Connection with PDO (more powerfull, OOP) instead mysqli
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //exec is not best practise
    $statment = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
    $statment->execute();
    $products = $statment->fetchAll(PDO::FETCH_ASSOC); // Fetch as Associative array.

    // echo '<pre>';
    // var_dump($products);
    // echo '</pre>';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
    >

    <link rel="stylesheet" href="app.css">

    <title>Products CRUD</title>
  </head>
  <body>
    <h1>Products CRUD</h1>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Price</th>
            <th scope="col">Create Date</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $i => $product): ?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $product['image'] ?></td>
                    <td><?php echo $product['title'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['create_date'] ?></td>
                    <td> 
                    <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                    <button type="button" class="btn btn-sm btn-outline-danger">Delete</button> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
  </body>
</html>
