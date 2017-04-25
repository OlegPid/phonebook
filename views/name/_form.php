<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Country;
use app\models\City;
use app\models\NamesList;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\jui\AutoComplete;
use kartik\depdrop\DepDrop;
/* @var $this yii\web\View */
/* @var $model app\models\Name */
/* @var $form yii\widgets\ActiveForm */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-phone").each(function(index) {
        jQuery(this).html("Phone: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-phone").each(function(index) {
        jQuery(this).html("Phone: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>
<div class="name-form">
 <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'country_id')->dropdownList(Country::getCountriesList(),
                [
                'prompt'=>'Select country',
                'id'=>'cat-id',
                ]);
            ?>


        </div>
        <div class="col-sm-6">
            <?= Html::hiddenInput('input-type-1', 'Additional value 1', ['id'=>'input-type-1']);?>
            <?= Html::hiddenInput('input-type-2', 'Additional value 2', ['id'=>'input-type-2']);?>
            <?= $form->field($model, 'city_id')->widget(DepDrop::classname(), [
                'type'=>DepDrop::TYPE_SELECT2,
                'options' => [
                    'id' => 'city_id-id', 
                    'placeholder' => 'Select city'
                    ],
                'select2Options' => [
                    'pluginOptions' => ['allowClear'=>true],
                    ],
                'pluginOptions' => [
                    'depends'=>['cat-id'],
                    'url'=>Url::to(['/name/subcat1']),  
                    'params'=>['input-type-1', 'input-type-2']
                    ]
                ]);


            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'fio')->textInput(['maxlength' => true])
                                                ->widget(
                                                    AutoComplete::className(), [
                                                        'clientOptions' => [
                                                            'source' => NamesList::getList(),
                                                            'minLength'=>'2',
                                                        ],
                                                        'options'=>[
                                                            'class'=>'form-control'
                                                        ]
                                                ]);
            ?>
        </div>
    </div>
    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsPhone[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'number',
            //'full_name',
            //'address_line1',
            //'address_line2',
            //'city',
            //'state',
            //'postal_code',
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Phones list
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add phones</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsPhone as $index => $modelPhone): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-phone">Phone: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$modelPhone->isNewRecord) {
                                echo Html::activeHiddenInput($modelPhone, "[{$index}]id");
                            }
                        ?>
                        <?= $form->field($modelPhone, "[{$index}]number")->textInput(['maxlength' => true]) ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($modelPhone->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
