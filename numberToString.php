<?php

public function numberToString($number, $case) {

    if (strlen($number) > 12) {
        return 'Слишком большое число (максимум 999 999 999 999)';
    }

    $dictionary = array(
        // словарь необходимых чисел
        array(
            -2  => array('две'),
            -1  => array('одна', 'одной', 'одной', 'одну', 'одной', 'одной'),
            1   => array('один', 'одного', 'одному', 'один', 'одним', 'одном'),
            2   => array('два', 'двух', 'двум', 'два', 'двумя', 'двух'),
            3   => array('три', 'трех', 'трем', 'три', 'тремя', 'трех'),
            4   => array('четыре', 'четырех', 'четырем', 'четыре', 'четырьмя', 'четырех'),
            5   => array('пять', 'пяти', 'пяти', 'пять', 'пятью', 'пяти'),
            6   => array('шесть', 'шести', 'шести', 'шесть', 'шестью', 'шести'),
            7   => array('семь', 'семи', 'семи', 'семь', 'семью', 'семи'),
            8   => array('восемь', 'восьми', 'восьми', 'восемь', 'восемью', 'восьми'),
            9   => array('девять', 'девяти', 'девяти', 'девять', 'девятью', 'девяти'),
            10  => array('десять', 'десяти', 'десяти', 'десять', 'десятью', 'десяти'),
            11  => array('одиннадцать', 'одиннадцати', 'одиннадцати', 'одиннадцать', 'одиннадцатью', 'одиннадцати'),
            12  => array('двенадцать', 'двенадцати', 'двенадцати', 'двенадцать', 'двенадцатью', 'двенадцати'),
            13  => array('тринадцать', 'тринадцати', 'тринадцати', 'тринадцать', 'тринадцатью', 'тринадцати'),
            14  => array('четырнадцать', 'четырнадцати', 'четырнадцати', 'четырнадцать', 'четырнадцатью', 'четырнадцати'),
            15  => array('пятнадцать', 'пятнадцати', 'пятнадцати', 'пятнадцать', 'пятнадцатью', 'пятнадцати'),
            16  => array('шестнадцать', 'шестнадцати', 'шестнадцати', 'шестнадцать', 'шестнадцатью', 'шестнадцати'),
            17  => array('семнадцать', 'семнадцати', 'семнадцати', 'семнадцать', 'семнадцатью', 'семнадцати'),
            18  => array('восемнадцать', 'восемнадцати', 'восемнадцати', 'восемнадцать', 'восемнадцатью', 'восемнадцати'),
            19  => array('девятнадцать', 'девятнадцати', 'девятнадцати', 'девятнадцать', 'девятнадцатью', 'девятнадцати'),
            20  => array('двадцать', 'двадцати', 'двадцати', 'двадцать', 'двадцатью', 'двадцати'),
            30  => array('тридцать', 'тридцати', 'тридцати', 'тридцать', 'тридцатью', 'тридцати'),
            40  => array('сорок', 'сорока', 'сорока', 'сорок', 'сорока', 'сорока'),
            50  => array('пятьдесят', 'пятидесяти', 'пятидесяти', 'пятьдесят', 'пятьюдесятью', 'пятидесяти'),
            60  => array('шестьдесят', 'шестидесяти', 'шестидесяти', 'шестьдесят', 'шестьюдесятью', 'шестидесяти'),
            70  => array('семьдесят', 'семидесяти', 'семидесяти', 'семьдесят', 'семьюдесятью', 'семидесяти'),
            80  => array('восемьдесят', 'восьмидесяти', 'восьмидесяти', 'восемьдесят', 'восемьюдесятью', 'восьмидесяти'),
            90  => array('девяносто', 'девяноста', 'девяноста', 'девяносто', 'девяноста', 'девяноста'),
            100 => array('сто', 'ста', 'ста', 'сто', 'ста', 'ста'),
            200 => array('двести', 'двухсот', 'двумстам', 'двести', 'двумястами', 'двухстах'),
            300 => array('триста', 'трёхсот', 'трёмстам', 'триста', 'тремястами' ,'трёхстах'),
            400 => array('четыреста', 'четырёхсот', 'четырёмстам', 'четыреста', 'четырьмястами', 'четырёхстах'),
            500 => array('пятьсот', 'пятисот', 'пятистам', 'пятьсот', 'пятьюстами', 'пятистах'),
            600 => array('шестьсот', 'шестисот', 'шестистам', 'шестьсот', 'шестьюстами', 'шестистах'),
            700 => array('семьсот', 'семисот', 'семистам', 'семьсот', 'семьюстами', 'семистах'),
            800 => array('восемьсот', 'восьмисот', 'восьмистам', 'восемьсот', 'восемьюстами', 'восьмистах'),
            900 => array('девятьсот', 'девятисот', 'девятистам', 'девятьсот', 'девятьюстами', 'девятистах')
        ),

        // словарь порядков со склонениями для плюрализации
        array(
            array(),
            array(
                array('тысяча', 'тысячи', 'тысяче', 'тысячу', 'тысячей', 'тысяче'),
                array('тысячи', 'тысяч', 'тысячам', 'тысячи', 'тысячами', 'тысячах'),
                array('тысяч', 'тысяч', 'тысячам', 'тысяч', 'тысячами', 'тысячах')
            ),
            array(
                array('миллион', 'миллиона', 'миллиону', 'миллион', 'миллионом', 'миллионе'),
                array('миллиона', 'миллионов', 'миллионам', 'миллиона', 'миллионами', 'миллионах'),
                array('миллионов', 'миллионов', 'миллионам', 'миллионов', 'миллионами', 'миллионах')
            ),
            array(
                array('миллиард', 'миллиарда', 'миллиарду', 'миллиард', 'миллиардом', 'миллиарде'),
                array('миллиарда', 'миллиардов', 'миллиардам', 'миллиарда', 'миллиардами', 'миллиардах'),
                array('миллиардов', 'миллиардов', 'миллиардам', 'миллиардов', 'миллиардами', 'миллиардах')
            )
        ),

        // карта плюрализации
        array(
            2, 0, 1, 1, 1, 2
        ),

        //карта падежей
        array(
            'и' => 0,
            'р' => 1,
            'д' => 2,
            'в' => 3,
            'т' => 4,
            'п' => 5
        )
    );

    // массив сгенерированных текстовых значений
    $string = array();

    // дополняем число нулями слева до количества цифр кратного трем
    $number = str_pad($number, ceil(strlen($number)/3)*3, 0, STR_PAD_LEFT);

    // разбиваем число на порядки из 3 цифр и инвертируем порядок частей,
    // для дальнейшего перебора от нижнего порядка к большему
    // т.к. максимальный порядок неизвестен
    $parts = array_reverse(str_split($number,3));

    // разбираем части
    foreach($parts as $partId => $part) {

        // если часть не равна нулю, нам надо преобразовать ее в текст
        if($part>0) {

            // массив частей составного числа для текущей части
            $digits = array();

            // если число треххзначное, запоминаем количество сотен
            if($part>99) {
                $digits[] = floor($part/100)*100;
            }

            // если последние 2 цифры не равны нулю, продолжаем искать составные числа
            if($mod1 = $part%100) {
                $mod2 = $part%10;
                $flag = $partId == 1 && $mod1 != 11 && $mod1 != 12 && $mod2 < 3 ? -1 : 1;
                if($mod1<20 || !$mod2) {
                    $digits[] = $flag*$mod1;
                } else {
                    $digits[] = floor($mod1/10)*10;
                    $digits[] = $flag*$mod2;
                }
            }

            // берем последнее составное число, для плюрализации
            $last = abs(end($digits));

            // преобразуем все составные числа в слова
            foreach($digits as $digitId => $digit) {
                $digits[$digitId] = $dictionary[0][$digit][$dictionary[3][$case]];
            }

            // добавляем обозначение порядка
            if ($partId > 0) {
                $digits[] = $dictionary[1][$partId][(($last%=100)>4 && $last<20) ? 2 : $dictionary[2][min($last%10,5)]][$dictionary[3][$case]];
            }

            // объединяем составные числа в строку и добавляем в начало массива сгенерированных текстовых значений
            array_unshift($string, join(' ', $digits));
        }
    }

    // преобразуем массив в итоговую строку
    return join(' ', $string);
}