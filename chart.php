<?php 

$filename = "./data/result.txt";

$fp = fopen($filename, "r");

// result.txtにの中にある$resultsの各値を、$txtの配列[]の中に読み込む（ここは同じ変数$resultsでも良いのかもしれないが、$txtとしておいた
while(!feof($fp)){
    $txt[] = fgets($fp);

    

    // echo $txt."<br>";
    // var_dump($txt);
}

// echo $txt[2];

fclose($fp);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

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

<!-- chart.jsを表示するためのcanvas設置 -->
    <div class="pie-chart-container">
        <canvas id="myChart1" width="400px" height="400px"></canvas>
    </div>  
    <div class="pie-chart-container">
        <canvas id="myChart2" width="400px" height="400px"></canvas>
    </div> 
    <div class="pie-chart-container1">
        <canvas id="myChart3" width="800px" height="800px"></canvas>
    </div> 

<footer class="footer">

    <small>&copy; Out And Reach 2020</small>

</footer>

<!-- jqueryとchart.jsの読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>



<script>

var ctx1 = $('#myChart1');
var ctx2 = $('#myChart2');
var ctx3 = $('#myChart3');


var options1 = {
    title :{
        display: true,
        position: "top",
        text: "Destinations of interest",
        fontSize: 18,
        fontColor: "#262626"
    },
    legend : {
        display: true,
        position: "bottom"
    }
};

var options2 = {
    title :{
        display: true,
        position: "top",
        text: "Level of study",
        fontSize: 18,
        fontColor: "#262626"
    },
    legend : {
        display: true,
        position: "bottom"
    }
};

var options3 = {
    title: {
        display: true,
        position: "top",
        text: "Subject areas of interest",
        fontSize: 18,
        fontColor: "#262626"
    },
    scales: {
        xAxes : [{
            ticks: {
                min: 0
            }
        }]
    },
    legend: {
        display: false
    }
};

// datasetsの中で、先ほど読み出してきた$txtの配列のそれぞれの値をセットしている。例えば$txt[0]はUK、$txt[1]はUSA。
var data1 = {
    
    datasets: [{
        data: [<?= $txt[0]?>, <?= $txt[1]?>, <?= $txt[2]?>,<?= $txt[3]?>,<?= $txt[4]?>,<?= $txt[5]?>],
        backgroundColor: [
            "#6A2B86",
            "#F0E52F",
            "#1ABEBE",
            "#ED871D",
            "#DF3291",
            "#66266C",
        ],
        // borderColor: [
        //     "#262626",
        //     "#262626",
        //     "#262626",
        //     "#262626",
        //     "#262626",
        //     "#262626"
        // ],
        // borderWidth: [1, 1, 1, 1, 1, 1]
        borderAlign: "inner"
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'UK',
        'USA',
        'Australia',
        'Canada',
        'New Zealand',
        'Japan'
    ]};

    var data2 = {
    
    datasets: [{
        data: [<?= $txt[6]?>, <?= $txt[7]?>, <?= $txt[8]?>],
        backgroundColor: [
            "#71C3FE",
            "#D0FA96",
            "#F687AF"
        ],
        // borderColor: [
        //     "#262626",
        //     "#262626",
        //     "#262626",
        //     "#262626",
        //     "#262626",
        //     "#262626"
        // ],
        // borderWidth: [1, 1, 1, 1, 1, 1]
        borderAlign: "inner"
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Undergraduate',
        'Postgraduate',
        'MBA'
    ]};


var data3 = {
    datasets: [{
        // barPercentage: 0.5,
        // barThickness: "flex",
        // maxBarThickness: 8,
        // minBarLength: 2,
        backgroundColor: "#25DD76",
        borderColor: "#25DD76",
        borderWidth: 1,
        data: [<?= $txt[9]?>,<?= $txt[10]?>,<?= $txt[11]?>,<?= $txt[12]?>,<?= $txt[13]?>,<?= $txt[14]?>,<?= $txt[15]?>,<?= $txt[16]?>,<?= $txt[17]?>,<?= $txt[18]?>,<?= $txt[19]?>,<?= $txt[20]?>,<?= $txt[21]?>,<?= $txt[22]?>,<?= $txt[23]?>]
    }],
    labels: [
        "Agricultural Studies",
        "Architecture, Building and Urban Planning",
        "Computer and Mathematical Sciences",
        "Education and Training",
        "Science and Engineering",
        "Health and Medicine",
        "MBA",
        "Social Science and Communications",
        "Applied and Pure Sciences",
        "Business and Administrations",
        "Art and Design",
        "English as Foreign Language",
        "Legal Studies",
        "Arts and Humanities",
        "Travel, Tourism and Hospitality"
    ]
};


var myDoughnutChart = new Chart(ctx1, {
    type: 'doughnut',
    data: data1,
    options: options1
});

var myPieChart = new Chart(ctx2, {
    type: 'pie',
    data: data2,
    options: options2
});

var myBarChart = new Chart(ctx3, {
    type: 'horizontalBar',
    data: data3,
    options: options3
});




</script>
    
</body>
</html>