<?php

namespace Karamel\Hash\Interfaces;
interface IHash
{
    public function make($string, $rounds = 10);

    public function verify($string, $hashedString);
}