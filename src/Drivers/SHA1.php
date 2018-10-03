<?php

namespace Karamel\Hash\Drivers;

use Karamel\Hash\Interfaces\IHash;

class SHA1 implements IHash
{
    private $salt;

    public function __construct($salt)
    {
        $this->salt = $salt;
    }

    public function make($string, $rounds = 10)
    {
        return  $this->hash($string, $rounds);
    }

    private function hash($string, $rounds)
    {
        for ($i = 0; $i < pow(2, $rounds); $i++) {
            $string = sha1($this->salt . $string);
        }
        return '$' . $rounds . '$' .$string;
    }

    public function verify($string, $hashedString)
    {
        $matches = [];
        preg_match("/^\$([0-9]+)\$(.*)/i",$hashedString,$matches);
        $rounds = $matches[1];
        $baseString = $matches[2];
        $newHashedString = $this->hash($baseString,$rounds);
        return $newHashedString == $hashedString;
    }
}