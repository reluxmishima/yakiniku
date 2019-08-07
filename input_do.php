
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="description" content="this is kind text">
    <link rel="icon" href="images/icon.png" sizes="32x32" />
    <link rel="icon" href="images/icon×2.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="images/image-sp" /><!--150×150-->
    <link href="fontawesome-free-5.9.0-web/css/all.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/barba.js/1.0.0/barba.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.pjax/1.9.6/jquery.pjax.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link href="//fonts.googleapis.com/css?family=Encode+Sans+Expanded&display=swap" rel="stylesheet">
    <script src="js/main.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
try {
    // データベースに接続
    $db = new PDO(
        'mysql:dbname=testbase;host=127.0.0.1;charset=utf8mb4',
        'root',
        'Furuya@1129',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
// 値を変数に格納
$time = $_POST['時'] . ':00' . ':00';
$date = $_POST['年'] . '-' . $_POST['月'] . '-' . $_POST['日'];
$count = $_POST['visit_count'];
$seat = $_POST['seat_choice'];
$name = htmlspecialchars($_POST['fullname'], ENT_QUOTES);
$tel = htmlspecialchars($_POST['tel'], ENT_QUOTES);
// INSERT文を変数に格納↓
$formData = 'INSERT INTO reservation_master(representative_name, visit_count, table_type, phone_number, reservation_date, reservation_start_time, created_at, updated_at) VALUES("".$name)';
// エスケープ処理してSQL実行の準備↓
$statement = $db->prepare($formData);
// 挿入する値が入った変数をexecuteにセットしてSQLを実行
$statement->execute();

echo '登録完了';
} catch (PDOException $e) {
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage()); 
    }
?>
</body>
</html>