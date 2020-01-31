<?php

namespace Gondr;

class Human {
    //클래스는 기본적으로 멤버변수와 매서드로 이루어져있다.
    //멤버변수 : 해당 클래스의 속성 (ex. 학생의 이름, 나이, 성별)
    //매서드 : 해당 클래스의 기능 (ex. 걷기, 먹기, 자기)
    //멤버변수 선언 순서 : 접근제어자 _ 변수이름 ;
    public $name;
    public $hobbies = []; //배열로 초기화 가능

    //매서드 선언 순사 : 접근제어자 _ function _ 매서드이름(파라메터) [: 리턴타입]
    //지정된 취미가 있는지 검사하는 매서드
    public function hasHobby(string $hobby) : bool{
        return in_array( $hobby, $this->hobbies);
    }

    //취미를 넣어주는 매서드
    public function insertHobby(string $hobby){
        $this->hobbies[] = $hobby;  //속도는 이게 더 빨라.
        //array_push($this->hobbies, $hobby); //이건 별도의 함수 호출을 만들거든
    }

    //이름 설정하는 매서드
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function __construct($name = "", $hobbies = [])
    {
        $this->name = $name;
        $this->hobbies = $hobbies;
    }

    //public, private, protected, default
    //
}