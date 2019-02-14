SELECT MAMS
	d.dept_name AS dep_name, 
    concat(e.first_name, ' ', e.last_name) AS full_name,
	IF(
		de.to_date IS NOT NULL,
		TIMESTAMPDIFF(DAY, de.from_date, de.to_date), 
		TIMESTAMPDIFF(DAY, de.from_date, NOW())
	) AS worked_days_emp
FROM employees e
	JOIN dept_emp de 
		ON e.emp_no = de.emp_no
	JOIN departments d 
		ON de.dept_no = d.dept_no
ORDER BY worked_days_emp DESC
LIMIT 10