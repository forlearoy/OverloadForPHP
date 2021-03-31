<?php

// use utils\OverloadDecorator;

include 'utils/OverloadDecorator.php';

$a = new stdClass();

$overload = new OverloadDecorator($a);

$allNameFunc = function ($firstName, $secondName)
{
    echo $firstName . ' ' . $secondName;
};
$overload->bindOverloadMethod('test', $allNameFunc);

$overload->test('Learoy', 'Z');
echo '<br>';

$justNicknameFunc = function ($nickname)
{
    echo $nickname;
};
$overload->bindOverloadMethod('test', $justNicknameFunc);
$overload->test('nickname');
