<?php
  $link = mysqli_connect('localhost','root','fbsksdud2','dbp');
  $query = "SELECT * FROM flower";
  $result = mysqli_query($link, $query);
  $list ='';


  while ($row = mysqli_fetch_array($result)) {
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'description' => '꽃을 뜻하는 영어 단어 Flower.

  밀가루를 뜻하는 Flour와 발음이 동일해서 이를 이용한 언어유희가 종종 있다.'
  );

$update_link = '';

  if( isset($_GET['id'])) {
    $query = "SELECT * FROM flower WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
    $updated_link = '<a href="update.php?id'.$_GET['id'].'">update</a>';
  }
$query = "SELECT * FROM author";
$result = mysqli_query($link, $query);
$select_form = '<select name="author_id">';
while ($row = mysqli_fetch_array($result)) {
$select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
}
$select_form .= '</select>';

 ?>




 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>flower</title>
   </head>
   <body>
     <h1><a href="index.php">flower</a></h1>
     <ol><?= $list ?></ol>
     <form action="process_create.php" method="POST">
       <p><input type="text" name="title" placeholder="title"></p>
       <p><textarea name="description" placeholder="description"></textarea></p>
       <?= $select_form ?>
       <p><input type="submit"></p>
     </form>
   </body>
 </html>
