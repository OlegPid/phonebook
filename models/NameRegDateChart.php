<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * NameSearch represents the model behind the search form about `app\models\Name`.
 */
class NameRegDateChart extends Name
{
    public $from_date;
    public $to_date;
    public $detailing;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_date', 'to_date', ], 'date', 'format' => 'dd-MM-yyyy'],
            [['detailing'], 'string'],
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
    public function getDataRegistrationDateChart($params)
    {
        $dataMain = [];
        $labels = [];
        $data = [];
        $backgroundColor = [];
        $borderColor = [];
        $datasets = [];




        $query = Name::find();
        switch ($params->detailing) {
            case 'day':
                $query = $query->select(['COUNT(*) AS cnt', "FROM_UNIXTIME(created_at, '%d-%m-%Y') AS dt"]);
                break;
            case 'week':
                $query = $query->select(['COUNT(*) AS cnt', "FROM_UNIXTIME(created_at, '%v-%x') AS dt"]);
                break;
            case 'month':
                $query = $query->select(['COUNT(*) AS cnt', "FROM_UNIXTIME(created_at, '%m-%Y') AS dt"]);
                break;
            case 'year':
                $query = $query->select(['COUNT(*) AS cnt', "FROM_UNIXTIME(created_at, '%Y') AS dt"]);
                break;
        }
        $from = new \DateTime($params->from_date);
        $to = new \DateTime($params->to_date);
        $query = $query->groupBy(['dt'])
            ->orderBy('created_at')
            ->where(['between', 'created_at', $from->getTimestamp(), $to->getTimestamp()])
            ->asArray()
            ->all();
        foreach ($query as $dat){
            $labels[] = $dat['dt'];
            $data[] = $dat['cnt'];
            $color = 'rgba('. rand(0, 255).', '. rand(0, 255).', '. rand(0, 255).', ';
            $backgroundColor[] = $color.'0.2)';
            $borderColor[] = $color.'1)';
        }
        $dataMain['labels'] = $labels;
        $datasets['label'] = ' of Votes';
        $datasets['data'] = $data;
        $datasets['backgroundColor'] = $backgroundColor;
        $datasets['borderColor'] = $borderColor;
        $datasets['borderWidth'] = 1;
        $dataMain['datasets'] = $datasets;
        return $dataMain;


    }
    public static function getDetailingList()
    {
        return [
            'day' => 'день',
            'week' => 'неделя',
            'month' => 'месяц',
            'year' => 'год',
        ];
    }
}
