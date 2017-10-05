<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ModalidadProy;

/**
 * ModalidadProySearch represents the model behind the search form about `frontend\models\ModalidadProy`.
 */
class ModalidadProySearch extends ModalidadProy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ccof'], 'integer'],
            [['modalidad'], 'safe'],
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
        $query = ModalidadProy::find();

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
            'ccof' => $this->ccof,
        ]);

        $query->andFilterWhere(['like', 'modalidad', $this->modalidad]);

        return $dataProvider;
    }
}
