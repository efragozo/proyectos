<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "entregas".
 *
 * @property integer $id
 * @property integer $idRev
 * @property string $fechaEnvio
 * @property string $descripcion
 * @property string $ruta
 * @property string $archivo
 * @property string $observacion
 */
class Entregas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entregas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idRev'], 'string'],
            [['idEntregable'], 'integer'],
            [['fechaEnvio'], 'safe'],
            [['descripcion', 'observacion'], 'string'],
            [['descripcion'],'required',  'message' => 'Este campo es requerido'],
            [['ruta'], 'string', 'max' => 500],
            [['ruta'],'required',  'message' => 'Este campo es requerido'],
            [['archivo'], 'string', 'max' => 300],
            [['archivo'],'required',  'message' => 'Este campo es requerido'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idRev' => 'Revisor',
            'idEntregable' => 'Entregable',
            'fechaEnvio' => 'Fecha Envío',
            'descripcion' => 'Descripción',
            'ruta' => 'Ruta',
            'archivo' => 'Archivo',
            'observacion' => 'Observación',
        ];
    }
}
