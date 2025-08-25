<?php
class Validator
{
    public function isEmail($str)
    {
        return (bool)filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    public function isDomain($str)
    {
        return (bool)filter_var($str, FILTER_VALIDATE_DOMAIN);
    }

    public function inRange($num, $from, $to)
    {
        return ($num >= $from && $num <= $to);
    }

    public function inLength($str, $from, $to)
    {
        return (mb_strlen($str) >= $from && mb_strlen($str) <= $to);
    }
}

$validator = new Validator();

echo "mail@mail.com: ";
var_dump($validator->isEmail('mail@mail.com'));
echo "mail@mail: ";
var_dump($validator->isEmail("mail@mail"));
echo "empty string: ";
var_dump($validator->isEmail(""));

echo "<br>domain.com: ";
var_dump($validator->isDomain('domain.com'));
echo "домен.рф: ";
var_dump($validator->isDomain('домен.рф'));
echo "домен..рф: ";
var_dump($validator->isDomain('домен..рф'));
echo "sub.domain.com: ";
var_dump($validator->isDomain('sub.domain.com'));

echo "<br>5 in range 1..10: ";
var_dump($validator->inRange(5, 1, 10));
echo "55 in range 1..10: ";
var_dump($validator->inRange(55, 1, 10));
echo "0 in range 1..10: ";
var_dump($validator->inRange(0, 1, 10));

echo "<br>'text' in range 1..10: ";
var_dump($validator->inLength('text', 1, 10));
echo "'texttexttext' in range 1..10: ";
var_dump($validator->inLength('texttexttext', 1, 10));
echo "empty string: ";
var_dump($validator->inLength('', 1, 10));