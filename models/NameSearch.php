<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Name;
use app\models\Phone;
use \yii\helpers\ArrayHelper;

/**
 * NameSearch represents the model behind the search form about `app\models\Name`.
 */
class NameSearch extends Name
{
    public $phone_search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'country_id'], 'integer'],
            [['phone_search', 'fio'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Name::find();//->joinWith(['phones']);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $ids = [];
        if (isset($this->phone_search)) {
            $query_phones = Phone::find()
                ->select(['name_id'])
                ->where(['like', 'number', $this->phone_search])
                ->asArray()
                ->all();
            $ids = ArrayHelper::getColumn($query_phones, 'name_id');
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $ids,//$this->id,
            'city_id' => $this->city_id,
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'fio', $this->fio]);
        //$query->andFilterWhere(['like', 'number', $this->phone_search]);
        return $dataProvider;
    }
}
