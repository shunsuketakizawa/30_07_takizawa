<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>filmshare管理画面</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/pro_list.css">
</head>
<body>
<header><img src=img/header.svg></header>
<div class=container>
    <div class=box1>
        <img src=img/btn1.svg class=btn>
        <img src=img/btn2.svg class=btn>
    </div>
    <div class=box2>
<?php

try
{
//選択されたコードを受け取ってます
$pro_code=$_GET['procode'];

//データベースに接続
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//コードで絞り込んでいる。1件のレコードに絞り込まれるのでループしない。
$sql='SELECT name,price,gazou FROM mst_product WHERE code=?';
$stmt = $dbh-> prepare($sql);
$data[]=$pro_code;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$pro_name=$rec['name']; //変数にコピー
$pro_price=$rec['price'];
$pro_gazou_name_old=$rec['gazou'];

$dbh=null;

if($pro_gazou_name_old=='')
{
    $disp_gazou='';
}
else
{
    $disp_gazou='<img src="./gazou/'.$pro_gazou_name_old.'">';
}
}
catch(Exception $e)
{
    print'ただいま障害により大変ご迷惑をお掛けしています。';
    exit();
}

?>

商品修正<br />
<br />
商品コード<br />
<?php print $pro_code; ?>
<br />
<br />
<form method="post" action="pro_edit_check.php" enctype="multipart/form-data">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">
<input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_old; ?>">
商品名<br />
<input type="text" name="name" style="width:200px" value="<?php print $pro_name; ?>"><br />
価格<br />
<input type="text" name="price" style="width:50px" value="<?php print $pro_price; ?>">円<br />
<br />
<?php print $disp_gazou; ?>
<br />
画像を選んでください。<br />
<input type="file" name="gazou" style="width:400px"><br />
<br />
<input type="button" onclick="history.back()" class=in_btn value="戻る">
<input type="submit" class=in_btn value="OK">
</form>

</div>
</div>
</body>
</html>