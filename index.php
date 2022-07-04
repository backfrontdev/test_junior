<?php
/**
 * @var $count_attempts int количество попыток у каждого гонщика из connect.php
 */

require './inc/connect.php';
require './inc/functions.php';

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Таблица рекордов по заездам</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/script.js" defer></script>
</head>
<body>



<div class="table-wrapper">
    <p class="table-header">Результаты гонок</p>
    <label for="changeAttempt">Выберите попытку</label>
    <select id="changeAttempt" onchange="redirectToAttempt(this)">
        <option value="all">Все попытки</option>
        <?php for($i = 1; $i<=$count_attempts; $i++) { ?>
            <option
                <?php if(isset($_GET['attempt']) && (int)$_GET['attempt'] === $i) echo 'selected'?>
                    value="<?= $i ?>"
            >
                <?= $i ?>-ая попытка
            </option>
        <?php } ?>
    </select>
    <?php
        // подключение нужной таблицы в зависимости от get параметра
        if(isset($_GET['attempt']) && $_GET['attempt'] === 'all' ||
            !isset($_GET['attempt'])){
            include './inc/tables/all_attempts.php';
        }
        if(isset($_GET['attempt']) && is_numeric($_GET['attempt'])){
            include './inc/tables/definite_attempt.php';
        }
    ?>
</div>

</body>
</html>