$(document).ready(function(){
    $('#signup-form').validate({
        focusCleanup: true,
        rules: {
            Username: {
                required: true,
                minlength: 3,
                maxlength: 30
            },
            Username_furigana: {
                required: true,
                minlength: 5,
                maxlength: 30
            },
            region: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            address :{
                required: true,
                minlength: 5,
                maxlength: 100,
            },
            mail: {
                required: true,
                maxlength: 50,
                email: true
            },
            password: {
                required: true,
                maxlength: 30,
                minlength: 8
            }
        },
        messages: {
            Username: {
                required: "このフィールドは必須です。",
                minlength: $.validator.format( "{0} 文字以上で入力してください。" ),
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" )
            },
            Username_furigana: {
                required: "このフィールドは必須です。",
                minlength: $.validator.format("{0} 文字以上で入力してください。"),
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" )
            },
            region: {
                required: "このフィールドは必須です。",
                minlength: $.validator.format("{0} 文字以上で入力してください。"),
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" )
            },
            address: {
                required: "このフィールドは必須です。",
                minlength: $.validator.format("{0} 文字以上で入力してください。"),
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" ),
            },
            mail: {
                required: "このフィールドは必須です。",
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" ),
                email: "有効なEメールアドレスを入力してください。"
            },
            password: {
                required: "このフィールドは必須です。",
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" ),
                minlength: $.validator.format("{0} 文字以上で入力してください。")
            }
        }
    });
    var validator = $( "#signup-form" ).validate();
    $("#mail").blur(function (e) { 
        e.preventDefault();
        var mail = $('#mail').val();
        if(validator.element('#mail')){
            $.get("check_email_exist.php",{mail: mail}, function(data){
                if (data === "yes"){
                    $('#check-mail').html("このEメールアドレスが存在しました！");
                    $('#check-mail').css("color", "red");
                    $('#submit-signup').attr("disabled", true);
                }
                else {
                    $('#check-mail').html("このEメールアドレスはいいです！");
                    $('#check-mail').css("color", "green");
                    $('#submit-signup').attr("disabled", false);
                }
            })
        }        
    });
})