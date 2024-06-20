<div id="tk">
    <h4>Search</h4>
    <div class="price-range">
        <div class="well text-center">
            <form action="" method="GET">
                <table>
                    <tr>
                        <input type="hidden" name="controller" value="list">
                        <td><input type="text" name="tukhoa" placeholder="Search by name"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="gia" placeholder="Maximum price"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Search"></td>
                    </tr>
                </table>
                <input type="hidden" name="action" value="search">
            </form>
        </div>
    </div>
</div>
<div class="ds">
<a href="index.php?controller=list&action=add">Add product</a>
    <h3>List product</h3>
    <table border="1px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Brand</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($data && is_array($data)) {
                    foreach ($data as $product) {
                        echo "<tr>
                            <td>{$product['id']}</td>
                            <td>{$product['name']}</td>
                            <td>{$product['price']}</td>
                            <td>{$product['brands_name']}</td>
                            <td>
                                <a href='index.php?controller=list&action=edit&id={$product['id']}'>Edit</a> | 
                                <a onclick='return confirm(\"Bạn có chắc chắn muốn xóa không?\")' href='index.php?controller=list&action=delete&id={$product['id']}'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No products found</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php
            if ($totalPages > 1) {
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<a href='index.php?controller=list&action=list&page=$i'>$i</a> ";
                }
            }
        ?>
    </div>
</div>




