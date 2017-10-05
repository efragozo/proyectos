<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tareas".
 *
 * @property integer $id
 * @property integer $usuario
 * @property string $fecha
 * @property string $descripcion
 * @property string $totoalHoras
 */
class Tareas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tareas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario'], 'integer'],
            [['fecha'], 'safe'],
            [['descripcion'], 'string'],
            [['totalHoras'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'fecha' => 'Fecha',
            'descripcion' => 'Descripcion',
            'totalHoras' => 'Total Horas',
        ];
    }
}
