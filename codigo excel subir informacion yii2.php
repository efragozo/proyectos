  public function actionMasiva()
    {
    
        if (Yii::$app->request->post()) {           
//             $post = Yii::$app->request->post('quincenaNomina');
//             print_r($post);
//             exit();                    
            $excel = \yii\web\UploadedFile::getInstanceByName('excel');    
            
//             print_r($excel);
//             exit();
            
            /*
             * quincenaNomina es el periodo que viene seleccionado por el formulario
             * este representa el formarto YYYY-mm-dd
             */
            
            if (! is_null($excel)) {
                 $ruta = Yii::getAlias('@root') . '/common/uploads/liquidacion/';
               
                $excel->name = 'liquidacion' . '.' . $excel->extension;
                $excel->saveAs($ruta . $excel);
                $this->liquidacionMasiva($excel->name);
            }
        }
        
        return $this->render('masiva');
    }

    private function liquidacionMasiva($archivoExcel)
    {
        /* Establecemos el archivo excel que se aloja en la siguiente direccion */
        $inputFile = Yii::getAlias('@root') . '/common/uploads/liquidacion/' . $archivoExcel;
        /*
         * Tambien establecemos un array donde se guardaran todos los errores encontrados
         * primero se hara esta validacion, cuando todo estè bien, se guardara la prenomina
         */

        $erroresEncontrados = array();

        /*
         * Se usaran las librerias de PHPExcel para habilitar funcionalidades con la aplicacion y con archivos excel
         * para ello se establece la identificacion del archivo, mediante el identity, con el proceso del try catch
         * Se procede a establecer el archivo de modo lectura con createReader
         * Y por ultimo el archivo se establece como objeto
         */
        try {
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objectReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objectPHPExcel = $objectReader->load($inputFile);
        } catch (Exception $e) {
            die('error');
        }
        
        /*
         * La plantilla de excel tiene varias hojas, primero validaremos los dias trabajados
         * buscados por documentos , esta hoja es Tabla Novedades
         */
        $hojaNovedades = $objectPHPExcel->getSheet(0);
        $highestRow = $hojaNovedades->getHighestRow();
        $highestColumn = $hojaNovedades->getHighestColumn(); 
      
      /* PRIMERO SE VALIDA LA INFORMACION DEL EXCEL */
        for ($row = 2; $row <= $highestRow; $row ++) {
            $rowData = $hojaNovedades->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, true, FALSE);

                 
                     $nuevoEmpleado = new Empleado();
                     $nuevoEmpleado->tipo_documento = Yii::$app->sifo->findTypeId($rowData[0][0])['id'];
                     $nuevoEmpleado->numero_documento = $rowData[0][1];
                     $nuevoEmpleado->activo = ($rowData[0][2] == "SÍ") ? 1 : 0;
                     $nuevoEmpleado->primer_nombre = $rowData[0][3];
                     $nuevoEmpleado->segundo_nombre = $rowData[0][4];
                     $nuevoEmpleado->primer_apellido = $rowData[0][5];
                     $nuevoEmpleado->segundo_apellido = $rowData[0][6];
                     $nuevoEmpleado->fecha_nacimiento = $rowData[0][7];
                     $nuevoEmpleado->sexo = $rowData[0][8];
                     $nuevoEmpleado->nivel_estudios = $rowData[0][10];
                     $nuevoEmpleado->ciudad = $rowData[0][14];
                     $nuevoEmpleado->departamento = $rowData[0][16];
                     $nuevoEmpleado->pais = $rowData[0][15];
                     $nuevoEmpleado->domicilio = $rowData[0][17];
                     $nuevoEmpleado->telefono = $rowData[0][18];
                     $nuevoEmpleado->celular_1 = $rowData[0][19];
                     $nuevoEmpleado->celular_2 = $rowData[0][20];
                     $nuevoEmpleado->entidad_prestadora_salud = $rowData[0][21];
                     $nuevoEmpleado->administrador_fondo_pension = $rowData[0][22];
                     $nuevoEmpleado->administrador_riesgo_profesional = $rowData[0][23];
                     $nuevoEmpleado->caja_compensacion = $rowData[0][24];
                     $nuevoEmpleado->cargo_id = Yii::$app->sifo->findJobId($rowData[0][25])['id'];
                     $nuevoEmpleado->validate();


                     array_push($erroresEncontrados, $nuevoEmpleado->getErrors());

        }

       
            if(count($erroresEncontrados) == 0){
            for($row = 2;$row <= $highestRow; $row++){
                    $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,true,FALSE);  
                     $nuevoEmpleado = new Empleado();
                     $nuevoEmpleado->tipo_documento = Yii::$app->sifo->findTypeId($rowData[0][0])['id'];
                     $nuevoEmpleado->numero_documento = $rowData[0][1];
                     $nuevoEmpleado->activo = ($rowData[0][2] == "SÍ") ? 1 : 0;
                     $nuevoEmpleado->primer_nombre = $rowData[0][3];
                     $nuevoEmpleado->segundo_nombre = $rowData[0][4];
                     $nuevoEmpleado->primer_apellido = $rowData[0][5];
                     $nuevoEmpleado->segundo_apellido = $rowData[0][6];
                     $nuevoEmpleado->fecha_nacimiento = $rowData[0][7];
                     $nuevoEmpleado->sexo = $rowData[0][8];
                     $nuevoEmpleado->nivel_estudios = $rowData[0][10];
                     $nuevoEmpleado->ciudad = $rowData[0][14];
                     $nuevoEmpleado->departamento = $rowData[0][16];
                     $nuevoEmpleado->pais = $rowData[0][15];
                     $nuevoEmpleado->domicilio = $rowData[0][17];
                     $nuevoEmpleado->telefono = $rowData[0][18];
                     $nuevoEmpleado->celular_1 = $rowData[0][19];
                     $nuevoEmpleado->celular_2 = $rowData[0][20];
                     $nuevoEmpleado->entidad_prestadora_salud = $rowData[0][21];
                     $nuevoEmpleado->administrador_fondo_pension = $rowData[0][22];
                     $nuevoEmpleado->administrador_riesgo_profesional = $rowData[0][23];
                     $nuevoEmpleado->caja_compensacion = $rowData[0][24];
                     $nuevoEmpleado->cargo_id = Yii::$app->sifo->findJobId($rowData[0][25])['id'];
                     $nuevoEmpleado->save();
                     Yii::$app->session->setFlash("success", "Se ha completado la operacion exitosamente");
                     
            
            }
        }


      }
      
             