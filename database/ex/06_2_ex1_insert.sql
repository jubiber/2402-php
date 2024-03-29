-- INSERT문 : 신규 데이터 저장
-- INSERT INTO 테이블명 ( 컬럼1, 컬럼 2...)
-- VALUES (값1, 값2...);
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)

VALUES (
	500002
	,19991218
	,'hong'
	,'gildong'
	,'M'
	,20240305
) ,
(
	500003
	,19991218
	,'hong'
	,'gildong'
	,'M'
	,20240305
);

-- SELECT INSER (다중 레코드 INSER): SELECT한 결과를 가지고 INSERT를 실행
INSERT INTO employees (emp_no, birth_date,first_name,last_name,gender,hire_date)
SELECT 
	500005
	,bitrh_date
	,first_name
	,last_name
	,gender
	,hire_date
FROM 	employees
WHERE emp_mp = 500003;

-- 신입 사원들의 직책 정보를 SELECT INSERT를 이용해서 저장
INSERT INTO titles(emp_no, title, from_date, to_date)
SELECT 
	emp_no
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
FROM employees
WHERE hire_date >= 20240305;

-- 자신의 사원 정보를 사원 테이블에 저장
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES  (
	500004
	,19991218
	,'Ju'
	,'eunhye'
	,'F'
	,20240305
);
-- 자신의  직책 정보 저장
INSERT INTO titles (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500005
	,'신입'
	,DATE(NOW())
	,99990101
);	
-- 자신의 급여 정보 저장
INSERT INTO salaries (
	emp_np
	,salrary
	,from_date
	,to_date
)
VALUES (
	500004
	,1000000
	,DATE(NOW())
	,99990101
);
employees