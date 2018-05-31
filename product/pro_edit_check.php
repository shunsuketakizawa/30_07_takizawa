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

// 前画面の入力データを変数にコピー
$pro_code=$_POST['code'];
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou_name_old=$_POST['gazou_name_old'];
$pro_gazou=$_FILES['gazou'];

// 入力データに安全対策を施している
$pro_code=htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

//もし商品名が入力されていなかったら..
if($pro_name=='')
{
    print'商品名が入力されていません。<br />';
}
else //もし商品名が入力されていたら
{
    print '商品名：';
    print $pro_name;
    print '<br />';
}
//preg_match 正しいか間違っているか正規表現でチェックしなさいという命令
if(preg_match('/\A[0-9]+\z/', $pro_price)==0)
{
    print '価格をきちんと入力してください。<br />';
}
else
{
    print '価格：';
    print $pro_price;
    print '円<br />';
}

if( $pro_gazou['size'] >0)
{
    if( $pro_gazou['size'] >1000000)
    {
        print'画像が大き過ぎます';
    }
    else
    {
        move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
        print '<img src="./gazou/'.$pro_gazou['name'].'">';
        print '<br />';
    }
}
// もし、入力に問題があったら(正規表現も含む)、「戻る」だけ表示
if($pro_name==''|| preg_match('/\A[0-9]+\z/',$pro_price)==0||$pro_gazou['size']>1000000)
{
    print'<form>';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'</form>';
}
else
// もし、入力に問題がなかったら、「戻る」と「OK」ボタンの両方表示。
//OKがクリックされたら、データを連れて次画面へ飛ぶ。
{
    print '上記のように変更します。<br />';
    print '<form method="post" action="pro_edit_done.php">';
    print '<input type ="hidden" name="code" value="'.$pro_code.'">';
    print '<input type ="hidden" name="name" value="'.$pro_name.'">';
    print '<input type ="hidden" name="price" value="'.$pro_price.'">';
    print '<input type ="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
    print '<input type ="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
    print '<br />';
    print '<input type="button" onclick="history.back()" class=in_btn value="戻る">';
    print '<input type="submit" value="OK" class=in_btn>';
    print '</form>';
}

?>

</div>
</div>

</body>
</html>