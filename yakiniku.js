// Date picker-----------------------------------
$("#datepicker").datepicker();
$(function() {
var op = {
    closeText: '閉じる',
    prevText: '&#x3c;前',
    nextText: '次&#x3e;',
    currentText: '今日',
    monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
    monthNamesShort: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
    dayNames: ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
    dayNamesShort: ['日','月','火','水','木','金','土'],
    dayNamesMin: ['日','月','火','水','木','金','土'],
    weekHeader: '週',
    dateFormat: 'yy/mm/dd',
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: true,
    yearSuffix: '年'
    };
    $(".datepicker").datepicker(op);
    $(".datepicker").attr({
        size: "16",
        autocomplete: "off"
    });
});

// Date display---------------------------------
const date = new Date();
const month = date.getMonth() + 1;
const hiduke = date.getDate();
const day = date.getDay();
const label = `${month}月${hiduke}日`;
const dayList = ['日', '月', '火', '水', '木', '金', '土'];
const dayLabel = dayList[day];
const hours = date.getHours();
const minutes = date.getMinutes();
const seconds = date.getSeconds();
const times = `${hours}:${minutes}:${seconds}`;

document.querySelector('#dateDisplay').innerHTML = `${label}(${dayLabel})${times}`;

// Form area-----------------------------------
// 予約日
const reserveElement = document.getElementById('datepicker');
reserveElement.addEventListener('change', reserveChange);

function reserveChange(event) {
    var reserveValue = event.target.value;
    document.querySelector('.logreserve').innerHTML = reserveValue.change();

}
// 予約時刻

// 大人人数
const countElement = document.querySelector('#adult');
countElement.addEventListener('input', countChange);

function countChange(event) {
    var countValueA = event.target.value;
    document.querySelector('.logcountA').innerHTML = countValueA;
}
// 子ども人数
const countElementC = document.querySelector('#child');
countElementC.addEventListener('input', countChangeC);

function countChangeC(event) {
    var countValueC = event.target.value;
    document.querySelector('.logcountC').innerHTML = countValueC;
}

// 席タイプ
const formElement = document.getElementById('form');
formElement.addEventListener('change', (event) => {
    const seatNodeList = formElement.seat_type;
    const seatType = seatNodeList.value;
    var seatValue = `${seatType}`;
    document.querySelector('.logseat').innerHTML = seatValue;
});

// 喫煙有無
const formElementSmoke = document.getElementById('form');
formElementSmoke.addEventListener('change', (event) => {
    const smokeNodeList = formElementSmoke.seat_smoke;
    const seatSmoke = smokeNodeList.value;
    var detailLog = `${seatSmoke}`;
    document.querySelector('.logsmoke').innerHTML = detailLog;
});

// 電話番号
const telElement = document.querySelector('#phone_no');
telElement.addEventListener('input', telChange);

function telChange(event) {
    var telValue = event.target.value;
    document.querySelector('.logtel').innerHTML = telValue;
}

// お客様氏名
const nameElement = document.querySelector('#client_name');
nameElement.addEventListener('input', nameChange);

function nameChange(event) {
    var nameValue = event.target.value;
    document.querySelector('.logname').innerHTML = nameValue;
}


// Button click reload
document.querySelector('.btn').addEventListener('click', () => {
    location.reload(true);
});

// モーダルウィンドウ生成

const divElement = document.createElement('div');
const paragraphElement = document.createElement('p');
