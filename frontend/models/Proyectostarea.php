<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "proyectostarea".
 *
 * @property integer $id
 * @property integer $idTarea
 * @property integer $idProyecto
 * @property string $horas
 */
class Proyectostarea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyectostarea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTarea', 'idProyecto'], 'integer'],
            [['horas'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idTarea' => 'Id Tarea',
            'idProyecto' => 'Id Proyecto',
            'horas' => 'Horas',
        ];
    }
}
