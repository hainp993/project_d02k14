<?php
$sql_menu = "SELECT * FROM tbl_category ORDER BY cate_id ASC";
$query_menu = mysqli_query($connect, $sql_menu);
?>
<div id="menu" class="collapse navbar-collapse">
    <ul>
        <?php
        while($item = mysqli_fetch_array($query_menu)) {
        ?>
        <li class="menu-item"><a href="index.php?redirect=category&cate_id=<?php echo $item['cate_id']; ?>"><?php echo $item['cate_name']; ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>