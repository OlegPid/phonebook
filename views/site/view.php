<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Name */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="name-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-sm-4">
            <?= Html::img($model->getImg(), [
                'alt' => 'Аватар',
                'id' => 'avatar',
                'style' => 'border : 2px solid #000000;',
                'height' => '300px',
                'width' => '300px'
            ]) ?>
        </div>
        <div class="col-sm-8">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'label'=>'Country',
                        'value'=>$model->country->name,
                    ],
                    [
                        'label'=>'City',
                        'value'=>$model->city->name,
                    ],
                    //'city.name',
                    'fio',
                ],
            ]) ?>
            <h3><?= Html::encode('Numbers') ?></h3>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'layout'=>"{items}",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'number',
                ],
            ]); ?>
        </div>
    </div>

</div>
