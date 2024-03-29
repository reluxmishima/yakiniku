<?php session_start(); ?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>やきにく実践塾</title>
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
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="header">
            <p id="dateDisplay"></p>
        <h1 class="logo-lg">- 予約受付 -</h1>
        <div class="menu">
            <ul class="home_menu">
                <li class="header_menu"><a href="./index.html">予約受付</a></li>
                <li class="header_menu"><a href="./reserve_list.html">予約一覧</a></li>
                <li class="header_menu"><a href="./reserve_edit.html">予約編集</a></li>
            </ul>
        </div>       
        </header>
        <form action="post.php" method="POST" id="form">
        <div class="inner">
            <div class="m_modifier">
                <label for="phone_no" class="block title en_9">電話番号</label>
                <input type="tel" class="input_area" id="phone_no" name="phone_no" placeholder="09012345678" maxlength="11">
                <input type="submit" id="btnCheck" name="btnCheck" value="顧客確認">
            </div>        
            <div class="m_modifier">
                <label for="reserve_date" class="block en_1">予約日</label>
                <input type="text" class="input_area" id="datepicker" name="reserve_date" readonly="readonly" onblur="reserveChange" placeholder="YYYY/MM/DD" value="">
            </div>
            <div class="m_modifier">
                <label for="reserve_time" class="block en_2">予約時刻</label>
                <select class="reserve_time other" id="start_time" name="reserve_time">
                    <option value="">----</option>
                    <option value="17:00" class="content">17時00分</option>
                    <option value="17:30" class="content">17時30分</option>
                    <option value="18:00" class="content">18時00分</option>
                    <option value="18:30" class="content">18時30分</option>
                    <option value="19:00" class="content">19時00分</option>
                    <option value="19:30" class="content">19時30分</option>
                    <option value="20:00" class="content">20時00分</option>
                    <option value="20:30" class="content">20時30分</option>
                    <option value="21:00" class="content">21時00分</option>
                    <option value="21:30" class="content">21時30分</option>
                    <option value="22:00" class="content">22時00分</option>
                    <option value="22:30" class="content">22時30分</option>
                </select> 　〜　
                <select class="reserve_time" id="end_time" name="end_time">
                    <option value="">----</option>
                    <option value="17:30">17時30分</option>
                    <option value="18:00">18時00分</option>
                    <option value="18:30">18時30分</option>
                    <option value="19:00">19時00分</option>
                    <option value="19:30">19時30分</option>
                    <option value="20:00">20時00分</option>
                    <option value="20:30">20時30分</option>
                    <option value="21:00">21時00分</option>
                    <option value="21:30">21時30分</option>
                    <option value="22:00">22時00分</option>
                    <option value="22:30">22時30分</option>
                    <option value="23:00">23時00分</option>
                </select>
            </div>
            <div class="m_modifier">
                <div class="trans-title">
                    <label for="quantity" class="block count_title en_3">大人人数</label>
                    <input type="tel" class="num" id="adult" name="quantity" maxlength="2"> 人
                </div>
                <div class="trans-title">
                    <label for="quantity" class="block count_title en_4">子ども人数</label>
                    <input type="tel" class="num" id="child" name="quantity" maxlength="2"> 人
                </div>
            </div>
            <div class="m_modifier">
                <label class="block title en_7">席タイプ</label>
                <div class="radio-inline">
                    <input type="radio" id="seat_type_0" class="seat_ch lee" name="seat_type" value="ボックス席"><label class="sky" for="seat_type_0">ボックス席</label>
                    <input type="radio" id="seat_type_1" class="seat_ch lee" name="seat_type" value="カウンター席"><label class="sky" for="seat_type_1">カウンター席</label>
                    <input type="radio" id="seat_type_2" class="seat_ch lee" name="seat_type" value="テーブル席"><label class="sky" for="seat_type_2">テーブル席</label>
                    <input type="radio" id="seat_type_3" class="seat_ch lee" name="seat_type" value="指定なし"><label class="sky" for="seat_type_3">指定なし</label>
                </div>
            </div>
            <div class="m_modifier">
            <label class="block title en_8">喫煙有無</label>
                <div class="radio-inline">    
                    <input type="checkbox" id="seat_smoke_0" class="smoke_ch lee" name="seat_smoke" value="禁煙席"><label class="sky" for="seat_smoke_0">禁煙席</label>
                    <input type="checkbox" id="seat_smoke_1" class="smoke_ch lee" name="seat_smoke" value="喫煙席"><label class="sky" for="seat_smoke_1">喫煙席</label>
                    <input type="checkbox" id="seat_smoke_2" class="smoke_ch lee" name="seat_smoke" value="どちらでも"><label class="sky" for="seat_smoke_2">どちらでも</label>
                </div>
            </div>
            <div class="m_modifier">
                <label for="" class="judge block en_5">空席卓一覧</label>
                <div class="judge_area"></div>
            </div>    
            <div class="m_modifier">
                <label for="" class="block title en_6">卓番選択</label>
                <select class="reserve_seat" id="seat_number" name="seat_number">
                    <option value="">----</option>
                    <option value="1">No.1(カウンター最大1名)</option>
                    <option value="2">No.2(カウンター最大1名)</option>
                    <option value="3">No.3(カウンター最大1名)</option>
                    <option value="4">No.4(テーブル最大4名)</option>
                    <option value="5">No.5(テーブル最大4名)</option>
                    <option value="6">No.6(テーブル最大4名)</option>
                    <option value="7">No.7(テーブル最大4名)</option>
                    <option value="8">No.8(ボックス最大8名)</option>
                    <option value="9">No.9(ボックス最大8名)</option>
                    <option value="10">No.10(ボックス最大8名)</option>
                </select>
            </div>    
            <div class="m_modifier">
                <label for="client_name" class="block title en_10">氏名</label>
                <input type="text" class="input_area" id="client_name" name="client_name" placeholder="ひらがな入力" value=""> 様
            </div>
            <div class="m_modifier">
                <label class="block title en_11">受付備考</label>
                <textarea id="remarks" class="input_comment" name="remarks" placeholder="お客様からの要望を入力"></textarea>
            </div>
            <div class="m_modifier">
                <label for="" class="judge block en_13">復唱確認リスト</label>
                <div class="repeat_list">
                    <div class="log-d"><p class="log-p">電話番号：</p><p class="logtel"></p></div>
                    <div class="log-d"><p class="log-p">予約日：</p><p class="logreserve"></p></div>
                    <div class="log-d"><p class="log-p">開始時刻：</p><p class="logstart"></p></div>
                    <div class="log-d"><p class="log-p">大人人数：</p><p class="logcountA"></p></div>
                    <div class="log-d"><p class="log-p">子ども人数：</p><p class="logcountC"></p></div>
                    <div class="log-d"><p class="log-p">席タイプ：</p><p class="logseat"></p></div>
                    <div class="log-d"><p class="log-p">喫煙：</p><p class="logsmoke"></p></div>
                    <div class="log-d"><p class="log-p">氏名：</p><p class="logname"></p></div>
                </div>
            </div>
            <div class="m_modifier">
                <label class="block title en_12">スタッフID</label>
                <input type="tel" class="input_area must" id="staff_no" name="staff_no" placeholder="001" value="">
            </div>
            <div class="submit_area">
                <button id="create-modal" class="btnSubmit ">入力内容の確認</button>
                <!-- <input type="submit" id="btnSubmit" class="btnSubmit" name="btnSubmit" value="予約送信"> -->
                <button class="btn">入力クリア</button>
            </div>
        </div>
        </form>
    </div>
    <!-- ./wrapper -->
    <script src="./yakiniku.js"></script>
</body>
</html>