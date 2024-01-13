<!-- BEGIN content -->
<div id="content">

    <?php $news = news_show_all(); ?>
    <?php foreach ($news as $row) {
        $user = user_show_by_id($row['user_id']);
        $category = category_show_by_id($row['category_id']);
        $commets_count = comment_get_count_by_news_id($row['id']);
    ?>
        <!-- begin post -->
        <div class="post">
            <p class="details1"><?= date('Y-m-d', strtotime($row['datetime'])) ?> / <a href="?page=category.show&id=<?= $category['id'] ?>"><?= $category['name'] ?></a></p>
            <div class="buffer">
                <div class="content">
                    <a href="?page=news.show&id=<?= $row['id'] ?>">
                        <img src="uploads/<?= $row['image'] ?>" />
                    </a>
                    <h2><a href="?page=news.show&id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h2>
                    <p><?= $row['description'] ?></p>
                </div>
                <p class="details2"><a href="?page=news.show&id=<?= $row['id'] ?>#comments"><?= $commets_count ?> تعليقات</a> / <a href="?page=news.show&id=<?= $row['id'] ?>">اقرا المزيد</a></p>
            </div>
        </div>
        <!-- end post -->
    <?php } ?>

</div>
<!-- END content -->

<?php require_once(dirname(__FILE__) . '/sidebar.php'); ?>