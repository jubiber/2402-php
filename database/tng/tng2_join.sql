-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해 주세요.
SELECT
	emp.emp_no
	,emp.first_name
	,title.title
FROM employees emp
	JOIN titles title
		ON title.title = title.title
WHERE title.to_date >= NOW()
ORDER BY emp.emp_no;


-- 1. 강사님 풀이
SELECT
	emp.emp_no
	,CONCAT(first_name,'',last_name)
	,tit.title
FROM titles emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
;

-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT
	emp_no
	,gender
	,salary
FROM employees emp
	JOIN salaries salary
		ON salary.s
WHERE depte.to_date >= NOW()
ORDER BY; 

-- 2 강사님 풀이
SELECT
	emp.emp_no
	,emp.gender
	,sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
;


-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력해 주세요.
SELECT
	first_name
	,last_name
	,salary
	
FROM salaries
WHERE salary  
ORDER BY

-- 3 강사님 풀이
SELECT
	CONCAT_WS('',emp.first_name, emp.last_name)
	,sal.
FROM employees emp
	JoIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.emp_no = 10010
;


-- 4. 사원의 사원번호, 풀네임, 소속부서명을 출력해 주세요.
SELECT
	emp.emp_no
	,CONCAT_WS('', first_name,last_name) full_name
	,depte.dept_name
FROM employees emp
	JOIN departments depte
WHERE depte.to_date >= NOW()
ORDER BY emp.emp_no;


-- 5. 현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급을 출력해 주세요.
SELECT
	emp.emp_no
	,CONCAT_WS('', first_name,last_name) full_name
	,sal.salary 
FROM employees emp
	JOIN salaries sal
	ON emp.emo_no = sal.emp_no
	WHERE sal.to_date >= NOW()
	ORDER BY sal.salary DESC 
	LIMIT 10;


-- 6. 현재 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력해 주세요.
SELECT
	dept_name
	,CONCAT_WS('', first_name,last_name) full_name
	,to_date
FROM employees emp
	JOIN
WHERE hire_date
ORDER by

-- 6 강사님

FROM employees emp
	JOIN dept_manager deptm
		ON emp.emp_no = deptm.emp_no
		AND deptm.tp_date >= NOW()
	JOIN dept

-- 7. 현재 직책이 "Staff"인 사원의 전체 평균 월급를 출력해 주세요.
SELECT
FROM salaries
WHERE avg_sal
ORDER BY
;

-- 7. 강사s관점
SELECT
	AVG(sal.salary) avg_sal 
FROM salaries sal
	JOIN titles tit
		ON sal.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
		AND tit.title = 'staff'
;


-- 8. 부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력해 주세요.

SELECT
	first_name
	,last_name
	,
	,dept_no
FROM employees emp
	JOIN dept_manager deptm
		ON emp.emp_no = deptm.emp_no
;


-- 8 강 관점
SELECT
CONCAT_WS('', emp.first_name, emp.last_name) full_name
	,emp,hire_date
	,emp.emp_no
	,emp.dept_no
FROM employees emp
	JOIN dept_manager deptm
		ON emp.emp_no = deptm.emp_no
;
-- 9. 현재 각 직급별 평균월급 중 60,000이상인 직급의 
-- 직급명, 평균월급(정수)를 내림차순으로 출력해 주세요.
SELECT  
	
FROM
WHERE
ORDER BY
;
--  9 강 관점
SELECT
	tit.title
	, CEILING(AVG(sal.salary)) avg_sal
FROM titles tit
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
		AND tit.to_date >= NOW()
		AND sal.to_date >= NOW()
GROUP BY tit.title HAVING AVG(sal.salary) >= 60000
ORDER BY avg_sal DESC
;

-- group by 부분에  avg_sal도 쓸 수 있음


-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.
SELECT
	gender
	COUNT(*)
FROM 
WHERE
ORDER BY
;

-- 10 강
SELECT
	tit.title
	,COUNT(emp.emp_no) cnt
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
		AND emp.gender ='F'
GROUP BY tit.title
;
-- 11. 퇴사한 여직원의 수(현재 직책이 없는 사원은 퇴사)
SELECT 
	*
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		LEFT JOIN titles tit2
			ON (emp.emp_no)NO = tit2.emp_no
			AND tit.to_date >= now()
			AND emp.gender = 'F'
GROUP BY tit.title
;


-- 11 강 관점
SELECT
	COUNT(emp.emp_no) cnt
FROM employees emp
	JOIN (
		SELECT
			emp_no
		FROM titles
		GROUP BY emp_no HAVING MAX(to_date) != 99990101
	) tit
		ON emp.emp_no = tit.emp_no
		AND emp.gender = 'F'
;
