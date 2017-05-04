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
use yii\web\JsExpression;
/* @var $this yii\web\View */
/* @var $model app\models\Name */
/* @var $form yii\widgets\ActiveForm */

$js = "
$(function(){

    $('#file').change(function(){ // событие выбора файла
        $('#img-form').submit(); // отправка формы
          //$('#file').val('');
    });

    $('#delete').click(function(e){ 
        e.preventDefault();
        var file_name = $('#name-img').val();
        $.ajax({
          url: 'delete-img',
          type: 'post',
          //contentType: false, // важно - убираем форматирование данных по умолчанию
          //processData: false, // важно - убираем преобразование строк по умолчанию
          data: {file_name : file_name},
          dataType: 'json',
          success: function(json){
            if(json){
                //console.log(json['src']);
                $('#avatar').attr('src', '/avatars/no_img.jpg');//+json['src']);
                $('#name-img').val('');
                $('#img-txt').val('');
                $('#file').val('');
                if(json['my_data']){
                    console.log(json['data']);
                }
            }
          }        
        });
    });

  $('#img-form').on('beforeSubmit', function(e){
    e.preventDefault();
    var that = $(this),
    formData = new FormData(that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму (*)
    $.ajax({
      url: that.attr('action'),
      type: that.attr('method'),
      contentType: false, // важно - убираем форматирование данных по умолчанию
      processData: false, // важно - убираем преобразование строк по умолчанию
      data: formData,
      dataType: 'json',
      success: function(json){
        if(json){
            //console.log(json['src']);
            $('#avatar').attr('src', '/tmp_avatars/'+json['src']);
            $('#name-img').val(json['src']);
            $('#img-txt').val(json['src']);
        }
      }
    });
    return false;
  });
});";

$this->registerJs($js);


?>
<div class="img-form">
    <?php $form = ActiveForm::begin(['action' => 'load-img', 'id' => 'img-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'img')->label(false)->hiddenInput(['id' => 'img-txt',]) ?>
        <div class="row">
            <div class="col-sm-6">
                <?= Html::img($model->getImg(),[
                        'alt' => 'Аватар',
                        'id' => 'avatar',
                        'style' => 'border : 2px solid #000000;',
                        'height' => '300px',
                        'width' => '300px'
                        ])
                ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2">
            <label style="height: 34px" class="btn btn-info">
            <?= $form->field($model, 'imageFile')->fileInput(['id' => 'file', 'style' => 'display : none;']) ?></label>
            </div>
   
            <div class="col-sm-1">
                <button class="btn btn-danger" id="delete">Delete</button>
            </div>

        </div>    
        <?php ActiveForm::end(); ?>
</div>
