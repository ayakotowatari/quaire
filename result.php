<?php 

include("funcs.php");

// 下の3つの回答項目のみを集計
$destination = $_POST["destination"];
$studyLevel = $_POST["study-level"];
$subject = $_POST["subject"];

// txtファイルの読み出しと結果の書き込み（r+) bはフラグとして加えるように参考記事にあったもの。
// 今回、集計したい項目は24個あるため、あらかじめ、0が25列（最後に回答数合計用に１列加えてある）並んだresult.textを、dataフォルダーに用意。
// つまり、回答結果24個の配列を用意する。そこに結果が加算されていく。
// なお実際にディプロイするときには、セキュリティのため、result.textはhtdocと違うフォルダーに置く。

$resultFile = "./data/result.txt";

$fp = fopen($resultFile, "r+b");

if(!$fp) {  //fopen()関数の戻り値を検証
    exit('ファイルが存在しないか異常があります');
  }
  if(!flock($fp, LOCK_EX)){   //テキストを排他的にロックし、その戻り値を検証
    exit('ファイルをロックできませんでした');
  }

// $fpのそれぞれの行を読み出して$resultsの配列に格納([]が重要)
while(!feof($fp)){
    $results[] = trim(fgets($fp));
    // var_dump($results);
}

//各項目の回答結果を加算
if($destination == 1) $results[0] ++;

if($destination == 2) $results[1] ++;

if($destination == 3) $results[2] ++;

if($destination == 4) $results[3] ++; 

if($destination == 5) $results[4] ++;

if($destination == 6) $results[5] ++;


if($studyLevel == 1) $results[6] ++;

if($studyLevel == 2) $results[7] ++;
 
if($studyLevel == 3) $results[8] ++;


if($subject == 1) $results[9] ++;

if($subject == 2) $results[10] ++; 

if($subject == 3) $results[11] ++; 

if($subject == 4) $results[12] ++; 
 
if($subject == 5) $results[13] ++; 

if($subject == 6) $results[14] ++; 

if($subject == 7) $results[15] ++; 

if($subject == 8) $results[16] ++;
  
if($subject == 9) $results[17] ++; 
 
if($subject == 10) $results[18] ++; 

if($subject == 11) $results[19] ++; 

if($subject == 12) $results[20] ++; 

if($subject == 13) $results[21] ++; 

if($subject == 14) $results[22] ++; 

if($subject == 15) $results[23] ++; 

// 全回答集の集計（必要な場合）
$results[24] ++;

// ポインタを最初に戻す
rewind($fp);

// 全ての$results値を$fpに書き込み
foreach($results as $value){
    fwrite($fp, $value."\n");
}

fclose($fp);

?>

<!DOCTYPE html>
<html class="html" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="result-body">

<div class="result-inner">
    <!-- navbar -->
    <div class="navigation">
            <i id="home" class="fas fa-home"></i>
            <ul class="flex">
                <li class="logged-in" style="display: none;">
                    <a href="#" id="logout" class="nav-item">Logout</a>
                </li>
                <!-- <li class="admin">
                    <a href="" id="create-event" class="nav-item">Create Event</a>
                </li> -->
                <li class="logged-out" style="display: none;">
                    <a href="#modal-login" id="login" class="nav-item modal-trigger">Login</a>
                </li>
                <li class="logged-out" style="display: none;">
                    <a href="#modal-signup" id="signup" class="nav-item modal-trigger">Sign up</a>
                </li>
            </ul>
    </div>

        <h1 class="result-header">ご協力ありがとうございました</h1> 
        <a href="chart.php"><span class="result-text">結果をみる</span></a> 


</div>
</body>
</html>
