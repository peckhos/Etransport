<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tours;

/**
 * ToursSearch represents the model behind the search form of `app\models\Tours`.
 */
class ToursSearch extends Tours
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tour_name', 'tour_duration'], 'safe'],
            [['max_on_tour', 'id'], 'integer'],
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
        $query = Tours::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'max_on_tour' => $this->max_on_tour,
            'tour_duration' => $this->tour_duration,
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'tour_name', $this->tour_name]);

        return $dataProvider;
    }
}
