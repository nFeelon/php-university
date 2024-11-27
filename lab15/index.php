<?php
require_once 'includes/config.php';
require_once 'includes/header.php';

// Проверка авторизации
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<div class="container main-content">
    <h1>Лабораторные работы</h1>
    <div class="lab-grid">
        <?php
        // Генерация ссылок на лабораторные работы
        for ($i = 4; $i <= 14; $i++) {
            $current = ($i == 14) ? ' class="current"' : '';
            echo "<a href='../lab{$i}/lab{$i}.php' class='lab-link'{$current}>
                    <div class='lab-number'>№{$i}</div>
                    <div class='lab-title'>Лабораторная работа {$i}</div>
                  </a>";
        }
        ?>
    </div>
</div>

<style>
    .lab-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
        padding-bottom: 4rem;
    }

    .lab-link {
        background-color: var(--surface-color);
        padding: 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        color: var(--text-primary);
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .lab-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .lab-number {
        font-size: 1.5rem;
        font-weight: 500;
        color: var(--primary-color);
        margin-bottom: 0.5rem;
    }

    .lab-title {
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    .lab-link.current {
        border: 2px solid var(--primary-color);
    }
</style>

<?php require_once 'includes/footer.php'; ?>