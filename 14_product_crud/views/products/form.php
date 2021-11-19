
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
        <img src="/<?php echo $product['image'] ?>" class="update_image">
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