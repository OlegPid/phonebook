<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\City;
use app\models\Country;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Names';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="name-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Name', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'country_id',
                'label'=>'Country',
                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                    return $data->getCountryName();
                },
                'filter' => Country::getCountriesList()
            ],            
            [
                'attribute'=>'city_id',
                'label'=>'City',
                'format'=>'text', // Возможные варианты: raw, html
                'content'=>function($data){
                    return $data->getCityName();
                },
                'filter' => City::getCitiesList()
            ],
            'fio',
            [
                'attribute'=>'phone_search',
                'label'=>'Phones',
                'format'=>'html', // Возможные варианты: raw, html, text
                'content'=>function($data){
                    return $data->getPhonesList();
                },
            ],
            [
                'attribute'=>'img',
                'label'=>'Avatar',
                'contentOptions'=>['align'=>'center'],
                'format' => 'raw',
                'value' => function($data) {
                    if (!empty($data->img)){
                        return Html::img($data->getImg(),[
                            'alt' => 'yii2 - картинка в gridview',
                            'style' => 'heigth:30px;width:30px;border-radius: 15px;',
                        ]);
                    }
                    return '';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
