<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \app\models\Name;
use yii\jui\DatePicker;

$this->title = 'Registratin date statistic';
$this->params['breadcrumbs'][] = $this->title;

Name::getDataRegistrationDateChart();
?>
<div class="site-charts">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo DatePicker::widget([
        'name'  => 'from_date',
        'id'  => 'from_date',
        'value'  => '',
        'language' => 'ru',
        'clientOptions' =>[
            'showButtonPanel' => true,
            'autoSize' => true,
            'changeMonth' => true,
            'changeYear' => true,
            'yearRange' => '2000:2038',
        ],
        'dateFormat' => 'dd-MM-yyyy',
    ]);
    ?>
    <?php echo DatePicker::widget([
        'name'  => 'to_date',
        'id'  => 'to_date',
        'value'  => '',
        'language' => 'ru',
        'clientOptions' =>[
            'showButtonPanel' => true,
            'autoSize' => true,
            'changeMonth' => true,
            'changeYear' => true,
            'yearRange' => '2000:2038',
        ],
        'dateFormat' => 'dd-MM-yyyy',
    ]);
    ?>

    <canvas id="chart-of-registry-date" width="400" height="200"></canvas>

</div>
<?php

$this->registerJsFile('/js/Chart.bundle.min.js');
$js = "
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
        });";

$this->registerJs($js);
?>