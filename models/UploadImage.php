<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $img;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'imageFile' => 'Load image',
        ];
    }    
    public function upload()
    {
 /*       if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }*/
        if ($this->validate()) {
            $path  = Yii::getAlias('@app').'/web/avatars/' . $this->imageFile->baseName . '.' . $this->imageFile->extension; 
            $this->imageFile->saveAs($path);
            $this->img = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            //$this->img = $path;
            //$this->imageFile = NULL;
            $this->imageFile = $path;
            /*$this->imageFile = Yii::getAlias('@app').'/web/avatars/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;*/
            return true;
        } else {
            return false;
        }        
    }
}