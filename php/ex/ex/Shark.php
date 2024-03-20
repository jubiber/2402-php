<?php
// namespace : 해당 파일의 주소를 할당,(다른 파일과 중복되지 않도록하기 위해)
// 일반적으로 해당파일의 패스(path경로)
namespace php\ex;


// shark 클래스를 만들어주세요.
// 프로퍼티 : private $name
// 생성자 메소드 : Whale 클래스랑 동일하게
// 메소드 : public swim, public breathe

//'S'hark 대문자 꼭 써줄 것.
//접근제어지시자 -> 외부로부터 우리 데이터 보호하기 위함. (캡슐화라고 도 얘기함)
//private(나 자신만 쓸 수 있음)
//$name 프로파티는 shark안에서만 접근 가능하게 됨.
//
class Shark {
    private $name;
    // 생성자
    // 외부에서 접근지시할 수 있어야함
    // __construct 생성자메소드는 항상 동일함
    // this네임은 private네임을 말하고 this 이후 
    // $name은 __construct($name)을 의미한다.
    //함수 앞 public의 뜻 -> 외부에서 속성이나 메소드에 접근할 수 있게 허용할 것인지 설정한다.
    //함수 안 $this 라는 php에 내장된 변수가 있는데 함수를 호출하는 현재 인스턴스를 가리키는 특수한 변수임. 
    
    public function __construct($name) {

    }
    //메소드
    //접근 지시제어자를 먼저 작성해줌
    //외부 접근 가능하게 해야하므로 public
    public function swim() {
        echo $this->name." 헤엄 칩니다.\n";
    }
    public function breathe() {
        echo $this->name."호흡 합니다.\n";
    }
}

// 인스턴스 생성
//만든게 $변수 new Shark에 담기게 됨
$objShark = new Shark("상어");
$objShark->breathe();
$objShark->swim();