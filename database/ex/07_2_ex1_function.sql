-- 내장함수 (Function)
-- 데이터를 처리하고 분석하는데 사용하는 프로그램

-- 데이터 타입 변환 함수
-- CAST(값 AS 데이터타입), CONVERT(값, 데이터타입)
SELECT 123, CAST(123 AS CHAR(3)), CONVERT(123, CHAR(3));

-- 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때) : 스식이 참이면 참일 때, 거짓이면 거짓일 때를 출력
SELECT emp_no, gender, IF(gender = 'M', '남자', '여자')
FROM employees;
-- 급여가 80000 이상인 사원은 '고소득자' 아니면 '그냥저냥'
-- 으로 출력 되도록 해주세요. (사번, 고소득자/그냥저냥)
SELECT emp_no
	,salary
	,IF(salary >= 80000, '고소득자', '그냥저냥')
FROM salaries
WHERE to_date >= NOW();


-- IFNULL(수식1, 수식2) :
-- 수식1이 NULL이 아니면 수식2을 반환
-- 수식1이 NULL이면 수식1을 반환
SELECT IFNULL('11','22');
SELECT IFNULL(NULL,'22');

SELECT 
	emp_no
	,IFNULL(to_date, 20000101)
FROM titles;


-- NULLIF(수식1, 수식2): 
-- 수식1과 수식2를 비교해서 같으면 NULL을 반환
-- 다르면 수식 1을 반환
SELECT NULLIF(1, 1), NULLIF(1, 2);

-- CASE ~ WHEN ~ ELSE ~ END : 다중분기를 위해 사용
SELECT
	gender
	,CASE gender
		WHEN 'M' THEN '남자'
		WHEN 'F' THEN '여자'
		WHEN ''  THEN '공백'
		ELSE '무성'
	END ko_gender
FROM employees;

-- 문자열 함수
-- 문자열 연결
-- CONCAT_WS(구분자, 값1, 값2, ...)
-- 보통 구분문자 넣어줌. concat는 잘 쓰이지 않는다.
SELECT CONCAT_WS(',', 11, 22), CONCAT(11,22);
-- 사번, 생일, 풀네임, 성별, 입사일자 출력해 주세요
SELECT 
	emp_no
	,birth_date
	,CONCAT_WS('',last_name ,first_name) full_name
	,gender
	,hire_date
FROM employees;

-- FORMAT(숫자, 소숫점 자리수)
-- 숫자에 ','를 넣어주고 소수점 자리수까지
SELECT FORMAT(1234567, 0);

-- LEFT(문자열, 길이) : 문자열의 왼쪽부터 길이만큼 잘라서 반환
-- RIGHT(문자열, 길이) : 문자열의 오른쪽부터 길이만큼 잘라 반환
SELECT LEFT('abcde', 2), RIGHT('abcde', 2);

-- SUBSTRING(문자열, 시작위치, 길이)
-- 문자열을 시작위치에서 길이만큼 잘라 반환
SELECT SUBSTRING('abcde', 3, 2);

-- SUBSTRING_INDEX(문자열, 구분자, 횟수)
-- 왼쪽부터 구분자가 횟수번째 이후를 버림
-- 횟수가 음수면 오른쪽부터 적용
SELECT SUBSTRING_INDEX('test.blade.txt','.', 2);
SELECT SUBSTRING_INDEX('test.blade.txt','.', 1);
SELECT SUBSTRING_INDEX('test.blade.txt','.', -2);

-- UPPER(문자열), LOWER(문자열)
SELECT UPPER('asdgDD'), LOWER('FASDasdf');

-- LPAD(문자열, 길이, 채울 문자열)
-- 채울 문자열을 길이만큼 왼쪽에 삽입해서 반환
-- 중간이 총 숫자 개수
SELECT LPAD(1, 10, '0');
-- RPAD(문자열, 길이, 채울 문자열)
-- 채울 문자열을 길이만큼 오른쪽에 삽입해서 반환
SELECT RPAD(123,10,'0');

-- TRIM(문자열) : 좌우의 공백 제거해서 반환
SELECT '     asdasd   ', TRIM('     asdasd     ');

-- 수학함수
-- CEILING(값) : 올림
-- ROUND(값) : 반올림
-- FLOOR(값) : 버림
SELECT CEILING(1.4), ROUND(1.4), FLOOR(1.9);
-- TRUNCATE(값, 정수)
-- 소수점 기준으로 정수 위치까지 구하고 나머지 버림
SELECT TRUNCATE(1.123, 1);

-- 날짜/시간 함수
-- NOW() : 현재 날짜/시간을 반환(YYYY-MM-DD hh:mi:ss)
SELECT NOW();

-- DATE(데이트형식 값) : 해당 값을 YYYY-MM-DD로 변환
SELECT DATE(20230101012030);


-- ADDDATE(기준날짜,INTERVAL 추가할날짜/시간)
-- 기준날짜에 추가할 날짜/시간을 추가해서 반환
SELECT ADDDATE(NOW(), INTERVAL -1 YEAR);
SELECT ADDDATE(NOW(), INTERVAL -1 MONTH);
SELECT ADDDATE(NOW(), INTERVAL -30 DAY);


-- 집계함수
-- count(컬럼) : 검색결과의 레코드 수를 출력
-- (강사님 설명) 컬럼이 *이면 NULL 포함한 총 개수를 출력
-- 컬럼이 특정 컬럼이면 NULL 제외한 총 개수를 출력
-- count에 있는 부분은 	을 세지 않음
SELECT
	emp_no
	,COUNT(*)
	,COUNT(to_date)
FROM salaries
GROUP BY emp_no;


-- 순위 함수
-- RANK() OVER(ORDER BY 컬럼 ASC/DESC)
-- 지정한 컬럼을 기준으로 순위를 매겨서 반환
-- 동일한 순위가 있으면 동일한 순위를 부여
-- 예) 1,1,3,4,5,5,5,8
-- ROW_NUMBER() OVER(ORDER BY 컬럼 ASC/DESC)
-- 지정한 컬럼을 기준으로 순위를 매겨서 반환
-- 동일한 순위가 있어도 각행에 고유 번호를 부여
-- 예) 1,2,3,4,5
SELECTtest
	emp_no
	,salary
	,RANK() OVER(ORDER BY salary DESC) sal_rank
	,ROW_NUMBER() OVER(ORDER BY salary DESC) sal_rown
FROM salaries
WHERE to_date >= NOW()
LIMIT 5;