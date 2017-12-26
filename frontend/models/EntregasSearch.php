<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Entregas;

/**
 * EntregasSearch represents the model behind the search form about `frontend\models\Entregas`.
 */
class EntregasSearch extends Entregas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idRev'], 'integer'],
            [['fechaEnvio', 'descripcion', 'ruta', 'archivo', 'observacion'], 'safe'],
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
    public function search($params, $id)
    {
        $query = Entregas::find();
        $entregables = Entregables::findOne($id);

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
            'idRev' => $this->idRev,
            'fechaEnvio' => $this->fechaEnvio,
            'idEntregable' => (empty($entregables->id)) ? $this->idEntregable : $entregables->id,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'ruta', $this->ruta])
            ->andFilterWhere(['like', 'archivo', $this->archivo])
            ->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
