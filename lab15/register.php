<?php
require_once 'includes/config.php';
require_once 'includes/header.php';
?>

<div class="register-form">
    <h2>Регистрация</h2>
    <form action="process_register.php" method="POST" id="registerForm">
        <div class="form-group">
            <label for="fullname">ФИО:</label>
            <input type="text" id="fullname" name="fullname" required>
            <span class="error" id="fullname-error"></span>
        </div>

        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required>
            <span class="error" id="login-error"></span>
            <small>Минимум 12 символов, только английские буквы, цифры и знак подчеркивания</small>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <span class="error" id="email-error"></span>
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <span class="error" id="password-error"></span>
            <small>Минимум 8 символов, латинские и русские буквы</small>
        </div>

        <div class="form-group">
            <label for="confirm_password">Повторите пароль:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <span class="error" id="confirm-password-error"></span>
        </div>

        <div class="form-group">
            <label for="captcha">Решите пример: <span id="captcha-question"></span></label>
            <input type="text" id="captcha" name="captcha" required>
            <input type="hidden" id="captcha-answer" name="captcha-answer">
            <span class="error" id="captcha-error"></span>
        </div>

        <button type="submit">Зарегистрироваться</button>
    </form>
    <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
</div>

<?php require_once 'includes/footer.php'; ?>
