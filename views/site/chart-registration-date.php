<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use \app\models\NameRegDateChart;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

$this->title = 'Registratin date statistic';
$this->params['breadcrumbs'][] = $this->title;

//Name::getDataRegistrationDateChart();
?>
<div class="site-charts">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="img-form">

        <?php $form = ActiveForm::begin([
            'action' => 'registration-date-chart',
            'id' => 'reg-date-form',
            'options' => ['class' => 'form-horizontal'],
            ]); ?>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-2">
        <?= $form->field($model, 'from_date')->widget(DatePicker::classname(), [
            'id'  => 'from_date',
            'language' => 'ru',
            'clientOptions' =>[
                'showButtonPanel' => true,
                'autoSize' => true,
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '2000:2038',
            ],
            'dateFormat' => 'dd-MM-yyyy',
        ]) ?>
            </div>
            <div class="col-sm-2">
        <?= $form->field($model, 'to_date')->widget(DatePicker::classname(), [
            'id'  => 'to_date',
            'language' => 'ru',
            'clientOptions' =>[
                'showButtonPanel' => true,
                'autoSize' => true,
                'changeMonth' => true,
                'changeYear' => true,
                'yearRange' => '2000:2038',
            ],
            'dateFormat' => 'dd-MM-yyyy',
        ]) ?>
            </div>
            <div class="col-sm-3">
        <?= $form->field($model, 'detailing', ['template' => '<div class="col-md-3">
                                     {label}
                                </div>
                               <div class="col-md-9"> 
                                     {input}{error}{hint}
                               </div>'
        ])->dropDownList(NameRegDateChart::getDetailingList()); ?>
            </div>
            <div class="col-sm-3">
        <button class="btn btn-info">Submit</button>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <canvas id="chart-of-registry-date" width="400" height="200"></canvas>

</div>
<?php

$this->registerJsFile('/js/Chart.bundle.min.js');
if (isset($data)){
    $js = "
           var data = JSON.parse('".$data."');
            //data = data['data'];
            var cnvElRegDate = document.getElementById('chart-of-registry-date');
            var chartRegDate = new Chart(cnvElRegDate, {
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
            });";

    $this->registerJs($js);
}
?>