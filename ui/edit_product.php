<?php require_once('header.php') ?>
<?php require_once('config.php') ?>


<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = query("SELECT * from tbl_product where product_id = '$id'");

    while ($row = mysqli_fetch_array($query)) {

        $pname = $row['product_name'];
        $qty = $row['product_qty'];
        $price = $row['product_price'];
    }
}


if (isset($_POST["btn_update"])) {
    $pro_name = $_POST['txt_name'];
    $pro_qty = $_POST['txt_qty'];
    $pro_price = $_POST['txt_price'];

    $pro_img = $_FILES['myfile']['tmp_name'];

    $img_name = $_FILES['myfile']['name'];


    if (empty($img_name)) {
        $query = query("UPDATE tbl_product SET product_name='$pro_name',product_qty='$pro_qty',product_price=' $pro_price' where product_id='$id'");
        if ($query) {
            set_message('Update successfully');
            header("Location:product.php");
        } else {
            set_message('Update Errorrrrrrrr');
        }
    } else {
        $query = query("UPDATE tbl_product SET product_name='$pro_name',product_qty='$pro_qty',product_price=' $pro_price',img='$img_name'where product_id='$id'");

        if ($query) {
            set_message('Update successfully');
            header("Location:product.php");
        } else {
            set_message('Update Errorrrrrrrr');
        }

        move_uploaded_file($pro_img, "img/" . $img_name);
    }




}

?>

<div class="add_pro">

    <form action="" method="post" enctype="multipart/form-data">
        <h1>Edit Product</h1>

        <label>Product Img</label>
        <input type="file" name="myfile">
        <br>
        <label>Product Name</label>
        <input type="text" name="txt_name" value="<?php echo $pname ?>">
        <br>
        <label>Quantiy</label>
        <input type="number" name="txt_qty" value="<?php echo $qty ?>">
        <br>
        <label>Price</label>
        <input type="number" name="txt_price" value="<?php echo $price ?>">
        <br>
        <input type="submit" name="btn_update" value="Edit Product">
    </form>
</div>


</div>

</body>

</html>