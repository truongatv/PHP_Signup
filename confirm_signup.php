<?php
    require('connect_db.php');
    if(isset($_POST['mail'])){
        $username = $_POST['Username'];
        $furigana = $_POST['Username_furigana'];
        $region = $_POST['region'];
        $address = $_POST['address'];
        $mail = $_POST['mail'];
        $password = hash('ripemd128', $_POST['password']);
    }
?>

<html>
    <head>
        <title>登録情報</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $("#signup-button").click(function (e) { 
                    e.preventDefault();
                    var username = "<?php echo $username; ?>";
                    var furigana = "<?php echo $furigana; ?>";
                    var region = "<?php echo $region; ?>";
                    var address = "<?php echo $address; ?>";
                    var mail = "<?php echo $mail; ?>";
                    var password = "<?php echo $password; ?>";
                    $.post("signup_user.php", {username: username, furigana: furigana, region: region, address: address, mail: mail, password: password}, function(data){
                        $(".confirm-main").html(data);
                    })
                });
            })
        </script>
    </head>
    <body>
        <div class="confirm-main">
            <div class="confirm-title">
                <h1>登録情報</h1>
            </div>
            <div class="confirm-content">
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
            </div>
            <div class="button">
                <input type="button" class="btn btn-success" id="back-button" value="修正する" onclick="history.back()">
                <input type="button" class="btn btn-success" id="signup-button" value="登録する" name="done">
            </div>
        </div>
    </body>
</html>