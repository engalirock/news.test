<?php
$id = $_GET['id'];
$user = user_show_by_id($id);
?>
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
            <div class="row">
                <div class="col-xl-8 col-lg-12">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">تعديل بيانات المستخدم</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="actions.php?action=user.update&id=<?= $user['id'] ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">

                                <?php require_once(dirname(__FILE__) . '/../includes/alerts.php'); ?>

                                <div class="form-group">
                                    <label for="name">نوع المستخدم</label>
                                    <select class="form-control" name="type">
                                        <option <?= $user['type'] == 'user' ? 'selected':'' ?> value="user">User</option>
                                        <option <?= $user['type'] == 'admin' ? 'selected':'' ?> value="admin">Admin</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">اسم المستخدم</label>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" placeholder="ادخل اسم المستخدم">
                                </div>

                                <div class="form-group">
                                    <label for="description">البريد الالكتروني</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" placeholder="ادخل البريد الالكتروني">

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button name="submit" value="1" type="submit" class="btn btn-success">تعديل المستخدم</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </section>
</div>