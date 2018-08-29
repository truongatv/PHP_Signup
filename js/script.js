$(document).ready(function(){
    $('#signup-form').validate({
        focusCleanup: true,
        rules: {
            Username: {
                required: true,
                minlength: 3,
                maxlength: 30,
                validateUser: true
            },
            Username_furigana: {
                required: true,
                minlength: 5,
                maxlength: 30,
                validateFurigana: true
            },
            region: {
                required: true,
                minlength: 3,
                maxlength: 50,
                validateRegion: true
            },
            address :{
                required: true,
                minlength: 5,
                maxlength: 100,
                validateAddress: true
            },
            mail: {
                required: true,
                maxlength: 50,
                email: true,
                validateEmail: true
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
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" ),
                validateUser: "この名前はじゃない！"
            },
            Username_furigana: {
                required: "このフィールドは必須です。",
                minlength: $.validator.format("{0} 文字以上で入力してください。"),
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" ),
                validateFurigana: "このふりがなはじゃない！"
            },
            region: {
                required: "このフィールドは必須です。",
                minlength: $.validator.format("{0} 文字以上で入力してください。"),
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" ),
                validateRegion: "この都道府県は有効じゃない！"
            },
            address: {
                required: "このフィールドは必須です。",
                minlength: $.validator.format("{0} 文字以上で入力してください。"),
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" ),
                validateAddress: "この住所は有効じゃない！"
            },
            mail: {
                required: "このフィールドは必須です。",
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" ),
                email: "有効なEメールアドレスを入力してください。",
                validateEmail: "有効なEメールアドレスを入力してください",
            },
            password: {
                required: "このフィールドは必須です。",
                maxlength: $.validator.format( "{0} 文字以内で入力してください。" ),
                minlength: $.validator.format("{0} 文字以上で入力してください。")
            }
        }
    });
    var validator = $( "#signup-form" ).validate();
    $.validator.addMethod("validateUser", function(value){
        var exp = /\d|[\$,\！,\＠,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\@,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/ ;
        if(exp.test(value)){
            return false
        };
        return true;
    });
    $.validator.addMethod("validateFurigana", function(value){
        var exp = /\d|[\$,\！,\＠,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\@,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/ ;
        if(exp.test(value)){
            return false
        };
        return true;
    });
    $.validator.addMethod("validateRegion", function(value){
        var exp = /\d|[\$,\！,\＠,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\@,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/ ;
        if(exp.test(value)){
            return false
        };
        return true;
    });
    $.validator.addMethod("validateAddress", function(value){
        var exp = /[\$,\！,\＠,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\@,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/ ;
        if(exp.test(value)){
            return false
        };
        return true;
    });
    $.validator.addMethod("validateEmail", function(value){
        var exp_special = /[\$,\！,\＃,\＄,\％,\＾,\＆,\＊,\（,\）,\ー,\＝,\＋,\？,\＜,\＞,\・,\!,\#,\%,\^,\&,\*,\(,\),\<,\>,\+,\=,\?]/ ;
        var exp_dotcom = /.*\..*/
        if(!exp_special.test(value) && exp_dotcom.test(value)){
            return true 
        }
        else {
            return false;
        } 
    });
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