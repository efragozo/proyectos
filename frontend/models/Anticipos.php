<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "anticipos".
 *
 * @property integer $id
 * @property integer $idProyecto
 * @property integer $usuario
 * @property string $fecha
 * @property integer $tipo
 * @property integer $soporte
 * @property string $motivo
 * @property integer $valor
 * @property integer $solant
 * @property string $fechaRecibo
 * @property string $fechaLeg
 * @property integer $leg
 */
class Anticipos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anticipos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProyecto', 'usuario', 'tipo', 'soporte', 'valor', 'solant', 'leg'], 'integer'],
            [['fecha', 'fechaRecibo', 'fechaLeg'], 'safe'],
            [['motivo'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idProyecto' => 'Id Proyecto',
            'usuario' => 'Usuario',
            'fecha' => 'Fecha',
            'tipo' => 'Tipo',
            'soporte' => 'Soporte',
            'motivo' => 'Motivo',
            'valor' => 'Valor',
            'solant' => 'Solant',
            'fechaRecibo' => 'Fecha Recibo',
            'fechaLeg' => 'Fecha Leg',
            'leg' => 'Leg',
        ];
    }
}
