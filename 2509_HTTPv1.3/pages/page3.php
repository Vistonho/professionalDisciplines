<h1>Регистрация</h1>

<form action="../register.php" method="post" style="display: flex; flex-direction: column; gap: 20px;">
    <div>
        <label for="loginInput">Логин: </label>
        <input type="text" name="login" id="loginInput">
    </div>
    <div>
        <label for="firstNameInput">Имя: </label>
        <input type="text" name="firstName" id="firstNameInput">
    </div>
    <div>
        <label for="lastNameInput">Фамилия: </label>
        <input type="text" name="lastName" id="lastNameInput">
    </div>
    <div>
        <label for="phoneInput">Телефон: </label>
        <input type="text" name="phone" id="phoneInput">
    </div>
    <div>
        <label for="emailInput">Почта: </label>
        <input type="text" name="email" id="emailInput">
    </div>
    <div>
        <label for="passwordInput">Пароль: </label>
        <input type="password" name="password" id="passwordInput">
    </div>
    <div>
        <input type="submit" name="sendRegister" value="Зарегистрироваться">
    </div>
    
</form>

<?php
