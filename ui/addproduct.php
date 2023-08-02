<?php require_once('header.php') ?>
<?php require_once('config.php') ?>




<div class="add_pro">

    <form action="" method="post" enctype="multipart/form-data">
        <h1>Add Product</h1>
        <h3><?php display_message(); ?></h3>
        <?php add_product();?>
        <label>Product Img</label>
        <input type="file" name="myfile">
        <br>
        <label>Product Name</label>
        <input type="text" name="txt_name">
        <br>
        <label>Quantiy</label>
        <input type="number" name="txt_qty">
        <br>
        <label>Price</label>
        <input type="number" name="txt_price">
        <br>
        <input type="submit" name="btn_addpro" value="Add Product">
    </form>
</div>


</div>

</body>

</html>