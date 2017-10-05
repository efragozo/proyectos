<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Urls;

/**
 * UrlsSearch represents the model behind the search form about `frontend\models\Urls`.
 */
class UrlsSearch extends Urls
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'proyecto'], 'integer'],
            [['urlproyecto', 'urlcronogrma'], 'safe'],
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
        $query = Urls::find();

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
            'id' => $this->id,
            'proyecto' => $this->proyecto,
        ]);

        $query->andFilterWhere(['like', 'urlproyecto', $this->urlproyecto])
            ->andFilterWhere(['like', 'urlcronogrma', $this->urlcronogrma]);

        return $dataProvider;
    }
}
