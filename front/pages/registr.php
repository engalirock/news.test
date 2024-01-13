<div class="login-form">
    <form action="actions.php?action=registr" method="POST">
        <h1>تسجيل حساب جديد</h1>

        <div style="margin: 10px 35px;">
            <?php require_once(dirname(__FILE__) . '/../includes/alerts.php'); ?>
        </div>

        <div class="content">
            <div class="input-field">
                <input type="text" name="name" value="<?= getOldData('name') ?>" placeholder="الاسم">
            </div>
            <div class="input-field">
                <input type="email" name="email" value="<?= getOldData('email') ?>" placeholder="البريد الالكتروني">
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="كلمة المرور" autocomplete="new-password">
            </div>
            <div class="input-field">
                <input type="password" name="password_confirm" placeholder="تأكيد كلمة المرور" autocomplete="new-password">
            </div>
            <div class="input-field">
                <a style="font-size: 18px;" href="?page=login">اذا كان لديك حساب بالفعل اضغط هنا</a>
            </div>
        </div>
        <div class="action">
            <button type="submit">تسجيل حساب جديد</button>
        </div>
    </form>
</div>