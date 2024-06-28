<!-- 일단 음.. 이론부터 빠르게 정리해보자
 
라라벨 Route란?
웹 애플리케이션의 URL을 처리하고 해당 URL에 대한 요청을
적절한 컨트롤러 또는 클로저에 매핑하는 방법을 정의

Method에 따른 Route 등록
 Route::get($url, $callback);
 Route::post($url, $callback);
 Route::put($url, $callback);
 patch 도 있고 delete options도 있는데
 주로 get이랑 post 사용함.

 //문자열 리턴
 Route::get('/hi', function() {
 return '안녕하세요.';})

 //뷰 리턴
 Route::get('/home', function()
    return view('home');

// 파라미터 제어
HTTP요청에 대한 정보를 담고 있는 Request $request 객체에서 파라미터
획득 가능

Route::get('/query', function(Request $request) {
return $request->input('id').",".$request->input('name');
})

컨트롤러 매핑
Route::HTTPMethod('/test', [컨트롤러명::class, 액션명])
Route::get('/test', [TestController::class, 'index']);

class TestController extends Controller
{
    function index() {
        return view('test')
    }
}

Controller란?
주로 비즈니스 로직을 담당하고, 모델(Model)과 뷰(View)를 중개하여
각 컨트롤러는 app/Http/Controllers에 위치

컨트롤러 매핑
Route::get('/login', [UserController::class, 'showLogin'])->name(login.show);

class UserController extends Controller
{
    function showLogin() {
        return view('login');
    }
}

Resource 옵션으로 컨트롤러 생성 시, 컨트롤러 매핑
Route::resource('/board', BoardController::class);

class BoardController extends Controllers
{
    public function index()
    {

    }
    public function create()
    {
    
    }
    public function store(Request $request)
    {
    
    }
    public function show($id)
    {
    
    }
    public function edit($id)
    {
    
    }
    public function update(Requset $request, $id)
    {
    
    }
    public function destroy($id)
    {
    
    }
}

CSRF 방지
라라벨은 세션마다 CSRF 토큰을 자동으로 생성하고, 이 토큰으로 인증된 사용자가 실제로 애플
리케이션에서 요청을 했는지 확인

POST 요청과 함께 넘어온 CSRF 토큰으로 CSRF 방지
POST, PUT, PATCH, DELETE 폼을 만들 때 _token 명칭을 가진 hidden 타입의
입력 필드를 포함시켜 CSRF 보호 미들웨어가 요청을 확인

Blade 지시문 @csrf로 간단히 구현 가능

<body>
    <h1>HOME!!!!</h1>
    <br>
    <br>
    {{---POST---}}
    <form action="/home" method="POST">
    @csrf
    <button type="submit">POST</button>
    </form>

    X-CSRF-TOKEN 헤더로 CSRF 방지
</body>

CSRF 공격
CSRF란?
공격자가 희생자의 권한을 도용하여 특정 웹 사이트의 기능을 실행할 수 있는 취약점
CSRF는 아래의 조건을 만족할 경우 공격이 가능
-희생자가 위조 요청을 보낼 사이트에 로그인 중
-희생자가 공격자가 만든 피싱 사이트에 접속 또는 악성 스크립트 실행을 유도
주로 계정 정보를 탈취해 광고글 작성, 개인정보 탈취, 계정 권한 탈취로 서버 데이터 유출 등의
위험성이 존재

CSRF 기본 대응 방법
Referrer 검증법
-request의 header에 담겨있는 referrer 값을 확인하여 같은 도메인에서 보낸
요청인지 검증하여 차단하는 방법
-동일 사이트 내에서 XSS 취약점이 발견된다면 이를 통하여 CSRF 공격을 실행
가능하므로 주의
CSRF Token 사용
-요청이 들어올 때 마다 서버에서 세션에 저장된 값과 요청으로 전송된 값이 일치하는지 검증
하여 방어
- referrer 검증법과 같이 XSS를 통한 CSRF 공격에 취약하므로 주의

View란?
View는 모든 HTML을 별도의 파일에 배치할 수 있는 편리한 방법을 제공
애플리케이션 로직을 프레젠테이션 로직과 분리
Blade Template을 이용해서 작성

View에 데이터 전달
-with() 메서드는 뷰에 데이터를 전달하는 데 사용
    - with(변수명,값)
      해당 값을 가진 변수를 전달
    - with(배열)
      복수의 데이터를 전달 하고 싶을 경우는 배열로 전달
- 뷰에서는 전달할 때의 변수명으로 php 변수로써 사용
- 일반적으로 리다이렉션 또는 뷰를 반환하는 컨트롤러 메서드 내에서 사용

// 하나의 데이터만 전달할 경우
Route::get('/', function() {
    $arr = [
        'name' => '홍길동'
        ,'age' => 130
        ,'gender' => '1'
        ];
        return view('layout.layout')->with('errMsg', '에러 발생');
    });

// 복수의 데이터를 전달할 경우
Route::get('/', function () {
    $arr = [
        'name' => '홍길동'
        ,'age' => 130
        ,'gender' => '1'
    ];
    return view('layout.layout')->with(['data' =>$arr, 'errMsg' => '에러 발생']);
});

route/web.php


<body>
    <h1>login</h1>
    <h3>ERROR : {{$errMsg}}</h3>
    <br>
</body>
resources/views/login.blade.php

Blade Template 이란?
- 라라벨에 포함된 단순하지만 강력한 템플릿 엔진
- 블레이트 템플릿 구문이 php 코드로 컴파일되어 동작
- 블레이드 지시어를 통해 템플릿 상속 및 데이터 표시, PHP 제어 구조에 대해 편의성 제공
- 파일 확장자는 .blade.php를 사용
- 일반적으로 파일은 resources/views 디렉토리에 배치

Route::get('/', function() {
    return view('layout.layout')->with('name', '홍길동');
});

@include(뷰, [, 배열])
-다른 뷰를 포함
-include할 뷰에 데이터를 보내고 싶을 경우 두번째 아규먼트에 배열 셋팅

Query Builder란?
//select
    $result = DB::select('select * from boards limint 10');
    $result = DB::select('select * from boards limit :no offset :no2, ['no' => 2, 'no2' => 10]);
//insert
//update
//delete

Vue.js란?
사용자 인터페이스를 구축하기 위한 JavaScript 프레임워크

데이터 바인딩(Data Binding)이란?
HTML 요소와 Vue 인스턴스의 데이터를 동적으로 연결하는 기능


240625 화

데이터베이스 공부

데이터베이스(DB란?)
다수의 사용자에 의해 공유되어 사용될 목적으로 통합하여 관리되는 데이터의 집합
통합된 데이터 (자료의 중복을 배제한 데이터의 모임)
저장된 데이터 (컴퓨터가 접근할 수 있는 저장 매체에 저장된 자료)
운영 데이터(조직의 고유한 업무를 수행하는 데 존재 가치가 확실하고 없어서는 안 될 반드시 필요한 자료)
공용 데이터(여러 응용 시스템들이 공동으로 소유하고 유지하는 자료)

SELECT [DISTINCT] [컬럼명]
FROM [테이블명]
WHERE [쿼리 조건]
GROUP BY [컬럼명] HAVING [집계함수 조건]
ORDER BY [컬럼명 ASC || 컬럼명 DESC]
LIMIT [n] OFFSET [n]
;
SELECT *
FROM employees;

SELECT 
    first_name
    ,last_name
FROM employees;

SELECT *
FROM employees
WHERE emp_no = 10009
;

SELECT *
FROM employees
WHERE first_name = 'Mary'
;

SELECT *
FROM employees
WHERE birth_date >= 19700101
;

-- birth_date가 1965/01/01 ~ 1070/01/01인 데이터 조회
SELECT * 
FROM employees
WHERE birth_date <= 19700101
AND birth_date >= 19650101
;

-- first_name이 Mary이고, last_name이 Piazza인 데이터 조회
SELECT *
FROM employees
WHERE first_name ="Mary"
AND last_name = "piazza"
;

-- first_name이 Mary이거나, last_name이 Piazza인 데이터 조회
SELECT *
FROM employees
WHERE first_name = "Mary"
OR last_name = "Piazza"
;

- AND 연산자로 작성한 경우
SELECT *
FROM employees
WHERE emp_no >= 10005
AND emp_no <= 10010
;

-- BETWEEN 연산자로 작성한 경우
SELECT *
FROM employees
WHERE emp_no BETWEEN 10005 AND 10010
;

-- OR 연산자로 작성한 경우
SELECT *
FROM employees
WHERE emp_no = 10005
OR emp_no = 10010
;

-- IN 연산자로 작성한 경우
SELECT *
FROM employees
WHERE emp_no IN(10005, 10010)
;

LIKE 절: 문자열의 내용을 조회(대소문자를 구별X)

-- first_name이 Ge로 끝나는 데이터 조회
SELECT *
FROM employees
WHERE first_name LIKE(%Ge)
;
-- first_name이 Ge로 시작하는 데이터 조회
SELECT *
FROM employees
FROM first_name LIKE(Ge%)
;


-- first_name에 Ge가 포함 되어 있는 데이터 조회
SELECT *
FROM employees
WHERE first_name LIKE('%Ge%')
;

-- Ge 앞에 3글자, 뒤에 1글자인 데이터 조회
SELECT *
FROM employees
WHERE first_name LIKE('___Ge_')
;

ORDER BY 절: 데이터의 정렬해서 조회

--birth_date 오름차순 정렬
SELECT *
FROM employees
ORDER BY birth_date ASC
;

-- birth_date 내림차순 정렬
SELECT *
FROM employees
ORDER BY birth_date DESC
;

-- birth_date, first_name, last_name 순으로 오름차순 정렬
SELECT *
FROM employees
ORDER BY birth_date, first_name, last_name
;

-- DISTINCT 키워드: 검색결과에서 중복되는 레코드 없이 조회
-- emp_no가 여러개 조회될 수 있는 쿼리
SELECT emp_no
FROM salaries
WHERE emp_no = 10001
;

-- 조회 결과의 상위 10개만 출력
SELECT *
FROM employees
ORDER BY emp_no
LIMIT 10
;

-- 조회 결과의 21번째부터 10개의 데이터를 출력 방법 1
SELECT *
FROM employees
ORDER BY emp_no
LIMIT 10 OFFSET 20
;

----- 집계함수 -----
SUM(컬럼)
해당 컬럼의 합계 출력
SELECT 
 SUM(salary)
FROM salaries
WHERE to_date >= 20230901
;

MAX(컬럼)
해당 컬럼의 값 중 최대값을 출력
SELECT 
 MAX(salary)
FROM salaries
WHERE to_date >= 20230901
;

MIN(컬럼)
해당 컬럼의 값 중 최소값을 출력
SELECT 
 MIN(salary)
FROM salaries
WHERE to_date >= 20230901
;

AVG(컬럼)
해당 컬럼의 평균을 출력
SELECT
 AVG(salary)
FROM salaries
WHERE to_date >= 20230901
;

COUNT(*)
검색 결과의 총 레코드 수를 출력
SELECT COUNT(*)
FROM employees
;

COUNT(컬럼)
SELECT COUNT(last_name)
FROM employees
;

GROUP BY 절, HAVING 절: 그룹으로 묶어서 조회

-- 직책 별 사원수
SELECT 
    title
    ,COUNT(title)
FROM titles
GROUP BY title
;

-- 직책명에 staff가 포함된
SELECT 
    title
    ,COUNT(title)
FROM titles
GROUP BY title HAVING title LIKE('%staff%')
;

AS 키워드 : 컬럼에 별칭을 부여

-- COUNT(title)을 cnt로 걸럼명 변경
SELECT
 title
 ,COUNT(title) AS cnt
FROM titles
GROUP BY title
;

-- AS 생략도 가능
-- 테이블도 별칭 부여 가능 (주로 여러 테이블을 사용할 때 사용)
SELECT 
    tit.title
    ,COUNT(tit.title) cnt
FROM titles AS tit
GROUP BY tit.title
;


INSERT문
DML 중 하나로 신규 데이터를 저장하기 위해 사용하는 쿼리

INSERT INTO 테이블명 [(컬럼1, 컬럼2)]
VALUES (값1, 값2)
;

INSERT INTO employees (
    emp_no
    ,birth_date
    ,first_name
    ,last_name
    ,gender
    ,hire_date
)
VALUES (
    500001
    ,20000101
    ,'Meerkat'
    ,'Green'
    ,'M'
    ,20230904
);

SELECT INSERT

INSERT INTO titles (
    emp_no
    ,title
    ,from_date
    ,to_date
)
SELECT 
 MAX(emp_no)
    ,'test'
    ,'hire_date'
    ,'99990101'
 FROM employees
 ;

 UPDATE 테이블명
 SET 
  컬럼1  =값1
  ,컬럼2 = 값2
[WHERE 조건]
;

UPDATE titles
SET title = 'Staff'
WHERE emp_no = 500000
;

SELECT CAST (1234 AS CHAR(4));
SELECT CONVERT(1234, CHAR(4));

SELECT emp_no
,IF(gender = 'M', '남자', '여자') AS gender
FROM employees;

IFNULL 

내장 함수(Function)
-> 데이터를 처리하고 분석하는데 사용하는 프로그램

SELECT CAST(1234, AS CHAR(4));
SELECT CONVERT(1234, CHAR(4));

SELECT
    emp_no
    ,IF(gender = 'M', '남자', '여자') AS gender
FROM employees;

IFNULL(수식1, 수식2)
수식1이 NULL이면 수식2를 반환, NULL이 아니면 수식1을 반환

-- '11'이 반환
SELECT IFNULL('11', '수식2');

-- '수식2'가 반환
SELECT IFNULL(NULL, '수식2');

-- gender가 'M'이면 '남자' 아니면 '여자'로 출력
SELECT emp_no
    ,gender
    ,CASE gender
     WHEN 'M' THEN '남자'
     ELSE '여자'
   END AS ko_gender
FROM employees;

---- 문자열 함수 ----
CONCAT

-- '안녕하세요.'
SELECT CONCAT('안녕', '하세요.');
SELECT CONCAT('안녕하세요.', '', '미어캣 입니다.');

CONCAT_WS(구분자, 문자열1, 문자열2, ...)

-- '딸기/바나나/토마토/수박'
SELECT CONCAT_WS('/', '딸기', '바나나', '토마토', '수박');

????????????????
-- 2023-01-01-1:00:00
SELECT SUBTIME (20230101000000, '-01:00:00');


집계함수
SUM(컬럼)
해당 컬럼의 합계 출력

SELECT
  SUM(salary)
FROM salaries
WHERE
  to_date >= 20230901
;

COUNT(*)
검색 결과의 총 레코드 수를 출력
SELECT COUNT(*)
FROM employees
;

COUNT(컬럼)
SELECT COUNT(last_name)
FROM employees
;

---- WHERE 절에서 사용 ----

1.단일 행 서브 쿼리
-- 서브쿼리의 결과는 1건
SELECT
 emp.* 
FROM employees emp
WHERE emp.emp_no = (
    SELECT deptm.emp_no
    FROM dept_manager deptm
    WHERE
        deptm.to_date >= 20230901
     AND deptm.dept_no = 'doo2'
);
2. 다중 행 서브쿼리 
SELECT
 emp_no
 ,CONCAT(first_name, '', last_name) AS full_name
FROM employees
WHERE emp_no IN (
 SELECT emp_no
 FROM dept_manager
 WHERE 
  dept_no = 'd001'
);

3. 다중 열 서브쿼리
SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
    SELECT
     dept_no
     ,emp_no
    FROM dept_manager
    WHERE 
        to_Date >= NOW()
);

테이블 간의 관계 이해하기

ERD -> 설계도
데이터와 데이터 간에 어떤 관계를 맺고 있는지 파악하고 있어야함.

Primary Key (PK, 주키) 를 이해하려면 식별자(Identifier)라는 개념을
먼저 이해해야 한다. 

 하나의 테이블에는 여러 개의 식별자가 있을 수 있으며, 식별자 중에서
 대표로 사용할 식별자를 대표 식별자 또는 주식별자라고 부른다.

 Foreign Key(FK) : 서로 다른 테이블 간에 관계를 성립시키는 id

 PK는 고유한 id여야 하며, 한 테이블마다 PK는 하나일 수 밖에 없다.

 JOIN문이란?
 두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력

INNER JOIN
두 테이블이 공통적으로 만족하는 조건의 레코드를 출력

-- INNER JOIN의 구조
-- SELECT 컬럼1, 컬럼2
-- FROM 테이블1 [INNER] JOIN 테이블2
-- ON 조인 조건
-- [WHERE 검색조건]

-- 2개의 테이블을 join할 경우
SELECT
 emp.emp_no
 ,emp.first_name
 ,emp.last_name
 ,dp.dept_no
FROM employees emp
    INNER JOIN dept_emp dp
     ON emp.emp_no = dp.emp_no
WHERE
 dp.to_date >= NOW()
;

-- 3개의 테이블을 join 할 경우
SELECT
 emp.emp_no
 ,CONCAT(first_name, '', last_name) AS full_name
 ,emp.dept_no
 ,emp.dept_name
FROM employees emp
 INNER JOIN dept_emp dpm
  ON emp.emp_no = dpm.emp_no
 INNER JOIN departments dept
  ON dept.dept_no = dpm.dept_no
WHERE
 dpm.to_date >= NOW()
ORDER BY emp.emp_no
;

말로 풀어 설명해보자면 
테이블 2개를 조인하고 나머지 하나를 또 
생성된 테이블과 조인하여 결과 테이블을 생성해낸다는 뜻인데,

emp_no랑 full_name 그리고 dept_no, dept_name을
구해야하는 상황인데, employees 테이블로부터 가져와야하고,
dept_emp테이블과 조인하는데, 각 emp_no가 일치해야하고,
조인된 테이블에,INNER JOIN departments 도 dept_no가 일치하면
조인해서 현재시각 설정하고 자동 오름차순정렬?? emp해주고,
만다.

LEFT OUTER JOIN
LEFT JOIN이라고 줄여부름
왼쪽 테이블을 기준 테이블로 두고 JOIN을 실행

SELECT
 emp.emp_no
 ,emp.first_name
 ,dm.dept_no
FROM employees emp
 LEFT JOIN dept_manager dm
   ON emp.emp_no = dm.emp_no
WHERE
    emp.emp_no >= 110000
 AND dm.to_date >= NOW();






 

 

























