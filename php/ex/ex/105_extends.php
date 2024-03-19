<?php
// 상속 : 부모클래스의 자원을 자식클래스가 물려받아 사용or 재정의하는 것.

class Parents {
    //공통된게 묶여서올라오면 protected를 많이 씀
    //이중상속(부모 2에게 한명이 상속받는)은 원칙상 안됨. (설계가 복잡해지기 때문.)
    //상속받고 또 하위 상속은 가능.
    //이를 보완하기 위해 인터페이스가 나옴.
    //point: 프로파티가 뭔지 메소드가 먼지 어떻게 사용되는지 정도만 알면 됨.
    //설계 쪼개기까지 이해할 필요x
    protected $name;
        //this 내가 가지고있는에 접근하는거 
        //근데 나한테 없으면 부모 -> 상속받아서 쓰게 됨
    public function __construct($name) {
        $this->name = $name;
        echo "부모 클래스 생성자 실행\n";
    }

    private function home() {
        echo "집은 부모님 겁니다.";
    }
    public function car() {
        echo "차는 부모님 자식 다 씁니다.\n";
    }
}
//extends 상속
class Child extends Parents {
    public function __construct() {
        echo "자식 클래스 생성자 실행\n";
    } 
    public function dog() {
        echo "강아지는 제겁니다";
    } 

    // 오버라이딩
    // 다형성 관련된 부분, 부모 가지고있는 자식 이름 일치하게,
    //자식에게서 새로 정의해서 쓰는 것
    //신입이 사용할 정도의 lv는 아님.
    public function car() {
        echo "이 자동차는 이제 제겁니다.";
    }

    public function getName() {
        echo $this->name;
    }
}

// construct는 instruct 실행되는데 나한테 없으면 부모에서 실행하게 됨.
$obj = new Child("홍길동");
//car 말고 home은 쓸 수 없음 -> private 이므로 부모만 쓸 수 있음.
$obj->car();
$obj->getName();

//수업을 마무리 하며
//name space랑 use는 나중에 할거임(java script 끝나고)
//객체지향 class 가 제일 어려움
//5-10년 전 쯤에는 그렇게 중요하지 않았음
//lalabel은 최근에 나옴 -> 그러면서 php 많이 바뀜.
//지금의 php 객체지향은 중요하다.
//사용법 걍 암기하셈.
//목-금부터 웹사이트 하나 만들거임/ 디자인 말고  피그마 잠깐 사용해보고
// 설계서 만들어서 디자인하는 법 해볼거임
