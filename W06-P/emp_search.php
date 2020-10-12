<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
  if(isset($_GET['first_name'])){
    $filtered_first = mysqli_real_escape_string($link, $_GET['first_name']);
} else {
    $filtered_first = mysqli_real_escape_string($link, $_POST['first_name']);        
}
if(isset($_GET['last_name'])){
    $filtered_last = mysqli_real_escape_string($link, $_GET['last_name']);
} else {
    $filtered_last = mysqli_real_escape_string($link, $_POST['last_name']);        
}
  
  $query = "SELECT * FROM employees WHERE first_name = '{$filtered_first}' and last_name = '{$filtered_last}'";
  $result = mysqli_query($link, $query);

  $emp_info = '';
  $row = mysqli_fetch_array($result);
  $emp_info .= '<tr>';
  $emp_info .= '<td>'.$row['emp_no'].'</td>';
  $emp_info .= '<td>'.$row['first_name'].'</td>';
  $emp_info .= '<td>'.$row['last_name'].'</td>';
  $emp_info .= '</tr>';
  
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>
<body>
<h2><a href="index.php">직원 관리 시스템</a> | 직원 번호 조회</h2>
<table border="1">
<tr>
<th>emp_no</th>
<th>first_name</th>
<th>last_name</th>
</tr>
<?=$emp_info?>
</table>
</body>
</html>