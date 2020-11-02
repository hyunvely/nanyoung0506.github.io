<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    $query_first = "SELECT * FROM employees  LIMIT 1";
    $query_last = "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 1";
    $result = mysqli_query($link, $query_first);
    $row1 = mysqli_fetch_array($result);

    $result = mysqli_query($link, $query_last);
    $row2 = mysqli_fetch_array($result);

    $range = array( 
        'first' => $row1['emp_no'],
        'last' => $row2['emp_no']
      );
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>
<body>
    <h1> 직원 관리 시스템 </h1>
   
    <br>
    <form action="salary_info.php" method="GET">
        (1) 연봉 정보: 
        <input type="text" name="number" placeholder="number">
        <input type="submit" value="Search">
    </form>
    <br>
    <a href="salary_rank.php">(2) 연봉 순위 조회 </a>
    <br>
    <br>
    <a href = "deptmanager.php"> (3) 부서 매니저 정보 조회 </a>
   
</body>

</html>