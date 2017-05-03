<?php

namespace app\models;

use Yii;
use \yii\helpers\ArrayHelper;

/**
 * This is the model class for table "name".
 *
 * @property integer $id
 * @property integer $city_id
 * @property string $fio
 *
 * @property City $city
 * @property Phone[] $phones
 */
class Name extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id'], 'integer'],
            [['fio', 'city_id', 'country_id'], 'required'],
            [['fio', 'img'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            //[['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City',
            'country_id' => 'Country',
            'fio' => 'FIO',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
    
    public function getCityName()
    {
        return $this->city->name;
    }

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    public function getCountryName()
    {
        return $this->country->name;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhones()
    {
        return $this->hasMany(Phone::className(), ['name_id' => 'id']);
    }

    public function getPhonesList()
    {
        $phones = $this->phones;
        $s = "";
        foreach ($phones as $key) {
            $s = $s.$key->number.'<br>';
        }
        return $s;
    }  
    public static function getNamesList()
    {
        $names = Name::find()
            ->select(['id', 'fio'])
            ->all();
         return ArrayHelper::map($names, 'id', 'fio');
    }
    public function uploadAvatar()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs( Yii::getAlias('@app').'/web/avatars/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->img = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile = NULL;
            /*$this->imageFile = Yii::getAlias('@app').'/web/avatars/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;*/
            return true;
        } else {
            return false;
        }
    }
}
