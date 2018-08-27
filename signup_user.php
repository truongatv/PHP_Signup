<?php 
    require('connect_db.php');
    if(isset($_POST['username'])){
        if(!isset($_POST['username']) || !isset($_POST['furigana']) || !isset($_POST['region']) || !isset($_POST['password']) || !isset($_POST['address']) || !isset($_POST['mail'])) {
            die('すみません！情報が不完全です！');
        }
        $username = $_POST['username'];
        $furigana = $_POST['furigana'];
        $region = $_POST['region'];
        $address = $_POST['address'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $error_message = "";
        $sql = "SELECT * FROM accounts WHERE email = '" . $mail . "'";
        if($conn->query($sql)->num_rows > 0){
            echo "このEメールアドレスが存在しました！登録できない！もう一度登録お願い致します！";
        }
        else {
            $sql = "INSERT INTO accounts (username, furigana, region, address, email, pass) VALUES ('". $username . "','" . $furigana . "','" . $region . "','" . $address ."','" . $mail  . "','" . $password ."')";
            if($conn->query($sql) === TRUE){
                echo "登録しました！ ありがとうございました！";
            }
            else {
                echo "登録できない！もう一度登録お願い致します！";
            }
        }
        
    }
?>