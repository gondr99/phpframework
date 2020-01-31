<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 2020-01-30
 * Time: 오전 9:51
 */

namespace Gondr\App;


class User
{
    public function checkLogin()
    {
        return session()->has("user");
    }

    public function login(string $id, string $password)
    {
        $sql = "SELECT * FROM users WHERE id = ? AND password = PASSWORD(?)";
        $user = DB::fetch($sql, [$id, $password]);

        if($user == null){
            return false;
        }

        session()->set("user", $user);
        return $user;
    }

    public function get()
    {
        return session()->get('user', true);
    }

    public function logout()
    {
        session()->remove("user");
    }
}