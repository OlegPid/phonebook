<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Name */

$this->title = 'Update Name: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="name-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form-img', [
        'model' => $model_img,
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
        'modelsPhone' => $modelsPhone,
    ]) ?>

</div>
