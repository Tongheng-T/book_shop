<?php require_once('header.php') ?>
<?php require_once('config.php') ?>


<div class="prolist" align='center'>

    <h2>Product list</h2>
    <h3><?php display_message(); ?></h3>

    <form action="" method="post">
        <table class="table">
            <thead>
                <tr class="tr_pro">
                    <th>Product Name</th>
                    <th>img</th>
                    <th>Quantiy</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php show_product_list() ?>



            </tbody>

        </table>

    </form>
</div>






<?php require_once('fooder.php') ?>