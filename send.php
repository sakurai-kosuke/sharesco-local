// <!DOCTYPE html>
// <html>
// <head>
// <meta charset="utf-8" />
// </head>
// <body>
<?php
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    $mail = "sakurai.kosuke.sb4@is.naist.jp";
    $subject = "大会作成";
    $content = "認証番号：";
    if(mb_send_mail("sakurai.kosuke.sb4@is.naist.jp", $subject, $content,1)){
        echo "メールを送信しました";
    } else {
        echo "メールの送信に失敗しました";
    };
?>
<!--</body>-->
<!--</html>-->