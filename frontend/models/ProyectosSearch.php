<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Proyectos;

/**
 * ProyectosSearch represents the model behind the search form about `frontend\models\Proyectos`.
 */
class ProyectosSearch extends Proyectos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idCliente', 'tipoProyecto', 'ccof', 'imprcronograma', 'cronograma', 'entregables', 'finalizado'], 'integer'],
            [['nombreProyecto', 'fechaCreado', 'fechaFinInterna', 'fechaFin', 'centroCosto', 'fechaSolic', 'rehabilitado'], 'safe'],
            [['costo'], 'number'],
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
        $query = Proyectos::find();

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
            'idCliente' => $this->idCliente,
            'fechaCreado' => $this->fechaCreado,
            'fechaFinInterna' => $this->fechaFinInterna,
            'fechaFin' => $this->fechaFin,
            'tipoProyecto' => $this->tipoProyecto,
            'costo' => $this->costo,
            'ccof' => $this->ccof,
            'imprcronograma' => $this->imprcronograma,
            'cronograma' => $this->cronograma,
            'entregables' => $this->entregables,
            'finalizado' => $this->finalizado,
            'fechaSolic' => $this->fechaSolic,
            'rehabilitado' => $this->rehabilitado,
        ]);

        $query->andFilterWhere(['like', 'nombreProyecto', $this->nombreProyecto])
            ->andFilterWhere(['like', 'centroCosto', $this->centroCosto]);

        return $dataProvider;
    }
}
