<?php include __DIR__ . '/../header.php'; ?>
    <div style="text-align: center;">
        <h1>Регистрация</h1>
        <?php if (!empty($error)): ?>
            <div style="background-color: red;padding: 5px;margin: 15px"><?= $error ?></div>
        <?php endif; ?>
        <form action="/users/register" method="post">
            <label>Nickname <input value="<?=$_POST['nickname']?>" type="text" name="nickname"></label>
            <br><br>
            <label>Email <input value="<?=$_POST['email']?>" type="text" name="email"></label>
            <br><br>
            <label>Пароль <input value="<?=$_POST['password']?>" type="password" name="password"></label>
            <br><br>
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>
<?php include __DIR__ . '/../footer.php'; ?>