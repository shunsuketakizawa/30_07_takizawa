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

商品追加<br />
<br />
<form method="post" action="pro_add_check.php" enctype="multipart/form-data">
商品名を入力してください。<br />
<input type="text" name="name" style="width:200px"><br />
価格を入力してください。<br />
<input type="text" name="price" style="width:50px"><br />
画像を選んでください。<br />
<input type="file" name="gazou" style="width:400px"><br />
<br />
<input type="button" onclick="history.back()" value="戻る" class=in_btn>
<input type="submit" value="OK" class=in_btn>
</form>
</div>
</div>
    
</body>
</html>