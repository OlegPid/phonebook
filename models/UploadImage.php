<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;


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

    /**
     * @param $oldFileName
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $path  = Yii::getAlias('@app') . '/web/tmp_avatars/';
            $fileName = uniqid('', true) . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($path.$fileName);
            $img = Image::getImagine()->open($path.$fileName);
            //$img->thumbnail(new Box(300,300), ImageInterface::THUMBNAIL_OUTBOUND, false)
            $img->thumbnail(new Box(300,300))
                ->save($path.$fileName, ['quality' => 75]);
            $this->img =$fileName;
            $this->imageFile = $path.$fileName;
            return true;
        } else {
            return false;
        }        
    }

    /**
     *
     */
    public function getImg()
    {
        $path  = Yii::getAlias('@app').'/web/avatars/';
        if (!empty($this->img) && file_exists($path.$this->img)){
            return '/avatars/'.$this->img;
        }
        return '/avatars/no_img.jpg';
    }
}