<?php
/**
 * Created by PhpStorm.
 * User: School
 * Date: 2020-01-29
 * Time: 오후 12:02
 */

namespace Gondr\App;


class DB
{
    private static $db = null;

    private static function getDB()
    {
        if(is_null(self::$db)) {
            self::$db = new \PDO("mysql:host=localhost; dbname=todopage; charset=utf8mb4", "root", "");
        }
        return self::$db;
    }

    public static function execute(string $sql, array $datas = []) : int
    {
        $q = self::getDB()->prepare($sql);
        return $q->execute($datas);
    }

    public static function fetch($sql, $datas = [], $mode = \PDO::FETCH_OBJ)
    {
        $q = self::getDB()->prepare($sql);
        $q->execute($datas);
        return $q->fetch($mode);
    }

    public static function fetchAll($sql, $datas = [], $mode = \PDO::FETCH_OBJ)
    {
        $q = self::getDB()->prepare($sql);
        $q->execute($datas);
        return $q->fetchAll($mode);
    }

    public static function lastId()
    {
        //마지막으로 해당 데이터베이스 입력된 기본키값을 가져온다.
        return self::getDB()->lastInsertId();
    }
}