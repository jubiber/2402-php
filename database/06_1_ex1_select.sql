-- 테이블의 모든 데이터 조회 : * (Asterisk)
SELECT *
FROM employees
;
-- 1. titles 테이블의 모든 데이터를 조회해 주세요.
SELECT * FROM titles;

-- 특정 컬럼만 조회
SELECT 
	emp_no
, birth_date 
FROM employees
;
-- titles 테이블에서 emp_no, title을 출력해 주세요.
SELECT emp_no, title FROM titles;

-- 특정 조건의 데이터만 조회 : WHERE 절
-- 비교연산자 : =, >=, <=, >, <. <>
-- 사번이 10009인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE emp_no >= 10009;
-- 사원 이름이 'Mary'인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE first_name ='Mary';
-- 생일이 1960/01/01 이상인 사원의 모든 정보를 조회
SELECT * 
FROM 	employees
WHERE birth_date >= 19600101;
-- 입사일이 1990/12/25 이상인 사원의 사번, 이름, 성을 조회
SELECT *
FROM employees
WHERE cleanup, last_name, first_name >= 19901225;


SELECT *
FROM employees
WHERE
	(
		first_name = 'Mary'
		OR first_name = 'Moto'
	)
	AND last_name = 'Pizza'
;
-- BETWEEN 연산자 : 지정한 범위의 데이터를 조회
SELECT *
FROM employess
WHERE emp_no >= 10005 AND emp_no <=10009;

SELECT * FROM employees
WHERE emp_no BETWEEN 10005 AND 10009;

-- IN 연산자 : 지정한 값과 일치한 데이터를 조회
-- 10005, 10007 사원의 모든 정보를 조회
SELECT * 
FROM employees
WHERE 
	emp_no = 10005
	OR emp_no = 10009;
	
SELECT * FROM employees
WHERE emp_no IN(10005,10009);

-- lIKE 절 : 문자열의 내용을 조회(대소문자 구분 X)
-- % : 글자수 상관없이 조회
-- 이름이 ge로 끝나는 데이터 조회
SELECT * FROM employees WHERE first_name LIKE('%ge');
-- 이름이 ge로 시작하는 데이터 조회
SELECT * FROM employees WHERE first_name LIKE('ge%');
-- 이름에 ge가 포함되는 데이터 조회
SELECT * FROM employees WHERE first_name LIKE('%ge%');
-- _ : 언더바의 개수 만큼의 글자의 개수가 제한되서 조회
SELECT * FROM employees WHERE first_name LIKE('___Ge_');

-- ORDER BY 절 : 데이터를 정렬해서 조회
 SELECT * 
 FROM employees
 ORDER BY birth_date DESC, hire_date;
 
 
 -- 입사일이 1990/01/01 ~ 1995/12/31 이고, 성별이 여자인

-- 사원의 정보를 성과 이름 오름차순으로 정렬해서 조회 
SELECT *
FROM employees
WHERE
	hire_date BETWEEN 19000101 AND 19951231
  AND gender = 'F'
ORDER BY gender, last_name, first_name;

-- DISTINCT 키워드 : 검색 결과에서 중복되는 레코드 없이 조회
SELECT emp_no FROM salaries WHERE emp_no = 10001;
SELECT DISTINCT emp_no  FROM salaries WHERE emp_no = 10001;

-- GROUP BY 절, HAVING 절 : 그룹으로 묶어서 조회

-- GROUP BY [그룹으로 묶음 컬럼] HAVING [그룹을 묶을때의 조건: 집계함수 조건]
SELECT 
	gender
	,COUNT(gender)
FROM employees
GROUP BY gender;
-- 현재 재직중인 직원의 직책별 사원수 조회
SELECT 
	title
	,COUNT(title)
FROM titles
WHERE to_date >= 20240305
GROUP BY title HAVING title LIKE('%Engineer%')
;
-- 각 사원의 최고연봉 중 80000 이상을 조회
SELECT 
	emp_no
	,MAX(salary)
FROM salaries
GROUP BY emp_no HAVING MAX(salary) >= 80000;

-- AS : 컬럼에 별칭 부여
SELECT
	emp_no
	-- AS 생략 가능 (max_sal 앞에) --
	,MAX(salary)  max_sal
FROM salaries   
GROUP BY emp_no HAVING MAX(salary) >= 80000;

-- LIMIT, OFFSET : 출력하는 데이터의 개수 제한
SELECT * 
FROM employees
-- OFFSET 숫자 앞에 숫자만큼을 제외하고 시작을 알림 
-- OFFST 생략 가능하나 숫자가 LIMIT 앞에 쓰인다.
LIMIT 5 OFFSET 10;

SELECT *
FROM employees
LIMIT 10, 5;

-- 가장 높은 연봉을 받는 사원 번호 조회
SELECT emp_no, MAX(salary) max_sal FROM salaries
GROUP BY emp_no
ORDER BY MAX_sal DESC;












