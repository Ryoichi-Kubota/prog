<?php
    $busyou = mt_rand(1,5);
    if($busyou===1){
        $gazou = "img/ryofu.png";
        $name = "呂布";
        $post = "左将軍";
        $tousotuV = 87;
        $buryokuV = 100;
        $tiryokuV = 26;
        $seijiV = 13;
        $miryokuV = 40;
    }elseif($busyou===2){
        $gazou = "img/ryomou.png";
        $name = "呂蒙";
        $post = "虎威将軍";
        $tousotuV = 91;
        $buryokuV = 81;
        $tiryokuV = 89;
        $seijiV = 78;
        $miryokuV = 82;
    }elseif($busyou===3){
        $gazou = "img/sousou.png";
        $name = "曹操";
        $post = "魏王";
        $tousotuV = 96;
        $buryokuV = 72;
        $tiryokuV = 91;
        $seijiV = 94;
        $miryokuV = 96;
    }elseif($busyou===4){
        $gazou = "img/syokaturyou.png";
        $name = "諸葛亮";
        $post = "丞相";
        $tousotuV = 92;
        $buryokuV = 38;
        $tiryokuV = 100;
        $seijiV = 95;
        $miryokuV = 92;
    }elseif($busyou===5){
        $gazou = "img/syuuyu.png";
        $name = "周瑜";
        $post = "偏将軍";
        $tousotuV = 97;
        $buryokuV = 71;
        $tiryokuV = 96;
        $seijiV = 86;
        $miryokuV = 93;
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>三国志 武将ステータス</title>
    <!-- <link rel="stylesheet" href="css/reset.css"> -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="android-chrome" href="img/android-chrome.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@800&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>
<body>
    <!-- <script src="js/js.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- ここからmein -->
    <main id="main">
        <!-- ここから画像 -->
        <div id="gazou">
            <!-- <div class="arrow_l" src="img/arrow_l2.png"><img src="img/arrow_l2.png"></div> -->
            <form action = 'index.php' method = 'post' class="arrow_l">
                <input type="image" src="img/arrow_l2.png" alt="左ボタン">
                <input type="hidden" name="arrow_l" value="1">
            </form>
            <div class="gazou-container">
                <img id="gazouV" src="<?= $gazou; ?>">
                <img class="Gline" src="img/line.png">
                <div id="name"><?= $name; ?></div>
            </div>
            <form action = 'index.php' method = 'post' class="arrow_r">
                <input type="image" src="img/arrow_r1.png" alt="右ボタン">
                <input type="hidden" name="arrow_r" value="1">
            </form>
            <!-- <div id="right" class="arrow_r"><img src="img/arrow_r1.png"></div> -->
        </div>
        <!-- ここからステータス -->
        <div id="status">
            <div class="status-container">
                <div class="Shead Sbox">官職</div>
                <div id="postV" class="Svalue Sbox"><?= $post; ?></div>
                <div class="Shead SHR Sbox">統率</div>
                <div id="tousotuV" class="Svalue Sbox"><?= $tousotuV; ?></div>
                <div class="Shead Sbox">武力</div>
                <div id="buryokuV" class="Svalue Sbox"><?= $buryokuV; ?></div>
                <div class="Shead SHR Sbox">知力</div>
                <div id="tiryokuV" class="Svalue Sbox"><?= $tiryokuV; ?></div>
                <div class="Shead Sbox">政治</div>
                <div id="seijiV" class="Svalue Sbox"><?= $seijiV; ?></div>
                <div class="Shead SHR Sbox">魅力</div>
                <div id="miryokuV" class="Svalue Sbox"><?= $miryokuV; ?></div>
            </div>
        </div>   
        <!-- ここからレーダーチャート -->
        <div id="chart">
            <div class="chart-container">
                <canvas id="myRadarChart">
                </canvas>
            </div>
        </div>

    </main>

    <!-- Chart.jsに関する記述 -->
    <script type="text/javascript">
    var ctx = document.getElementById("myRadarChart");
    var myRadarChart = new Chart(ctx, {
    //グラフの種類
    type: 'radar',
    //データの設定
    data: {
        //データ項目のラベル
        labels: ["統率", "武力", "知力", "政治", "魅力"],
        //データセット
        datasets: [
            {
                // label: "〇〇",
                //背景色
                backgroundColor: "rgba(0,153,255,0.8)",
                //枠線の色
                // borderColor: "rgba(200,112,126,1)",
                //結合点の背景色
                // pointBackgroundColor: "rgba(200,112,126,1)",
                //結合点の枠線の色
                // pointBorderColor: "#fff",
                //結合点の背景色（ホバ時）
                // pointHoverBackgroundColor: "#fff",
                //結合点の枠線の色（ホバー時）
                // pointHoverBorderColor: "rgba(200,112,126,1)",
                //結合点より外でマウスホバーを認識する範囲（ピクセル単位）
                hitRadius: 10,

                display: false,
                //グラフのデータ
                data: [<?= $tousotuV; ?>,<?= $buryokuV; ?>,<?= $tiryokuV; ?>,<?= $seijiV; ?>,<?= $miryokuV; ?>]
            }
        ]
    },
    options: {
         legend: {
            display: false,
         },
         scale: {
            ticks: {
                display: false, 
                },
                ticks: {             // 目盛り
                    min: 0,              // 最小値
                    max: 100,            // 最大値
                    fontSize: 0,        // 目盛り数字の大きさ
                    stepSize: 20,
                    showLabelBackdrop: false,
                    fontColor:"rgba(201,188,143,0)",
                    color: '#eee',
                },
                gridLines: {         // 補助線（目盛の線）
                    display: true,
                    color: "#555555",
                },
                angleLines: {        // 軸（放射軸）
                    display: true,
                    color: "#999999"
                },                
                pointLabels: {       // 軸のラベル
                    fontSize: 16,         // 文字の大きさ
                    fontColor: "rgba(201,188,143,0.8)",    // 文字の色
                },
        }
    }
    });
    </script>
</body>
</html>