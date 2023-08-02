<?php 


function set_message($smg){
if(!empty($smg)){
    $_SESSION['message'] = $smg;
}else{
    $smg = "";
}
}


function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}


function add_product(){

    
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

?>