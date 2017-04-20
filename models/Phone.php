<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phone".
 *
 * @property integer $id
 * @property integer $name_id
 * @property string $number
 *
 * @property Name $name
 */
class Phone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_id'], 'integer'],
            [['number'], 'required'],
            [['number'], 'string', 'max' => 255],
            [['name_id'], 'exist', 'skipOnError' => true, 'targetClass' => Name::className(), 'targetAttribute' => ['name_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_id' => 'Name',
            'number' => 'Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getName()
    {
        return $this->hasOne(Name::className(), ['id' => 'name_id']);
    }
}
