<?php
session_start();
$_SESSION['session_message'] = 'session is saved';
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>post.php</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- favicon -->
    <link rel="apple-touch-icon" type="image/png" href="./apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="./icon-192x192.png">
    <link rel="icon" type="image/png" href="./favicon.ico">
    <!-- jQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1/themes/dark-hive/jquery-ui.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel|Didact+Gothic&display=swap" rel="stylesheet">
    <!-- file for out -->
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <pre>
            <?php print($_SESSION['session_message']); ?>
            <?php
                print_r($_POST)
            ?>
            <?php session_unset(); ?>
        </pre>
    </div>
</body>
</html>