<?php


// use common\OverloadTest;
// use utils\Overload;

include 'common/OverloadTest.php';

OverloadTest::bindOverloadMethod('test', function ($nickname)
{
    echo $nickname;
});

OverloadTest::bindOverloadMethod('test', function ($firstName, $lastName)
{
    echo $firstName . '|' . $lastName;
});

$testObj = new OverloadTest();
$testObj->test('Learoy', 'Z');
echo '<br>';
$testObj->test('nickname');
exit;
