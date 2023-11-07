
<div style="display: flex; gap: 50px;">
    <h1>Личный кабинет</h1>
    <?php if (isset($_COOKIE['userData'])): ?>
        <form action="../register.php" method="POST">
            <input type="submit" name="logout" value="Выход">
        </form>
    <?php else: ?>
        <a href="?page=contact">Зарегистрироваться</a>
    <?php endif; ?>
</div>

<?php 

$labelsOnRussian = [
    'login' => 'Логин',
    'firstName' => 'Имя',
    'lastName' => 'Фамилия',
    'phone' => 'Телефон',
    'email' => 'Почта',
    'passwordHash' => 'Пароль',
];

function getRusLabel($rusLabels, $beChanged) {
    $translated = 'unknown_label';
    foreach ($rusLabels as $key => $value) {
        if ($beChanged == $key) {
            $translated = $value;
        }
    }
    return $translated;
}

if (isset($_COOKIE['userData'])) {
    
    $userData = json_decode($_COOKIE['userData']);
    $result = '';
    foreach ($userData as $key => $value) {
        $result .= "<div>" . getRusLabel($labelsOnRussian, $key) . " - $value</div>";
    }
    echo $result;
    
} else {
    echo "<h3>Нет зарегистрированных пользователей.</h3>";
}
