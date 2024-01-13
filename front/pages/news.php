<?php
$id = $_GET['id'];
$news = news_show_by_id($id);

$comments = comment_show_all_by_news_id($news['id']);

?>

<!-- BEGIN content -->
<div id="content">
    <div class="single">
        <h2><?= $news['title'] ?></h2>
        <div style="margin-top: 10px; margin-bottom: 10px;">
            <img style="width: 100%;" class="img-thumbnail" src="uploads/<?= $news['image'] ?>" alt="" />
        </div>
        <div class="content">
            <?= $news['content'] ?>
        </div>
    </div>

    <div id="comments">
        <h2 id="comments">التعليقات <span><?= $comments ? count($comments) : 0 ?></span></h2>
        <div style="margin-bottom: 20px; padding: 10px;">

            <?php if ($comments) { ?>
                <?php foreach ($comments as $comment) { 
                    $user = user_show_by_id($comment['user_id']);
                ?>
                    <div style="margin-bottom: 5px;padding: 10px;background-color: #e9e9e9;">
                        <div style="width: 12%;display: inline-block;text-align: center;font-size: 45px;vertical-align: top;">
                            <i class="far fa-comment"></i>
                        </div>
                        <div style="width: 85%;display: inline-block;">
                            <div style="display: block;margin-bottom: 30px;">
                                <div style="float: right;font-weight: bold;"><?= $user['name'] ?></div>
                                <div style="float: left;font-size: 90%;direction: ltr;"><?= $comment['datetime'] ?></div>
                            </div>
                            <div><?= $comment['comment'] ?></div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div style="text-align: center; font-size: 16px;">لا يوجد تعليقات</div>
            <?php } ?>

        </div>

        <div style="padding: 10px;">
            <h3 id="comment-add" style="margin-bottom: 10px;">اضف تعليقك</h3>
            <div style="margin-bottom: 10px;"><?php require_once(dirname(__FILE__) . '/../includes/alerts.php'); ?></div>
            <div class="box" id="respond">
                <div class="buffer">
                    <form action="actions.php?action=comment.add" method="post" id="commentform">
                        <input type="hidden" name="news_id" value="<?= $news['id'] ?>">
                        <p>
                            <textarea name="comment" id="comment" rows="5" tabindex="4"></textarea>
                        </p>
                        <p>
                            <button name="submit" type="submit" id="submit">ارسال التعليق</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- END content -->

<?php require_once(dirname(__FILE__) . '/sidebar.php'); ?>