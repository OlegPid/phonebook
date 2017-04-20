<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\City;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Names';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="name-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'fio',
            [
                'attribute'=>'city_id',
                'label'=>'City',
                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                    return $data->getCityName();
                },
                'filter' => City::getCitiesList()
            ],
            [
                'attribute'=>'phones',
                'label'=>'Phones',
                'format'=>'html', // Возможные варианты: raw, html, text
                'content'=>function($data){
                    return $data->getPhonesList();
                },
            ],            
        ],
    ]); ?>
</div>
