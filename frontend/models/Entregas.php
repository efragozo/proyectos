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
            [['idRev'], 'integer'],
            [['fechaEnvio'], 'safe'],
            [['descripcion', 'observacion'], 'string'],
            [['ruta'], 'string', 'max' => 500],
            [['archivo'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idRev' => 'Id Rev',
            'fechaEnvio' => 'Fecha Envio',
            'descripcion' => 'Descripcion',
            'ruta' => 'Ruta',
            'archivo' => 'Archivo',
            'observacion' => 'Observacion',
        ];
    }
}
