<?php





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

    // 생성자(메소드) = constract
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
}
