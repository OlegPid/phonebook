<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\City;
/* @var $this yii\web\View */
/* @var $model app\models\Name */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="name-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'city_id')->dropdownList(
    	City::find()->select(['name', 'id'])->indexBy('id')->column(),
    	['prompt'=>'Select city']);
    ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
