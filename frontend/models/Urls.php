<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "urls".
 *
 * @property integer $id
 * @property integer $proyecto
 * @property string $urlproyecto
 * @property string $urlcronogrma
 */
class Urls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'urls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['proyecto'], 'integer'],
            [['proyecto'], 'required', 'message' => 'Este campo es requerido'],
            [['urlproyecto', 'urlcronogrma'], 'string', 'max' => 256],
            [['urlproyecto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'mpp, pdf'],
            [['urlproyecto'],'file'],
        ];
    }

     /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'proyecto' => 'Proyecto',
            'urlproyecto' => 'Urlproyecto',
            'urlcronogrma' => 'Urlcronogrma',
        ];
    }
    //Funcion para guardar archivos en una carpeta especifica
    public function upload(){
        if ($this->validate()) {
            $this->urlproyecto->saveAs('/web/uploads/' . $this->urlproyecto->baseName . '.' . $this->urlproyecto->extension);
            return true;
            } else {
            return false;
        }
    }
    
}
