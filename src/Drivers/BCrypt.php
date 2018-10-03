<?php

namespace Karamel\Hash\Drivers;

use Karamel\Hash\Interfaces\IHash;

class BCrypt implements IHash
{
    private $salt;

    public function __construct($salt)
    {
        $this->salt = $salt;
    }

    public function make($string, $rounds = 10)
    {
        return password_hash($string, PASSWORD_BCRYPT, ['cost' => $rounds]);
    }

    public function verify($string, $hashedString)
    {
        return password_verify($string, $hashedString);
    }
}