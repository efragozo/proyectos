<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "entregables".
 *
 * @property integer $id
 * @property integer $idProyecto
 * @property string $codigo
 * @property string $nombre
 * @property string $categoria
 * @property integer $usuario
 * @property integer $revisor
 * @property string $fechaInicio
 * @property string $fechaEntrega
 * @property integer $tiempoRevision
 * @property integer $estado
 * @property integer $vistoIni
 * @property integer $visto
 * @property integer $cfechaRev
 * @property integer $cfechaUsu
 * @property integer $cambioRev
 */
class Entregables extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entregables';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProyecto', 'usuario', 'revisor', 'tiempoRevision', 'estado', 'vistoIni', 'visto', 'cfechaRev', 'cfechaUsu', 'cambioRev'], 'integer'],
            [['fechaInicio', 'fechaEntrega'], 'safe'],
            [['codigo'], 'string', 'max' => 80],
            [['nombre'], 'string', 'max' => 500],
            [['categoria'], 'string', 'max' => 210],
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
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'categoria' => 'Categoria',
            'usuario' => 'Usuario',
            'revisor' => 'Revisor',
            'fechaInicio' => 'Fecha Inicio',
            'fechaEntrega' => 'Fecha Entrega',
            'tiempoRevision' => 'Tiempo Revision',
            'estado' => 'Estado',
            'vistoIni' => 'Visto Ini',
            'visto' => 'Visto',
            'cfechaRev' => 'Cfecha Rev',
            'cfechaUsu' => 'Cfecha Usu',
            'cambioRev' => 'Cambio Rev',
        ];
    }
}
