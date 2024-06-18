<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE PRODUCT</title>
</head>
<body>
    
    <div class="content">
        <div class="addproduct">
            <a href="index.php?controller=list&action=product-list" class="list">List product</a>
            <h3>Update product</h3>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="name" value="<?php echo $dataID['name']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td><input type="text" name="price" value="<?php echo $dataID['price']; ?>"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="update_product" value="UPDATE"></td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($thanhcong) && in_array('add_success', $thanhcong)){
                    echo "<p style='color: green; text-align:center'>TChinh sua product thanh cong</p>";
                }
             ?>
        </div>
    </div>
</body>
</html>