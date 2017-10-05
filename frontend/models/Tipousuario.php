<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tipousuario".
 *
 * @property integer $id
 * @property string $descripcion
 */
class Tipousuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipousuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['descripcion'],'required', 'message' => 'Este campo no puede estar vacio'],
            [['descripcion'],'unique','message'=>'esto ya existe']
        ];
    }

//     public function email_existe($attribute, $params)
//    {
//  
//  //Buscar el email en la tabla
//      $table = User::find()->where("email=:email", [":email" => $this->email]);
//  
//  //Si el email existe mostrar el error
//      if ($table->count() == 1)
//      {
//                    $this->addError($attribute, "El correo que has ingresado ya existe en el sistema.");
//      }
//    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }
}
