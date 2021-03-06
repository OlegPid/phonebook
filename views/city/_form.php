<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Country;

/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'country_id')->dropdownList(
                Country::find()->select(['name', 'id'])->indexBy('id')->column(),
                ['prompt'=>'Select country']);
	?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
