<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">ادارة الاقسام</h1>
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
                    <h3 class="card-title">بيانات الاقسام</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <?php require_once(dirname(__FILE__) . '/../includes/alerts.php'); ?>

                    <?php $categories = category_show_all(); ?>

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>رقم القسم</th>
                                <th>اسم القسم</th>
                                <th>الاجرائات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($categories as $category) {
                            ?>
                                <tr>
                                    <td><?= $category['id'] ?></td>
                                    <td><?= $category['name'] ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="index.php?page=category.edit&id=<?= $category['id'] ?>">تعديل</a>
                                        <button class="btn btn-danger btn-sm" onclick="deleteCategory(<?= $category['id'] ?>)">حذف</button>
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
    function deleteCategory(id) {
        if (confirm("هل انت متأكد من حذف هذا القسم") == true) {
            location.href = "actions.php?action=category.delete&id="+id;
        }
    }
</script>