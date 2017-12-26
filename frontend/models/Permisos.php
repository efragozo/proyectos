<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "permisos".
 *
 * @property integer $id
 * @property integer $idusuario
 * @property integer $rol
 */
class Permisos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permisos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idusuario', 'rol'], 'integer'],
            [['idusuario'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idusuario' => 'Idusuario',
            'rol' => 'Rol',
        ];
    }
}
