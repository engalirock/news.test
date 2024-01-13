<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">ادارة الاخبار</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">بيانات الاخبار</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <?php require_once(dirname(__FILE__) . '/../includes/alerts.php'); ?>

                    <?php $news = news_show_all(); ?>

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>رقم الخبر</th>
                                <th>عنوان الخبر</th>
                                <th>القسم</th>
                                <th>المحرر</th>
                                <th>التاريخ</th>
                                <th>الاجرائات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($news as $row) {
                                $user = user_show_by_id($row['user_id']);
                                $category = category_show_by_id($row['category_id']);
                            ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['title'] ?></td>
                                    <td><?= $category['name'] ?></td>
                                    <td><?= $user['name'] ?></td>
                                    <td style="direction: ltr;"><?= $row['datetime'] ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="index.php?page=news.edit&id=<?= $row['id'] ?>">تعديل</a>
                                        <button class="btn btn-danger btn-sm" onclick="deleteNews(<?= $row['id'] ?>)">حذف</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>

<script>
    function deleteNews(id) {
        if (confirm("هل انت متأكد من حذف هذا الخبر") == true) {
            location.href = "actions.php?action=news.delete&id="+id;
        }
    }
</script>