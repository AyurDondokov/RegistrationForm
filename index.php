<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <title>Registration form</title>
</head>
<body>
<?php
    session_start();
    require "blocks/header.php";
?>
<div class="container">
    <h1 class="title">Опрос для студентов</h1>
    <form action="check_form.php" method="post" class="main">
        <div class="success-text"><?=$_SESSION["success"]?></div>
        <label>
            <input class="block text-input" type="text" name="name" value="<?=$_SESSION['name']?>" placeholder="Имя">
            <div class="danger-text"><?=$_SESSION["error_name"]?></div>
        </label>
        <label class="block">
            <input class="block text-input" type="text" name="secondname"  value="<?=$_SESSION['secondname']?>" placeholder="Фамилия">
            <div class="danger-text"><?=$_SESSION["error_secondname"]?></div>
        </label>
        <label class="block">
            <input class="block text-input" type="email" name="email" value="<?=$_SESSION['email']?>" placeholder="Email">
            <div class="danger-text"><?=$_SESSION["error_email"]?></div>
        </label>
        <label class="block">
            <input class="block text-input" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phone" value="<?=$_SESSION['phone']?>" placeholder="924-000-0000">
            <div class="danger-text"><?=$_SESSION["error_phone"]?></div>
        </label>
        <label class="block">
            Интересующая вас тема конференции:
            <select class="block text-input" name="theme">
                <option value="business">Бизнес
                <option value="tech">Технологии
                <option value="ad">Реклама и маркетинг
            </select>
        </label>
        <label class="block">
            Метод оплаты:
            <select class="block text-input" name="pay-way">
                <option value="webmoney">WebMoney
                <option value="yandexmoney">Яндекс.Деньги
                <option value="paypal">PayPal
                <option value="creditcard">Кредитная карта
            </select>
        </label>
        <label class="block mailing">
            Получать рассылку о конференции <input class="cus" type="checkbox" name="mailing" value="<?=$_SESSION['mailing']?>">
        </label>
        <input class="button" type="submit" value="Отправить">
    </form>
</div>
</body>
</html>