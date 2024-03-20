<?php

// class : 동종의 객체들 모아 정의한 것
// 관습적으로 파일명과 클래스명을 동일하게 지어준다.
class Whale {
    //프로퍼티
    //접근 제어 지시자 => 외부에서의 접근을 통제하기위해 프로퍼티나 메소드 앞에 작성.
    // public : class 내,외부 어디서나 접근 가능한 접근 제어 지시자
    public $str; 
    // private : class 내부에서만 접근 가능한 접근 제어 지시자
    private $i;
    // protected : class 내부-> 접근 가능, 외부 불가능, 단, 상속관계에서는 접근 가능 
    protected $boo;

    private $name;

    // 생성자(메소드) = construct
    //$this 접근지시자는 private의 $name을 의미함.
    public function __construct($name) {
        $this->name = $name;
    }

    // getter / setter
    //private이나 protected를 불러오려면 get써줘야 함.
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    // 메소드
    public function swim($opt) {
        echo $opt.$this->name." 헤엄 칩니다.\n";
    }
    public function breathe() {
        echo $this->name."호흡 한다.\n";
    }
    public static function big() {
        echo "매우 크다.";
    }
}

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
    // static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드
    //메모리 위에 올려두니까 instance 생성 했을 때만 안에 쓸 수 있음
    //static을 쓰면 메모리 생성 안해도 사용 가능!
    // static 문제점 -> $this 쓰면 에러뜸. 메모리에 올라가있는 것을 사용하려하니 안되는 것.
    // 잘 사용x 일반으로 사용해도 ㄱㅊ private나 protected
   
} 


// 인스턴스 생성
//만든게 $변수 new Shark에 담기게 됨
$objShark = new Shark("상어");
$objShark->breathe();
$objShark->swim();

  

//사용법은 확실하게 알아야함.
// 클래스 인스턴스 생성
// $obj_whale = new Whale("고래");
// $obj_whale->swim("흰 수염 ");
// echo $obj_whale->getName()."\n";
// $obj_whale->breathe();

// $obj_whale->setName("참새");
// $obj_whale->swim("흰 수염");
// $obj_whale->breathe();

// static 메소드 호출
// 만약 꺽쇠 ->로 돼어있으면 일반호출.
whale::big();

//카멜기법 - 객체


//이론 OOP
//추상화란 
// 예 고래-호흡,수영 새-호흡,비행 -> 생물(재정의): 호흡
//캡슐화
// 예 에어컨 tv (리모컨 분리)
//상속?
// 부모 _ 자식 (상속)
//다형성?
// php는 오버로딩이라는 개념x
//오버라이딩 -> 부모에게 상속받은 메소드를 자식이 재정의함.
// class 먼저 익히기 -> 

//INTERFACE와 Abst -> 3차 끝나고 설명할거래.

