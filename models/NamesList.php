<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "names_list".
 *
 * @property integer $id
 * @property string $name
 */
class NamesList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'names_list';
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
    public static function getList()
    {
        return NamesList::find()
            ->select(['name as value', 'name as label'])
            ->asArray()
            ->all();
    }      
}
