<?php

class OJLib {
    /**
     * Return password hash, to be consistence with old OJ
     * @param  string $pass [description]
     * @return string Hashed password
     */
    public static function hashPassword($password) {
        return sha1(md5($password));
    }
    
}