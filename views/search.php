
<div class="ds">
<a href="index.php?controller=list&action=product-list" class="list">List product</a>
    <h3>Search Results</h3>
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
                if ($dataSearch && is_array($dataSearch)) {
                    foreach ($dataSearch as $product) {
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
                    echo "<tr><td colspan='4'>No products found</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php
            if ($totalPages > 1) {
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo "<a href='index.php?controller=list&action=search&tukhoa={$key}&page=$i'>$i</a> ";
                }
            }
        ?>
    </div>
</div>

