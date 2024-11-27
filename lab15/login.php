<?php
require_once 'includes/config.php';
require_once 'includes/header.php';

// Если пользователь уже авторизован, перенаправляем на главную
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<div class="login-form">
    <h2>Вход</h2>
    <?php if (isset($_GET['success'])): ?>
        <div class="success-message">Регистрация успешна! Войдите в свой аккаунт.</div>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['login_error'])): ?>
        <div class="error-message"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
    <?php endif; ?>

    <form action="process_login.php" method="POST">
        <div class="form-group">
            <label for="login">Логин:</label>
            <input type="text" id="login" name="login" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Войти</button>
    </form>
    <p>Нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
</div>

<?php require_once 'includes/footer.php'; ?>
