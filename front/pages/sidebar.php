<!-- BEGIN sidebar -->
<div id="sidebar">
    <!-- begin search -->
    <form action="">
        <input type="hidden" name="page" value="search">
        <input type="text" name="q" value="" />
        <button type="submit">بحث</button>
    </form>
    <!-- end search -->
    <!-- begin popular articles -->
    <div class="box">
        <h2>احدث الاخبار</h2>
        <ul>
            <?php $news = news_show_all(5); ?>
            <?php foreach ($news as $row) { ?>
                <li><a href="?page=news.show&id=<?= $row['id'] ?>"><?= $row['title'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <!-- end popular articles -->

    <!-- begin flickr rss -->
    <div class="box">
        <h2>الصورة</h2>
        <p class="flickr">
            <?php $news = news_show_all(3); ?>
            <?php foreach ($news as $row) { ?>
                <a href="?page=news.show&id=<?= $row['id'] ?>"><img style="width: 100%;" src="uploads/<?= $row['image'] ?>" alt="" /></a>
            <?php } ?>
        </p>
    </div>
    <!-- end flickr rss -->

</div>
<!-- END sidebar -->