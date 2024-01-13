<?php
$id = $_GET['id'];
$category = category_show_by_id($id);
$news = news_show_by_category_id($category['id']);
?>
<!-- BEGIN content -->
<div id="content">

    <h1 style="margin-top: 10px;"><?= $category['name'] ?></h1>
    <?php foreach ($news as $row) {
        $user = user_show_by_id($row['user_id']);
        $category = category_show_by_id($row['category_id']);
        $commets_count = comment_get_count_by_news_id($row['id']);
    ?>
        <!-- begin post -->
        <div style="width: calc(100% - 10px);background-color: #ebebeb;margin-top: 10px;">
            <div style="padding: 10px;">
                <div style="width: 30%;display: inline-block;vertical-align: top;padding-top: 10px;">
                    <a href="?page=news.show&id=<?= $row['id'] ?>">
                        <img style="max-width: 100%;" src="uploads/<?= $row['image'] ?>" />
                    </a>
                </div>
                <div style="width: 69%;display: inline-block;">
                    <div style="padding: 10px;">
                        <h2 style="font-size: 16px;"><a href="?page=news.show&id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h2>
                        <div>
                            <span><?= date('Y-m-d', strtotime($row['datetime'])) ?></span> / في <a href="?page=category.show&id=<?= $category['id'] ?>"><?= $category['name'] ?></a>
                        </div>
                        <p><?= $row['description'] ?></p>
                        <div>
                            <a href="?page=news.show&id=<?= $row['id'] ?>#comments"><?= $commets_count ?> تعليقات</a> / <a href="?page=news.show&id=<?= $row['id'] ?>">اقرا المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end post -->
    <?php } ?>

</div>
<!-- END content -->

<?php require_once(dirname(__FILE__) . '/sidebar.php'); ?>