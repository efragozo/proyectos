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
    public $excel;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'entregables';
    }

    /**
     * @inheritdoc
     * 
     * En el codigo siguiente treamos las reglas de cada campo
     */
    public function rules()
    {
        return [
            [['idProyecto'], 'required',  'message' => 'Este campo es requerido'],
            [['idProyecto', 'tiempoRevision', 'estado', 'vistoIni', 'visto', 'cfechaUsu', 'cambioRev'], 'integer'],
            [['cfechaRev'], 'safe'],
//            [['fechaInicio'], 'required',  'message' => 'Este campo es requerido'],
//            [['fechaEntrega'], 'required',  'message' => 'Este campo es requerido'],
            [['fechaInicio', 'fechaEntrega'], 'safe'],
            [['usuario'], 'required',  'message' => 'Este campo es requerido'],
            [['usuario'], 'string', 'max' => 255],   
            [['revisor'], 'required',  'message' => 'Este campo es requerido'],
            [['revisor'], 'string', 'max' => 255],
            [['codigo'], 'required',  'message' => 'Este campo es requerido'],
            [['codigo'], 'string', 'max' => 80],
            [['nombre'], 'required',  'message' => 'Este campo es requerido'],
            [['nombre'], 'string', 'max' => 500],
            [['categoria'], 'required',  'message' => 'Este campo es requerido'],
            [['categoria'], 'string', 'max' => 210],
        ];
    }

    /**
     * @inheritdoc
     * 
     * Con esta funcion definimos los labels que tendran los campos
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idProyecto' => 'Proyecto',
            'codigo' => 'Código',
            'nombre' => 'Nombre',
            'categoria' => 'Categoría',
            'usuario' => 'Usuario',
            'revisor' => 'Revisor',
            'fechaInicio' => 'Fecha de Inicio',
            'fechaEntrega' => 'Fecha de Entrega',
            'tiempoRevision' => 'Tiempo Revisión',
            'estado' => 'Estado',
            'vistoIni' => 'Visto Ini',
            'visto' => 'Visto',
            'cfechaRev' => 'Cfecha Rev',
            'cfechaUsu' => 'Cfecha Usu',
            'cambioRev' => 'Cambio Rev',
        ];
    }
    /*con esta funcion permitimos finalizar la tarea entregable */
    public function resultarea($tarea, $revisor)
    {
        if ($tarea == 0 and $revisor == 1){
            return (1);
        }
        else {
                return (0);
            }
        }
    /*Con esta funcion retornamos si la fecha de entrega esta vencida o vigente*/
    public function comparefecha($dato1,$fecha1, $fecha2)
    {
       if ($dato1==0){
           if ($fecha1 < $fecha2){
               /*redondeamos a dos decimales+ y da en dias gracias a dividirlo entre 86400 que son los segundos de un dia*/
               $conteo= round((($fecha1 - $fecha2)/86400),2);
               return ('<font color="red">Su tiempo de entrega está vencido '.$conteo.' días'.'</font>');
           }else {
               /*redondeamos a dos decimales+ y da en dias gracias a dividirlo entre 86400 que son los segundos de un dia*/
               $conteo= round((($fecha1 - $fecha2)/86400),2);//redondeamos a dos decimales
               return ('<font color="green">Su tiempo de entrega está vigente '.$conteo.' días'.'</font>');
           }
       }
    }
    /*Creamos una funcion para reemplazar el codigo 1 o 0 por una palabra, nos dir� si el proyecto esta activo o finalizado
     * */
    public function entregaFinalizada($data)
    {
        if ($data==1)
        {
            return ('Finalizado');
        }
        else {
            return ('Activo');
        }
    }
    /*Fin de la funci�n*/
}
