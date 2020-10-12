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
    <a href="emp_select.php">(1) 직원 정보 조회</a><br>
    <a href="emp_insert.php">(2) 신규 직원 등록</a><br>
    <form action="emp_update.php" method="POST">
        (3) 직원 정보 수정:
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Search">
    </form>
    <form action="emp_delete.php" method="POST">
        (4) 직원 정보 삭제:
        <input type="text" name="emp_no" placeholder="emp_no">
        <input type="submit" value="Delete">
    </form>    
    <form action="emp_search.php" method="POST">
        (5) 직원 번호 조회:
        <input type="text" name="first_name" placeholder="first_name">
        <input type="text" name="last_name" placeholder="last_name">
        <input type="submit" value="Search">
    </form>
    <br>
    <h5>※직원은 <?= $range['first'] ?>번부터 <?= $range['last']?>번까지 등록이 되어있다.</h5>
</body>

</html>