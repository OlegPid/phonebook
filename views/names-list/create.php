<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NamesList */

$this->title = 'Create Names List';
$this->params['breadcrumbs'][] = ['label' => 'Names Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="names-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
