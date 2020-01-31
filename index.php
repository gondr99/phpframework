<?php

include_once "autoload.php";


$h1 = new Gondr\Student("최선한", ["게임", "프로그래밍"], 1, "양영");
$h2 = new Gondr\Student("남혜란", ["드라마", "프로그래밍"], 2, "수정과");

Gondr\Lib::dump($h1);
Gondr\Lib::dump($h2);