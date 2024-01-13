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
            <div class="row">
                <div class="col-lg-6">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">اضافة قسم</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="actions.php?action=category.create" method="post">
                            <div class="card-body">

                                <?php require_once(dirname(__FILE__) . '/../includes/alerts.php'); ?>

                                <div class="form-group">
                                    <label for="name">اسم القسم</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="ادخل اسم القسم">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button name="submit" value="1" type="submit" class="btn btn-primary">اضافة القسم</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </section>
</div>