<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "modalidadproy".
 *
 * @property integer $ccof
 * @property string $modalidad
 */
class Modalidadproy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modalidadproy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modalidad'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ccof' => 'Ccof',
            'modalidad' => 'Modalidad',
        ];
    }
}
