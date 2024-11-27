document.addEventListener('DOMContentLoaded', function() {
    // Генерация капчи
    function generateCaptcha() {
        const a = Math.floor(Math.random() * 2) + 1;
        const b = Math.floor(Math.random() * 2) + 1;
        const question = `${a}-3+${b}-2`;
        const answer = 'a'.repeat(a * 3) + 'b'.repeat(b * 2);
        
        document.getElementById('captcha-question').textContent = question;
        document.getElementById('captcha-answer').value = answer;
    }

    // Валидация формы
    function validateForm(e) {
        let isValid = true;
        const form = e.target;

        // Валидация логина
        const login = form.login.value;
        const loginRegex = /^[a-zA-Z0-9_]{12,}$/;
        const consecutiveChars = /(.)\1\1/;
        
        if (!loginRegex.test(login)) {
            showError('login', 'Логин должен содержать минимум 12 символов и только английские буквы, цифры и подчеркивание');
            isValid = false;
        } else if (consecutiveChars.test(login)) {
            showError('login', 'Логин не должен содержать 3 одинаковых символа подряд');
            isValid = false;
        }

        // Валидация email
        const email = form.email.value;
        if (email.toLowerCase().endsWith('.apo')) {
            showError('email', 'Использование домена .apo запрещено');
            isValid = false;
        }

        // Валидация пароля
        const password = form.password.value;
        const passwordRegex = /^(?=.*[a-zA-Z])(?=.*[а-яА-Я])[^#$%+-]{8,}$/;
        
        if (!passwordRegex.test(password)) {
            showError('password', 'Пароль должен содержать минимум 8 символов, латинские и русские буквы, без символов #$%+-');
            isValid = false;
        }

        // Проверка совпадения паролей
        if (password !== form.confirm_password.value) {
            showError('confirm-password', 'Пароли не совпадают');
            isValid = false;
        }

        // Проверка капчи
        const captcha = form.captcha.value;
        const correctAnswer = form.querySelector('#captcha-answer').value;
        
        if (captcha !== correctAnswer) {
            showError('captcha', 'Неверный ответ');
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    }

    // Функция отображения ошибок
    function showError(fieldId, message) {
        const errorElement = document.getElementById(`${fieldId}-error`);
        if (errorElement) {
            errorElement.textContent = message;
        }
    }

    // Очистка ошибок при вводе
    function clearError(e) {
        const errorElement = document.getElementById(`${e.target.id}-error`);
        if (errorElement) {
            errorElement.textContent = '';
        }
    }

    // Инициализация
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
        generateCaptcha();
        registerForm.addEventListener('submit', validateForm);
        
        // Добавляем очистку ошибок при вводе для всех полей
        const inputs = registerForm.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('input', clearError);
        });
    }
});
