<?php

$link = mysqli_connect('localhost', 'admin', 'admin' ,'employees');

$query = "SELECT distinct title 
from titles 
left join salaries 
on titles.emp_no=salaries.emp_no 
order by salary asc";

$article = ' ';
$result = mysqli_query($link,$query);
while($row = mysqli_fetch_array($result)){
    $article .= '<tr><td>';
    $article .= $row['title'];
    $article .= '</td></tr>';
} 

mysqli_free_result($result);
mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>직급 연봉 순위 </title>
    <style>
    body {
        font-family: consolas, monospace;
        font-family: 12px;

    }

    table {
        width: 100%;
    }

    th,
    td {
        padding: 10px;
        border-bottom: 1px solid #dadada;

    }
    </style>
</head>

<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 연봉 순위</h2>
    <table>
        <tr>
            <th>title</th>
        </tr>
        <?= $article?>
    </table>



</body>

</html>