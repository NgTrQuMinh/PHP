<?php
require_once 'data/post.php';
require_once 'inc/header.php';
?>

<div class="container">
    <h1>Trang Sản Phẩm</h1>
    <div id="menu-products">
        <?php foreach ($listPost as $item) { ?>
            <div class="item">
                <h2><?php echo $item['title'] ?></h2>
                <p><?php echo $item['content'] ?></p>
            </div>
        <?php } ?>
    </div>

</div>
<?php require_once 'inc/footer.php'; ?>