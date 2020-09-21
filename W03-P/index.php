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
    'description' => '  꽃을 뜻하는 영어 단어 Flower.

    밀가루를 뜻하는 Flour와 발음이 동일해서 이를 이용한 언어유희가 종종 있다.'
  );
  $update_link = '';
  $delete_link = '';

  if( isset($_GET['id'])) {
    $query = "SELECT * FROM flower WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
    $delete_link = '<form action="process_delete.php" method="POST">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="delete">
      </form>
      ';


  }

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
     <a href="create.php">create</a>
    <?=$update_link?>
    <?=$delete_link?>
     <h2><?= $article['title'] ?></h2>
     <?= $article['description'] ?>
   </body>
 </html>
