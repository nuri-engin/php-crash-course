<?php
    require_once "helpers/databaseConnection.php"; 
    
    //exec is not best practise
    $statment = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
    $statment->execute();
    $products = $statment->fetchAll(PDO::FETCH_ASSOC); // Fetch as Associative array.
?>

<?php include_once "components/header.php"; ?> 
    <h1>Products CRUD</h1>

    <p>
        <a href="create.php" class="btn btn-success">
            Create Product
        </a>
    </p>

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
                    <td>
                        <img
                            class="thumb-image" 
                            src="<?php echo $product['image'] ?>" 
                        />
                    </td>
                    <td><?php echo $product['title'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['create_date'] ?></td>
                    <td> 
                    <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $product['id'] ?>" />
                        <button type="submit" class="btn btn-sm btn-outline-danger"> 
                            Delete
                        </button> 
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
<?php include_once "components/footer.php"; ?> 