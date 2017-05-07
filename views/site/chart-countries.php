<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \app\models\Name;

$this->title = 'Countries statistic';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="site-charts">
    <h1><?= Html::encode($this->title) ?></h1>
    <canvas id="chart-of-country" width="400" height="200"></canvas>
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
});";

$this->registerJs($js);
?>