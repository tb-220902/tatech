<?php
    //データベースに接続
        $dsn="データベース名";
        $user="ユーザー名";
        $pass="パスワード";
        $pdo=new PDO($dsn,$user,$pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
    
        //パスワードを取得するための関数を作る
        function gett($idd){
        //データベースに接続
        $dsn="データベース名";
        $user="ユーザー名";
        $pass="パスワード";
        $pdo=new PDO($dsn,$user,$pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

        //パスワードの取得
        $sql = 'SELECT * FROM m_55 WHERE id=:id ';
        $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
        $stmt->bindParam(':id', $idd, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
        $stmt->execute();                             
        $results = $stmt->fetchAll();
        foreach($results as $row){
            $passpass=$row["pass"];
        }
        return $passpass;
    }
    
    //idを取得するための関数を作る
    function getid($idd){
        //データベースに接続
        $dsn="データベース名";
        $user="ユーザー名";
        $pass="パスワード";
        $pdo=new PDO($dsn,$user,$pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

        //idの取得
        $sql = 'SELECT * FROM m_55 WHERE id=:id ';
        $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
        $stmt->bindParam(':id', $idd, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
        $stmt->execute();                             
        $results = $stmt->fetchAll();
        foreach($results as $row){
            $idid=$row["id"];
        }
        return $idid;
    }
    //編集番号が入力されたときの処理
    if($_POST["edit"]!="" && $_POST["passE"]!=""){
        $id=$_POST["edit"];
        if(gett($id)==$_POST["passE"]){
            $sql = 'SELECT * FROM m_55 WHERE id=:id ';
            $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
            $stmt->execute();                             
            $results = $stmt->fetchAll();
        
            foreach($results as $row){
                $iidd=$row["id"];
                $namename=$row["name"];
                $comecome=$row["comment"];
            }
            
        }elseif(getid($id)==""){
            $teachDelete="投稿は削除されています"."<br>";
        }elseif(gett($id)!=$_POST["passE"]){
            $teachDifferent="パスワードが違います"."<br>";
                echo "aa";
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charaset="UTF-8">
        <title>m_5-1</title>
    </head>
    
    <body>
        <form action="" method="post">
            
            投稿フォーム<br>
            <input type="hidden" name="number"
                value="<?php
                    echo $iidd;
                ?>"
            >
            <input type="name" name="name" placeholder="名前"
                value="<?php
                    echo $namename;
                ?>"
            >
            <input type="text" name="text" placeholder="コメント"
                value="<?php
                    echo $comecome;
                ?>"
            >
            <input type="text" name="passC" placeholder="パスワード">
            <input type="submit" name="submit"><br><br>
            
            削除フォーム<br>
            <input type="text" name="delete" placeholder="削除">
            <input type="text" name="passD" placeholder="パスワード">
            <input type="submit" name="submit"><br><br>
            
            編集フォーム<br>
            <input type="text" name="edit" placeholder="編集">
            <input type="text" name="passE" placeholder="パスワード"> 
            <input type="submit" name="submit"><br><br>
        </form>
    </body>
</html>

    <?php
        $n=$_POST["name"];
        $t=$_POST["text"];
        $d=$_POST["delete"];
        
        $passC=$_POST["passC"];
        $passD=$_POST["passD"];
        $passE=$_POST["passE"];
        
        function get($idd){
            //データベースに接続
            $dsn="データベース名";
            $user="ユーザー名";
            $pass="パスワード";
            $pdo=new PDO($dsn,$user,$pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

            $sql = 'SELECT * FROM m_55 WHERE id=:id ';
            $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
            $stmt->bindParam(':id', $idd, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
            $stmt->execute();                             
            $results = $stmt->fetchAll();
            foreach($results as $row){
                $passpass=$row["pass"];
            }
            return $passpass;
        }
        
        //idの取得
        function gettt($idd){
            //データベースに接続
            $dsn="データベース名";
            $user="ユーザー名";
            $pass="パスワード";
            $pdo=new PDO($dsn,$user,$pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

            $sql = 'SELECT * FROM m_55 WHERE id=:id ';
            $stmt = $pdo->prepare($sql);                  // ←差し替えるパラメータを含めて記述したSQLを準備し、
            $stmt->bindParam(':id', $idd, PDO::PARAM_INT); // ←その差し替えるパラメータの値を指定してから、
            $stmt->execute();                             
            $results = $stmt->fetchAll();
            foreach($results as $row){
                $idid=$row["id"];
            }
            return $idid;
        }
        
        //データベースに接続
        $dsn="データベース名";
        $user="ユーザー名";
        $pass="パスワード";
        $pdo=new PDO($dsn,$user,$pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

    
        //テーブルの作成
        $sql="CREATE TABLE IF NOT EXISTS m_55"
        ."("
        ."id INT AUTO_INCREMENT PRIMARY KEY,"
        ."name char(32),"
	    ."comment TEXT,"
	    ."pass char(32),"
	    ."date char(32)"
	    .");";
	    $stmt = $pdo->query($sql);
	
	    //テーブルの削除
	    /*$sql = 'DROP TABLE m_55';
		$stmt = $pdo->query($sql);*/
	
	    //編集
	    if($_POST["number"]!="" && $passC!=""){
	        $id=$_POST["number"];
	        if(get($id)==$passC){
	            $name=$n;
	            $comment=$t;
	            $date=date("Y/m/d H:i:s");
                $sql="UPDATE m_55 SET name=:name,comment=:comment,date=:date WHERE id=:id";
	            $stmt=$pdo->prepare($sql);
	            $stmt->bindParam(":name",$name,PDO::PARAM_STR);
	            $stmt->bindParam(":comment",$comment,PDO::PARAM_STR);
	            $stmt->bindParam(":date",$date,PDO::PARAM_STR);
	            $stmt->bindParam(":id",$id,PDO::PARAM_INT);
	            $stmt->execute();
	        }else{
	            echo "パスワードが違います"."<br>";
	        }
	    
	    //テーブルにPOSTで受け取った値を記入
	    }elseif($n!="" && $t!=""){
	        if($passC!=""){
                $sql=$pdo->prepare
                ("INSERT INTO m_55
                (name,comment,pass,date)VALUES(:name,:comment,:pass,:date)");
                $sql->bindParam(":name",$name,PDO::PARAM_STR);
                $sql->bindParam(":comment",$comment,PDO::PARAM_STR);
                $sql->bindParam(":pass",$passc,PDO::PARAM_STR);
                $sql->bindParam(":date",$date,PDO::PARAM_STR);
                $name=$n;
                $comment=$t;
                $passc=$passC;
                $date=date("Y/m/d H:i:s");
                $sql->execute();
	        }
	    }
	    //テーブル内のデータレコードを削除
	    if($d!="" && $passD!=""){
	        $id=$d;
	        //$g=get($id);
    	    if(get($id)==$passD){
	            $sql="delete from m_55 where id=:id";
	            $stmt=$pdo->prepare($sql);
	            $stmt->bindParam(":id",$id,PDO::PARAM_INT);
	            $stmt->execute();
    	    }elseif(gettt($id)==""){
	            echo "投稿は削除されています"."<br>";
	        }elseif(get($id)!=$passD){
	            echo "パスワードが違います"."<br>";
	        }
	    }
	    
	    echo $teachDelete;
	    echo $teachDifferent;
	    
	    //テーブルに記入されている値を取り出す
        $sql="SELECT*FROM m_55";
        $stmt=$pdo->query($sql);
        $result=$stmt->fetchAll();
        foreach($result as $line){
            echo $line["id"].",";
            echo $line["name"].",";
            echo $line["comment"].",";
            echo $line["date"];
            
            
            echo"<hr>";
        }
        
?>