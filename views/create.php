<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD PRODUCT</title>
</head>
<body>
    <div class="content">
        <div class="addproduct">
            <a href="index.php?controller=list&action=product-list" class="list">List product</a>
            <h3>Add product</h3>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Name: </td>
                        <td><input type="text" name="name" placeholder="Name"></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td><input type="text" name="price" placeholder="Price"></td>
                    </tr>
                    <tr>
                        <td>Brand:</td>
                       <td>
                            <select name="id_brand">
                                <?php
                                    if ($brands && is_array($brands)) {
                                        foreach ($brands as $brand) {
                                            echo "<option value='{$brand['id']}'>{$brand['name']}</option>";
                                        }
                                    }
                                ?>
                            </select>
                       </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" name="add_product" value="ADD"></td>
                    </tr>
                </table>
            </form>
            <?php
                if(isset($thanhcong) && in_array('add_success', $thanhcong)){
                    echo "<p style='color: green; text-align:center'>Them moi product thanh cong</p>";
                }
             ?>
        </div>
    </div>
</body>
</html>