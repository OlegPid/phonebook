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
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $path  = Yii::getAlias('@app').'/web/avatars/';
            $tmpPath  = Yii::getAlias('@app').'/web/tmp_avatars/';
            if (!empty($this->img)) {
                $newImg = $this->id.$this->img;
                if (file_exists($tmpPath . $this->img)) {
                    $oldImg = $this->getOldAttribute('img');
                    if ($oldImg) {
                        if (file_exists($path . $oldImg)) {
                            unlink($path . $oldImg);
                        }
                    }
                    if (rename($tmpPath . $this->img, $path . $newImg)) {
                        $this->img = $newImg;
                    }
                }
            } else {
                $oldImg = $this->getOldAttribute('img');
                if ($oldImg) {
                    if (file_exists($path . $oldImg)) {
                        unlink($path . $oldImg);
                    }
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $path  = Yii::getAlias('@app').'/web/avatars/';
            if (!empty($this->img)) {
                if (file_exists($path . $this->img)) {
                    unlink($path . $this->img);
                }
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return string
     */
    public function getCityName()
    {
        return $this->city->name;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return mixed
     */
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

    /**
     * @return string phones list
     */
    public function getPhonesList()
    {
        $phones = $this->phones;
        $s = "";
        foreach ($phones as $key) {
            $s = $s.$key->number.'<br>';
        }
        return $s;
    }

    /**
     * @return array
     */
    public static function getNamesList()
    {
        $names = Name::find()
            ->select(['id', 'fio'])
            ->all();
         return ArrayHelper::map($names, 'id', 'fio');
    }
}
