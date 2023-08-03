<?php


function set_message($smg)
{
    if (!empty($smg)) {
        $_SESSION['message'] = $smg;
    } else {
        $smg = "";
    }
}


function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}


function add_product()
{


    if (isset($_POST["btn_addpro"])) {
        $pro_name = $_POST['txt_name'];
        $pro_qty = $_POST['txt_qty'];
        $pro_price = $_POST['txt_price'];

        $pro_img = $_FILES['myfile']['tmp_name'];

        $img_name = $_FILES['myfile']['name'];

        $query = query("INSERT INTO tbl_product(product_name,product_qty,product_price,img)VALUES('{$pro_name}','{$pro_qty}','{$pro_price}','{$img_name}')");

        if ($query) {
            set_message('successfully');
            header("Location:addproduct.php");
        } else {
            set_message('Errorrrrrrrr');
        }

        move_uploaded_file($pro_img, "img/" . $img_name);
    }
}



function show_product_list()
{

    if(isset($_POST['tbndelete'])){
        $delete = query("DELETE from tbl_product where product_id=".$_POST['tbndelete']);
        set_message ('DELETED');
        header("Location:product.php");
    }

    $query = query("SELECT * from tbl_product");
    $show = '';
    while ($row = mysqli_fetch_array($query)) {
        $show = '
        
        <tr class="tr_pro">
            <td>' . $row['product_name'] . '</td>
            <td><img src="img/' . $row['img'] . '" width="50"></td>
            <td>' . $row['product_qty'] . '</td>
            <td>' . $row['product_price'] . ' $</td>
            <td></td>
            <td><button type="submit" value="' . $row['product_id'] . '" name="tbndelete" title="Delete" style="background:red;">Delete</button></button></button></td>
        </tr>
        
        
        ';
        echo $show ;
    }
}
