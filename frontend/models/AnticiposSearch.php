<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Anticipos;

/**
 * AnticiposSearch represents the model behind the search form about `frontend\models\Anticipos`.
 */
class AnticiposSearch extends Anticipos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idProyecto', 'usuario', 'tipo', 'soporte', 'valor', 'solant', 'leg'], 'integer'],
            [['fecha', 'motivo', 'fechaRecibo', 'fechaLeg'], 'safe'],
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
        $query = Anticipos::find();

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
            'idProyecto' => $this->idProyecto,
            'usuario' => $this->usuario,
            'fecha' => $this->fecha,
            'tipo' => $this->tipo,
            'soporte' => $this->soporte,
            'valor' => $this->valor,
            'solant' => $this->solant,
            'fechaRecibo' => $this->fechaRecibo,
            'fechaLeg' => $this->fechaLeg,
            'leg' => $this->leg,
        ]);

        $query->andFilterWhere(['like', 'motivo', $this->motivo]);

        return $dataProvider;
    }
}
