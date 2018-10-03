<?php
namespace Karamel\Hash;
use Karamel\Hash\Drivers\BCrypt;
use Karamel\Hash\Drivers\MD5;
use Karamel\Hash\Drivers\SHA1;

class HashFactory{

    public static function build($type,$salt)
    {
        switch ($type){
            case 'sha1':
                return new SHA1($salt);
            case 'md5':
                return new MD5($salt);
            case 'bcrypt':
                return new BCrypt($salt);
        }
    }
}