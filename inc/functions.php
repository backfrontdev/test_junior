<?php

// получить объект Гонщик
function getRacer($attempt, $racers)
{
    // перебор всех гонщиков и поиск по ID
    foreach ($racers as $racer) if ($attempt['id'] === $racer['id']) return $racer;
    return 'Участник не определен';
}

// сортировка по попыткам
function sortByAttempts($attempts, $attempt = 1): array
{
    $tmpArray = []; $newArray = [];

    // разбивка всего массива по гонщикам
    array_walk($attempts, function ($item) use (&$tmpArray) {
        $tmpArray[$item['id']][] = $item;
    });

    foreach ($tmpArray as $key => $value){
        $newArray[$key] = $value[$attempt-1];
    }

    // сортировка по убыванию
    usort($newArray, function ($a, $b) { return $b['result'] <=> $a['result']; });

    return [$newArray];
}

// получение суммы всех n попыток у каждого гонщика
function getTotalPoints($attempts): array
{
    $tmpArray = []; $newArray = [];
    // разбивка всего массив по гонщикам
    array_walk($attempts, function ($item, $key) use (&$tmpArray) { $tmpArray[$item['id']][] = $item; });
    // сумма за все поездки у каждого гонщика
    foreach ($tmpArray as $key => $value){
        $newArray[$key]['id'] = $value[0]['id'];
        $newArray[$key]['result'] = array_sum(array_column($value, 'result'));
    }
    // сортировка массива по убыванию
    usort($newArray, function ($a, $b) { return $b['result'] <=> $a['result']; });
    return $newArray;
}

