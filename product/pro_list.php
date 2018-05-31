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

        //データベースに接続
        $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
        $user='root';
        $password='';
        $dbh=new PDO($dsn,$user,$password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //名前,コード、値段を全てくださいというsql文
        $sql='SELECT code,name,price FROM mst_product WHERE 1';
        $stmt = $dbh-> prepare($sql);
        $stmt->execute(); //命令が終わった時点で、中に全てのデータが入っている。

        $dbh = null;


        print'商品一覧 <br /><br />';
        //修正画面へ        
        print'<form method="post" action="pro_branch.php">';

        //データが無くなるまでループ
        while(true)
        {
            $rec= $stmt->fetch(PDO::FETCH_ASSOC); //$stmtから１レコード取り出してます。
            //もしデータがなければループから脱出
            if($rec==false)
            {
                break;
            }
            //どの商品を選んだか、飛び先でわかるようにするため、コードを渡している
            print'<input type="radio" name="procode" value="' .$rec['code'].'">';
            print $rec['name'].'---';
            print $rec['price'].'円';
            print'<br />';
        }

        print'<input type="submit" name="disp" class=in_btn value="参照">';
        print'<input type="submit" name="add" class=in_btn value="追加">';
        print'<input type="submit" name="edit" class=in_btn value="修正">';
        print'<input type="submit" name="delete" class=in_btn value="削除">';
        print'</form>';

        }
        catch (Exception $e)
        {
            print'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
        }

        ?>
    </div>
</div>


</body>
</html>