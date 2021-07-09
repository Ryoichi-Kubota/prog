<?php

  //sessionスタートをして、セッションを使えるようにする
  session_start();

  include("funcs.php");
  LoginCheck();

  $Sname = $_SESSION['name'];
  $Fname = $_SESSION['fname'];

  $pdo = db_connect();

  //２．データ登録SQL作成
  //作ったテーブル名を書く場所  xxxにテーブル名を入れます
  $stmt = $pdo->prepare("SELECT * FROM a_table");
  $status = $stmt->execute();

  // 月別購入者数
  $mon1 = $pdo->prepare("SELECT COUNT(*) FROM a_table WHERE indate LIKE '2021-01%'");
  $mon1->execute();
  $month1 = $mon1->fetchColumn();
  $mon2 = $pdo->prepare("SELECT COUNT(*) FROM a_table WHERE indate LIKE '2021-02%'");
  $mon2->execute();
  $month2 = $mon2->fetchColumn();
  $mon3 = $pdo->prepare("SELECT COUNT(*) FROM a_table WHERE indate LIKE '2021-03%'");
  $mon3->execute();
  $month3 = $mon3->fetchColumn();
  $mon4 = $pdo->prepare("SELECT COUNT(*) FROM a_table WHERE indate LIKE '2021-04%'");
  $mon4->execute();
  $month4 = $mon4->fetchColumn();
  $mon5 = $pdo->prepare("SELECT COUNT(*) FROM a_table WHERE indate LIKE '2021-05%'");
  $mon5->execute();
  $month5 = $mon5->fetchColumn();
  $mon6 = $pdo->prepare("SELECT COUNT(*) FROM a_table WHERE indate LIKE '2021-06%'");
  $mon6->execute();
  $month6 = $mon6->fetchColumn();

  // 月別平均単価
  $avgSales1 = $pdo->prepare("SELECT avg(sales) FROM a_table WHERE indate LIKE '2021-01%'");
  $avgSales1->execute();
  $avgS1 = $avgSales1->fetchColumn();
  $avgSales2 = $pdo->prepare("SELECT avg(sales) FROM a_table WHERE indate LIKE '2021-02%'");
  $avgSales2->execute();
  $avgS2 = $avgSales2->fetchColumn();
  $avgSales3 = $pdo->prepare("SELECT avg(sales) FROM a_table WHERE indate LIKE '2021-03%'");
  $avgSales3->execute();
  $avgS3 = $avgSales3->fetchColumn();
  $avgSales4 = $pdo->prepare("SELECT avg(sales) FROM a_table WHERE indate LIKE '2021-04%'");
  $avgSales4->execute();
  $avgS4 = $avgSales4->fetchColumn();
  $avgSales5 = $pdo->prepare("SELECT avg(sales) FROM a_table WHERE indate LIKE '2021-05%'");
  $avgSales5->execute();
  $avgS5 = $avgSales5->fetchColumn();
  $avgSales6 = $pdo->prepare("SELECT avg(sales) FROM a_table WHERE indate LIKE '2021-06%'");
  $avgSales6->execute();
  $avgS6 = $avgSales6->fetchColumn();

   // デバイス別 所有者数
   $deviceIPhone = $pdo->prepare("SELECT COUNT(device) FROM a_table WHERE device='iPhone'");
   $deviceIPhone->execute();
   $iPhone = $deviceIPhone->fetchColumn();
   $deviceAndroid = $pdo->prepare("SELECT COUNT(device) FROM a_table WHERE device='android'");
   $deviceAndroid->execute();
   $android = $deviceAndroid->fetchColumn();

  // ランク別の平均所得
  $avgRankIncome1 = $pdo->prepare("SELECT avg(annual_income) FROM a_table WHERE rank=1");
  $avgRankIncome1->execute();
  $avgRI1 = $avgRankIncome1->fetchColumn();
  $avgRankIncome2 = $pdo->prepare("SELECT avg(annual_income) FROM a_table WHERE rank=2");
  $avgRankIncome2->execute();
  $avgRI2 = $avgRankIncome2->fetchColumn();
  $avgRankIncome3 = $pdo->prepare("SELECT avg(annual_income) FROM a_table WHERE rank=3");
  $avgRankIncome3->execute();
  $avgRI3 = $avgRankIncome3->fetchColumn();
  $avgRankIncome4 = $pdo->prepare("SELECT avg(annual_income) FROM a_table WHERE rank=4");
  $avgRankIncome4->execute();
  $avgRI4 = $avgRankIncome4->fetchColumn();

  // 項目ごとの平均満足度
  $kakaku = $pdo->prepare("SELECT avg(answer_kakaku) FROM a_table");
  $kakaku->execute();
  $Kakaku = $kakaku->fetchColumn();
  $design = $pdo->prepare("SELECT avg(answer_design) FROM a_table");
  $design->execute();
  $Design = $design->fetchColumn();
  $support = $pdo->prepare("SELECT avg(answer_support) FROM a_table");
  $support->execute();
  $Support = $support->fetchColumn();
  $brand = $pdo->prepare("SELECT avg(answer_brand) FROM a_table");
  $brand->execute();
  $Brand = $brand->fetchColumn();
  $quality = $pdo->prepare("SELECT avg(answer_quality) FROM a_table");
  $quality->execute();
  $Quality = $quality->fetchColumn();
  
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&amp;display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="../img/chart-line-solid.svg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <title>AnalyticsTool AdminDashboard</title>
  </head>

  <body>
    <!-- header -->
    <header id="header">
      <div class="header-container">
        <ul class="nav-list1">
          <li>
            <div class="search">
              <p class="search-text">search</p>
              <i class="fas fa-search"></i>
            </div>
          </li>
        </ul>
        <ul class="nav-list2">
          <div class="nav-icon">
            <li>
              <P class="admin_name"><?=$Sname;?></P>
            </li>        
            <li>
              <?php if (empty($Fname)) : ?>
                <a href="" class="account-icon"><i class="fas fa-user-circle"></i></a>
              <?php else: ?>
                <p class="user-icon"><img class="user-icon-img" type="image/svg+xml" src="../imgs/<?=$Fname?>" ></p>
              <?php endif; ?>
            </li>        
            <li>
              <a href="" class="help-icon"><i class="fas fa-question-circle"></i></a>
            </li>
          </div>
        </ul>
      </div>
    </header>

    <!-- サイドバー -->
    <div id="sidebar">
      <ul class="side-ul">
        <li>
          <a href="index.php" class="side-icon"><i class="fas fa-chart-line"></i></a>
        </li>
        <li>
          <a href="create.php" class="side-icon"><i class="fas fa-user-plus"></i></a>
        </li>
        <li>
          <a href="select.php" class="side-icon"><i class="fas fa-users"></i></a>
        </li>
        <li>
          <a href="user_select.php" class="side-icon"><i class="fas fa-cog"></i></a>
        </li>
        <li>
          <a href="logout.php" class="side-icon sign-out-icon" onclick="return confirm('ログアウトします。よろしいですか？')"><i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
    </div>

    <!-- main -->
    <main id="main">
      <div class="main-container">
        <!-- 余白 -->
        <div class="left-margin"></div>
        <!-- 折れ線グラフ -->
        <div class="Lchart top-chart-box">
          <div class="top-chart">
            <canvas id="LineChart"></canvas>
          </div>
        </div>
        <!-- 棒グラフ -->
        <div class="Bchart top-chart-box">
          <div class="top-chart">
            <canvas id="BarChart"></canvas>
          </div>
        </div>
        <!-- 余白 -->
        <div class="left-margin"></div>
        <!-- ドーナツグラフ -->
        <div class="Dchart bottom-chart-box">
          <div class="bottom-chart">
            <div class="D-label">使用デバイスのシェア</div>
            <canvas id="DoughnutChart"></canvas>
          </div>
        </div>  
        <!-- 散布図 -->
        <div class="Splot bottom-chart-box">
          <div class="bottom-chart">
            <canvas id="ScatterPlot"></canvas>
          </div>
        </div>
         <!-- レーダーチャート -->
        <div class="Rchart bottom-chart-box"> 
          <div class="bottom-chart">
          <div class="R-label">要素別の顧客満足度</div>
            <canvas id="RadarChart"></canvas>
          </div>
        </div>
        
      </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
      
      // 折れ線グラフ
      var ctx2 = document.getElementById('LineChart');
      var data = {
        labels: ["1月", "2月", "3月", "4月", "5月" ,"6月"],
        datasets: [{
          label: '月別 購入者数（人）',
          data: [<?=$month1;?>, <?=$month2;?>, <?=$month3;?>, <?=$month4;?>, <?=$month5;?>, <?=$month6;?>],
          borderColor: 'rgba(255, 100, 100, 1)',
          lineTension: 0,
          fill: false,
          borderWidth: 3,
        }]
      };
      var options = {
        scales: {
          yAxes: [{
            ticks: {
              suggestedMax: 14, //最大値
              suggestedMin: 0, //最小値
              stepSize: 2, //縦ラベルの数値単位
              //beginAtZero: true
            }
          }]
      }};
      var ex_chart = new Chart(ctx2, {
        type: 'line',
        data: data,
        options: options
      });

      // 棒グラフ
      var ctx5 = document.getElementById("BarChart");
      var myBarChart = new Chart(ctx5, {
        type: 'bar',
        data: {
        //凡例のラベル
          labels: ['1月', '2月', '3月', '4月', '5月' ,'6月'],
          datasets: [
            {
              label: '月別 平均単価（万円）', //データ項目のラベル
              data: [<?=$avgS1;?>, <?=$avgS2;?>, <?=$avgS3;?>, <?=$avgS4;?>, <?=$avgS5;?>, <?=$avgS6;?>], //グラフのデータ
              backgroundColor: "rgba(241, 107, 141, 1)"
            }
          ]
        },
        options: {
          title: {
            // display: true,
            //グラフタイトル
            // text: 'Aサイト分析'
          },
          scales: {
            yAxes: [{
              ticks: {
                suggestedMax: 14, //最大値
                suggestedMin: 0, //最小値
                stepSize: 2, //縦ラベルの数値単位
                }
            }]
          },
        }
      });

      // ドーナツグラフ    
      var config = {
        type: 'doughnut',
        data: {
          datasets: [{
            data: [<?=$iPhone;?>, <?=$android;?>],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
            ]
          }],
          labels: ['iPhone', 'android']
        },
        options: {
          // pieceLabelの指定で表示方法をカスタマイズ
          pieceLabel: {position: 'outside'},
        },
      };
      window.onload = function() {
        var ctx = document.getElementById('DoughnutChart').getContext('2d');
        new Chart(ctx, config);
      };

      // 散布図
      var ctx4 = $('#ScatterPlot');
      var mychart = new Chart(ctx4, {
        type: 'scatter',
        data: {
          labels: [
            'ラベル１',
            'ラベル２',
            'ラベル３',
            'ラベル４',
            'ラベル５'
          ],
          datasets: [{
            label: '平均所得と会員ランクの相関',
            data: [
                {x:1,y:<?=$avgRI1;?>},{x:2,y:<?=$avgRI2;?>},{x:3,y:<?=$avgRI3;?>},{x:4,y:<?=$avgRI4;?>}
            ],
            backgroundColor: 'rgba(241, 107, 141, 1)',
          },]
        },
        options: {
          title: {
            // display: true,
            // text: 'サンプルグラフ',
          },
          scales: {
            xAxes: [{
              scaleLabel: {
                display: true,
                labelString: '会員ランク',
              },
              ticks: {
                suggestedMax: 4,
                suggestedMin: 0,
                stepSize: 1,
                callback: function(value, index, values){
                    return  value +  ''
                }
              },
            }],
            yAxes: [{
              scaleLabel: {
                display: true,
                labelString: '平均所得（万円）',
              },
              ticks: {
                suggestedMax: 700,
                suggestedMin: 0,
                // stepSize: ,
                callback: function(value, index, values){
                    return  value +  ''
              }},
            }]
        }}
      });

      // レーダーチャート
      var ctx = document.getElementById("RadarChart");
      var myRadarChart = new Chart(ctx, {
        type: 'radar',　//グラフの種類
        data: { 
          labels: ["価格", "デザイン", "サポート", "ブランド", "品質"],　//データ項目のラベル
          //データセット
          datasets: [{
            // label: "〇〇",　//背景色
            backgroundColor: "rgba(0,153,255,0.8)",　//枠線の色
            // borderColor: "rgba(200,112,126,1)",　//結合点の背景色
            // pointBackgroundColor: "rgba(200,112,126,1)",　//結合点の枠線の色 
            // pointBorderColor: "#fff",　//結合点の背景色（ホバ時）
            // pointHoverBackgroundColor: "#fff",　//結合点の枠線の色（ホバー時）
            // pointHoverBorderColor: "rgba(200,112,126,1)",　//結合点より外でマウスホバーを認識する範囲（ピクセル単位）
            hitRadius: 10,
            display: false,
            data: [<?=$Kakaku;?>,<?=$Design;?>,<?=$Support;?>,<?=$Brand;?>,<?=$Quality;?>]　//グラフのデータ
          }]
        },
        options: {
          legend: {
              display: false,
          },
          scale: {
            ticks: {
              display: false, 
            },
            ticks: {　// 目盛り
              min: 0,　// 最小値
              max: 5,　// 最大値
              fontSize: 0,　// 目盛り数字の大きさ
              stepSize: 1,
              showLabelBackdrop: false,
              fontColor:"rgba(201,188,143,0)",
              color: '#eee',
            },
            gridLines: {　// 補助線（目盛の線）
              display: true,
              color: "#ddd",
            },
            angleLines: {　// 軸（放射軸）
              display: true,
              color: "#ddd",
            },                
            pointLabels: {　// 軸のラベル
              fontSize: 12,　// 文字の大きさ
              fontColor: "#888",　// 文字の色
            },
        }}
      });

      // body内のelement.styleを無効
      <!--
      $(function() {
        $('body *').removeAttr('style');
      });
      -->

    </script>
  </body>
</html>
