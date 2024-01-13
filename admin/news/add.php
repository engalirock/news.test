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
            <div class="row">
                <div class="col-xl-8 col-lg-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">اضافة خبر</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="actions.php?action=news.create" method="post" enctype="multipart/form-data">
                            <div class="card-body">

                                <?php require_once(dirname(__FILE__) . '/../includes/alerts.php'); ?>

                                <div class="form-group">
                                    <label for="name">قسم الخبر</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">--- اختر القسم ---</option>
                                        <?php
                                        $categories = category_show_all();
                                        $old_category_id = getOldData('category_id');
                                        ?>
                                        <?php foreach ($categories as $category) { ?>
                                            <option <?= $old_category_id == $category['id'] ? 'selected' : '' ?> value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">عنوان الخبر</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= getOldData('title') ?>" placeholder="ادخل عنوان الخبر">
                                </div>

                                <div class="form-group">
                                    <label for="description">وصف الخبر</label>
                                    <textarea class="form-control" id="description" name="description" rows="5"><?= getOldData('description') ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="summernote">الخبر</label>
                                    <textarea class="tinymce-editor" name="content"><?= getOldData('content') ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="image">الصورة</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="form-control" id="image" name="image">
                                            <label class="custom-file-label" for="image">اختر الصورة</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button name="submit" value="1" type="submit" class="btn btn-primary">اضافة الخبر</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </section>
</div>

<script>
    $(function() {
        // Summernote
        tinymce.init({
            selector: 'textarea.tinymce-editor',
            // plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            //other configuration,
            promotion: false,
        });
    })
</script>