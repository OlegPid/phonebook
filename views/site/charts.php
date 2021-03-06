<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \app\models\Name;

$this->title = 'Charts';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="site-charts">
    <h1><?= Html::encode($this->title) ?></h1>
    <canvas id="chart-of-country" width="400" height="200"></canvas>
    <canvas id="chart-of-registry-date" width="400" height="200"></canvas>

</div>
<?php

$this->registerJsFile('/js/Chart.bundle.min.js');
$js = "
$.get( 'get-contry-chart', function(dat) {
        var cnvElCountry = document.getElementById('chart-of-country');
        var data = JSON.parse(dat);
        data = data['data'];
        var chartCountry = new Chart(cnvElCountry, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: data.datasets.label,
                    data: data.datasets.data,
                    backgroundColor: data.datasets.backgroundColor,
                    borderColor: data.datasets.borderColor,
                    borderWidth: data.datasets.borderWidth
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
//******************************************************************************************
        var cnvElRegDate = document.getElementById('chart-of-registry-date');
        var chartRegDate = new Chart(cnvElRegDate, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
                
});        
        ";

$this->registerJs($js);
?>