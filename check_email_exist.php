<?php
    require('connect_db.php');
    if(isset($_GET['mail'])){
        $mail = $_GET['mail'];
        $sql = "SELECT * FROM accounts WHERE email = " . $mail . "";
        if($conn->query($sql)->num_rows > 0){
            // echo "このEメールアドレスが存在しました！";
            echo "yes";
        }
        else {
            // echo "このEメールアドレスはいいです！";
            echo "no";
        }
    }
?>