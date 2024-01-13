<div class="login-form">
    <form action="actions.php?action=login" method="POST">

        <h1>تسجيل الدخول</h1>

        <div style="margin: 10px 35px;">
            <?php require_once(dirname(__FILE__) . '/../includes/alerts.php'); ?>
        </div>

        <div class="content">
            <div class="input-field">
                <input type="email" name="email" placeholder="البريد الالكتروني" autocomplete="nope">
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="كلمة المرور" autocomplete="new-password">
            </div>
            <div class="input-field">
                <a style="font-size: 18px;" href="?page=registr">اذا لم يكن لديك حساب اضغط هنا</a>
            </div>
        </div>
        <div class="action">
            <button type="submit">تسجيل الدخول</button>
        </div>

    </form>
</div>