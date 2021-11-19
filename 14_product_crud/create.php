
<?php
    //Database Connection with PDO (more powerfull, OOP) instead mysqli
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<?php include_once "components/header.php"; ?> 
    <h1>Create new product</h1>

    <p>
        <a href="create.php" class="btn btn-success">
            Create Product
        </a>
    </p>

    <form>
        <div class="mb-3">
            <label class="form-label">Product Image</label>
            <input type="file" class="form-control">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Product Title</label>
            <input type="text" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Product Description</label>
            <textarea class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Price</label>
            <input type="number" step=".01" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php include_once "components/footer.php"; ?> 
