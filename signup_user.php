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
        $exp_special = '/\d|[\$,\！,\＠,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\@,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/';
        $exp_special_address = '/[\$,\！,\＠,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\@,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/';
        $exp_special_mail = '/[\$,\！,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/';
        if(preg_match($exp_special, $username) || preg_match($exp_special, $furigana) || preg_match($exp_special,$region) || preg_match($exp_special_address, $address) || preg_match($exp_special_mail, $mail)){
            echo "この情報は有効じゃないです！";
            $check_signup = 0;
        }
        else{
            $sql = "SELECT * FROM accounts WHERE email = '" . $mail . "'";
            if($conn->query($sql)->num_rows > 0){
                $check_signup = 0;
                echo "このEメールアドレスが存在しました！登録できない！もう一度登録お願い致します！";
            }
            else {
                $sql = "INSERT INTO accounts (username, furigana, region, address, email, pass) VALUES ('". $username . "','" . $furigana . "','" . $region . "','" . $address ."','" . $mail  . "','" . $password ."')";
                if($conn->query($sql) === TRUE){
                    $check_signup = 1;
                }
                else {
                    $check_signup = 0;
                    echo "登録できない！もう一度登録お願い致します！";
                }
            }
        }
        
        
    }
?>
<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="main-signup">
        <h1>ご登録ありがとうございます！</h1>
        <div class="content-list-user">
            <div>
                <?php if($check_signup == 1) { ?>
                    <h2>登録情報！</h2>
                    <table class="confirm-tb">
                        <tr>
                            <td scope="row">名前</td>
                            <td><?php echo $username; ?></td>
                        </tr>
                        <tr>
                            <td scope="row">ふりがな</td>
                            <td><?php echo $furigana; ?></td>
                        </tr>
                        <tr>
                            <td scope="row">都道府県</td>
                            <td><?php echo $region; ?></td>
                        </tr>
                        <tr>
                            <td scope="row">住所</td>
                            <td><?php echo $address; ?></td>
                        </tr>
                        <tr>
                            <td scope="row">Eメールアドレス</td>
                            <td><?php echo $mail; ?></td>
                        </tr>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>