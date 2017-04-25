<?php

namespace app\models;

use Yii;
use \yii\helpers\ArrayHelper;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property string $name
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNames()
    {
        return $this->hasMany(Name::className(), ['city_id' => 'id']);
    }    

    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }    

    public function getCountryName()
    {
        return $this->country->name;
    }
    
    public static function getCitiesList()
    {
        $cities = City::find()
            ->select(['id', 'name'])
            ->all();
         return ArrayHelper::map($cities, 'id', 'name');
    }

    public static function getCitiesListForCountry($id, $param1, $param2)
    {
        $cities = City::find()
            ->where(['country_id' => $id])
            ->select(['id', 'name'])
            ->asArray()
            ->all();
        return $cities;
    }


    //public static function getCitiesShortList()

    /*public static function getCitiesList()
    {
        $cities = City::find()->joinWith('names')//->where(['city_id', 'id'])
            ->select(['city.id', 'city.name', 'name.city_id'])
            ->all();
         return ArrayHelper::map($cities, 'id', 'name');
    }*/
}
