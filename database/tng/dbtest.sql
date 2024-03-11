-- 1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
employees
emp_no
1999.12.18

-- 2. 월급, 직책, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
salaries
emp_no
salary
from_date
to_date
titles
emp_no
title
from_date
to_date
dept_emp
emp_no
dept_no
from_date
to_date

-- 3. 짝궁의 [1,2]것도 넣어주세요.
employees
emp_no
2002.01.03

salaries
emp_no
salary
from_date
to_date
titles
emp_no
title
from_date
to_date
dept_emp
emp_no
dept_no
from_date
to_date


-- 4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.

-- 5. 짝궁의 모든 정보를 삭제해 주세요.

-- 6.'d009'부서의 관리자를 나로 변경해 주세요.


-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
SELECT *
FROM titles
WHERE to_date >= 20240311
;

-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT
	,emp_no
	,CONCAT_WS('',first_name,last_name) full_name
	,SUM(salary)
FROM salaries
WHERE to_date >= NOW();

-- 9. 전체 사원의 평균 연봉을 출력해 주세요,
SELECT
	AVG(sal.salary) AVG_sal
FROM salaries sal
WHERE to_date >= NOW()
;

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
	AVG(sal.salary) avg_sal
FROM salaries sal
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.emp_no = 499,975
;