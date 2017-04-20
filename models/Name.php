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
            [['fio'], 'required'],
            [['fio'], 'string', 'max' => 255],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
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
    public function getNamesList()
    {
        $names = Name::find()
            ->select(['id', 'fio'])
            ->all();
         return ArrayHelper::map($names, 'id', 'fio');
    }  
}
