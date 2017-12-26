<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Entregables;

/**
 * EntregablesSearch represents the model behind the search form about `frontend\models\Entregables`.
 */
class EntregablesSearch extends Entregables
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idProyecto',  'tiempoRevision', 'estado', 'vistoIni', 'visto', 'cfechaRev', 'cfechaUsu', 'cambioRev'], 'integer'],
            [['codigo', 'nombre', 'categoria', 'usuario', 'revisor', 'fechaInicio', 'fechaEntrega'], 'safe'],
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
        $query = Entregables::find();
        $proyecto = Proyectos::findOne($id);
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
            'idProyecto' => (empty($proyecto->id)) ? $this->idProyecto : $proyecto->id,
            'usuario' => $this->usuario,
            'revisor' => $this->revisor,
            'fechaInicio' => $this->fechaInicio,
            'fechaEntrega' => $this->fechaEntrega,
            'tiempoRevision' => $this->tiempoRevision,
            'estado' =>(empty($proyecto->id)) ? $this->estado : 0,
            'vistoIni' => $this->vistoIni,
            'visto' => $this->visto,
            'cfechaRev' => $this->cfechaRev,
            'cfechaUsu' => $this->cfechaUsu,
            'cambioRev' => $this->cambioRev,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'categoria', $this->categoria]);

        return $dataProvider;
    }
}
