<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <title>Registration form</title>
</head>
<body>
<?php
require "blocks/header.php";
?>
<div class="container">
    <form action="delete.php" method="post">
        <table class="users-list">
            <thead class="users-list-head">
                <tr>
                    <th class="users-list-user">ID</th>
                    <th class="users-list-user">Имя</th>
                    <th class="users-list-user">Фамилия</th>
                    <th class="users-list-user">E-mail</th>
                    <th class="users-list-user">Телефон</th>
                    <th class="users-list-user">Тема</th>
                    <th class="users-list-user">Способ оплаты</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach(glob('form-*.txt') as $file) {
                echo "<tr><th class='users-list-user'>".$i.'</th>';
                foreach (file(basename($file)) as $line){
                    if (strlen(str_replace('/\s/', '', explode(':', $line)[1])) > 1){
                        echo "<th class='users-list-user'>".str_replace('/\s/', '', explode(':', $line)[1]).'</th>';
                    }
                }
                echo "<th class='users-list-user'> <input class='custom-checkbox' type='checkbox' name='checks[]' value='".($i-1)."'> </th> </tr>";
                $i++;
            }

            ?>
            </tbody>

        </table>
        <input class="button" type="submit" value="Удалить">
    </form>
</div>
</body>
</html>
