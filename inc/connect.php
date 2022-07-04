<?php
    // данные с сервера сразу преобразуются в PHP массив
    $data_attempts = json_decode(file_get_contents('https://gitlab.stmd.pro/startmedia/test-junior/-/raw/master/data_attempts.json'), true);
    $data_racers = json_decode(file_get_contents('https://gitlab.stmd.pro/startmedia/test-junior/-/raw/master/data_cars.json'), true);

    // количество заездов
    $count_attempts = max(array_count_values(array_column($data_attempts, 'id')));
    // количество участников
    $count_racers = count($data_racers);
