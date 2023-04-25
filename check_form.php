<?php
session_start();
unset($_SESSION["error_name"]);
unset($_SESSION["error_secondname"]);
unset($_SESSION["error_email"]);
unset($_SESSION["error_phone"]);
function redirect(){
    header('Location: index.php');
    exit;
}

$name = htmlspecialchars(trim($_POST["name"]));
$secondname = htmlspecialchars(trim($_POST["secondname"]));
$email = htmlspecialchars(trim($_POST["email"]));
$phone = htmlspecialchars(trim($_POST["phone"]));
$theme = htmlspecialchars(trim($_POST["theme"]));
$pay_way = htmlspecialchars(trim($_POST["pay-way"]));
$mailing = $_POST["mailing"];

$_SESSION["name"] = $name;
$_SESSION["secondname"] = $secondname;
$_SESSION["email"] = $email;
$_SESSION["phone"] = $phone;
$_SESSION["theme"] = $theme;


foreach ($_POST as $key => $value) {
    echo "$key: $value <br>";
}
echo "<br>";


if (empty($name) || strlen($name) < 1){
    $_SESSION["error_name"] = "Введите корректное имя.";
    redirect();
}
if (empty($secondname) || strlen($secondname) < 1){
    $_SESSION["error_secondname"] = "Введите корректную фамилию.";
    redirect();
}
if (empty($email) || strlen($email) < 1){
    $_SESSION["error_email"] = "Введите корректный адрес эл. почты.";
    redirect();
}
if (empty($phone) || strlen($phone) < 1){
    $_SESSION["error_phone"] = "Введите корректный номер телефона.";
    redirect();
}

$data = date("d-m-o H-i-e");

$file = fopen("form-$email $data.txt", "w");
foreach ($_POST as $key => $value) {
    fwrite($file, "$key: $value\n");
}
fwrite($file, "$data");
fclose($file);

$_SESSION["success"] = "Вы успешно отправили форму.";
redirect();