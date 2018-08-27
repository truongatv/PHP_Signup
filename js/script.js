$(document).ready(function(){
    $('#signup-form').validate({
        focusCleanup: true,
        rules: {
            Username: {
                required: true,
                maxlength: 30
            },
            Username_furigana: {
                required: true,
                maxlength: 30
            },
            region: {
                required: true,
                maxlength: 50
            },
            address :{
                required: true,
                maxlength: 100,
            },
            mail: {
                required: true,
                maxlength: 50,
                email: true
            },
            password: {
                required: true,
                maxlength: 30
            }
        },
        messages: {
            Username: {
                required: "このフィールドは必須です。",
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" )
            },
            Username_furigana: {
                required: "このフィールドは必須です。",
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" )
            },
            region: {
                required: "このフィールドは必須です。",
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" )
            },
            address: {
                required: "このフィールドは必須です。",
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
            }
        }
    });
    var validator = $( "#signup-form" ).validate();
    $("#mail").blur(function (e) { 
        e.preventDefault();
        console.log("test");
        var mail = $('#mail').val();
        if(validator.element('#mail')){
            $.get("check_email_exist.php",{mail: mail}, function(data){
                if (data === "yes"){
                    $('#check-mail').html("このEメールアドレスが存在しました！");
                    $('#mail').html("").focus();
                }
                else {
                    $('#check-mail').html("このEメールアドレスはいいです！");
                }
            })
        }        
    });

})