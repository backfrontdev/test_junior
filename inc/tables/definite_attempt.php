<?php
/** @var array $data_attempts */
/** @var array $data_racers */
?>

<table class="table table-all">
    <thead class="table__head">
        <th>Место</th>
        <th>Гонщик</th>
        <th>Город</th>
        <th>Машина</th>
        <th>Результат</th>
    </thead>
    <tbody>
    <?php
    foreach (sortByAttempts($data_attempts, $_GET['attempt'])[0] as $key => $value) {
        ?>
        <tr>
            <td class="table__col"><?php if(!in_array($key+1, array(1,2,3))) echo $key+1 ?> </td>
            <td class="table__col"><?= getRacer($value, $data_racers)['name'] ?></td>
            <td class="table__col"><?= getRacer($value, $data_racers)['city'] ?></td>
            <td class="table__col"><?= getRacer($value, $data_racers)['car'] ?></td>
            <td class="table__col"><?= $value['result'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>