<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">ادارة المستخدمين</h1>
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
                    <h3 class="card-title">بيانات المستخدمين</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">

                    <?php require_once(dirname(__FILE__) . '/../includes/alerts.php'); ?>

                    <?php $users = user_show_all(); ?>

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>رقم المستخدم</th>
                                <th>اسم المستخدم</th>
                                <th>البريد الالكتروني</th>
                                <th>نوع المستخدم</th>
                                <th>التاريخ</th>
                                <th>الاجرائات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $row) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['type'] ?></td>
                                    <td style="direction: ltr;"><?= $row['datetime'] ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="index.php?page=user.edit&id=<?= $row['id'] ?>">تعديل</a>
                                        <button class="btn btn-danger btn-sm" onclick="deleteUser(<?= $row['id'] ?>)">حذف</button>
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
    function deleteUser(id) {
        if (confirm("هل انت متأكد من حذف هذا المستخدم") == true) {
            location.href = "actions.php?action=user.delete&id="+id;
        }
    }
</script>