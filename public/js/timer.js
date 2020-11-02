// console.log(1);
// より厳格なエラーチェック
'use strict';

// htmlから取得したデータを変数に代入
var timer = document.getElementById('timer');
var start = document.getElementById('start');
var stop = document.getElementById('stop');
var reset = document.getElementById('stop');

// クリック時の時間を保持するための変数定義
var startTime;
//経過時刻を更新するための変数。 初めはだから0で初期化
var elapsedTime = 0;

//タイマーを止めるにはclearTimeoutを使う必要があり、そのためにはclearTimeoutの引数に渡すためのタイマーのidが必要
var timerId;

//タイマーをストップ -> 再開させたら0になってしまうのを避けるための変数。
var timeToadd = 0;


//ミリ秒の表示ではなく、分とか秒に直すための関数, 他のところからも呼び出すので別関数として作る
//計算方法として135200ミリ秒経過したとしてそれを分とか秒に直すと -> 02:15:200
function updateTimetText() {

    //m(分) = 135200 / 60000ミリ秒で割った数の商　-> 2分
    var m = Math.floor(elapsedTime / 60000);

    //s(秒) = 135200 % 60000ミリ秒で / 1000 (ミリ秒なので1000で割ってやる) -> 15秒
    var s = Math.floor(elapsedTime % 60000 / 1000);

    //HTML 上で表示の際の桁数を固定する　例）3 => 03　、 12 -> 012
    //javascriptでは文字列数列を連結すると文字列になる
    //文字列の末尾2桁を表示したいのでsliceで負の値(-2)引数で渡してやる。
    m = ('0' + m).slice(-2);
    s = ('0' + s).slice(-2);

    //HTMLのid　timer部分に表示させる　
    timer.textContent = m + ':' + s;
}

// 再起的に使える用の関数
function countUp() {
    timerId = setTimeout(function() {
        // ストップウォッチの初期値
        elapsedTime = Date.now() - startTime + timeToadd;
        updateTimetText();

        //countUp関数自身を呼ぶことで1秒毎に以下の計算を始める
        countUp();

        // 1秒後に始めるよう宣言
    }, 1000)
}

// startボタンクリックイベント
start.addEventListener('click', function() {
    // 現在時刻
    startTime = Date.now();

    // runボタンとstopボタンの切り替え
    this.classList.add('hide');
    stop.classList.remove('hide');

    //再帰的に使えるように関数を作る
    countUp();
})

// stopボタンクリックイベント
stop.addEventListener('click', function() {
    // runボタンとstopボタンの切り替え
    this.classList.add('hide');
    start.classList.remove('hide');

    // タイマーを止める
    clearTimeout(timerId);

    // タイマーを再開させたら0から始まってしまうので、それを防ぐ
    timeToadd += Date.now() - startTime;
})