<?php
    require('connect_db.php');
?>

<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <div class="main-signup">
        <h1>Signup Form</h1>
        <div class="content-signup">
            <div>
                <form id="signup-form" action="confirm_signup.php" method="post">
                    <div class="form-group">
                        <input class="text" type="text" name="Username" id="username" placeholder="名前">
                    </div>
                    <div class="form-group">
                        <input class="text" type="text" name="Username_furigana" id="username-furigana" placeholder="ふりがな">
                    </div>
                    <div class="form-group">
                        <input class="text" type="text" name="region" id="region" placeholder="都道府県">
                    </div>
                    <div class="form-group">
                        <input class="text" type="text" name="address" id="address" placeholder="住所">
                    </div>
                    <div class="form-group">
                        <input class="text" type="text" name="mail" id ="mail" placeholder="abc@gmail.com">
                        <label for="mail" id="check-mail"></label>
                    </div>
                    <div class="form-group">
                        <input class="text" type="password" name="password" id="password" placeholder="パスワード">
                    </div>
                    <div class="form-group submit-signup">
                        <input type="submit" class="btn btn-success" id="submit-signup" value="Submit" onclick="return ">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>