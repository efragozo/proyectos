<?php
use yii\helpers\Html;
use frontend\models\Permisos;
use frontend\models\Proyectos;
use frontend\models\Tiposproyectos;
use frontend\models\Tipousuario;
use frontend\models\Entregables;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

<!-- <img src=" $directoryAsset /img/logoisesproy.png" class="img-circle" alt="User Image"/> Yii::$app->name -->
    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg img-circle">' .'<img src="/advanced/frontend/web/images/logoisesproy.png' .
                '" width="15%"/></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

<!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">

         <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
		 </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <?php if (!Yii::$app->user->isGuest){
                    /* Traemos los permisos para identificar si mostramos los proyectos o no */
                    $usuarioid = Yii::$app->user->identity->id;
                    $rol = Permisos::find()->select('rol')->where(['idusuario' => $usuarioid]) ->one()->rol;
                    if ($rol<=3){      
                ?>
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-briefcase"></i>
                        <span class="label label-success">
                        <?php  
                        /*Hacems un conteo de todos los proyectos abiertos y mostramos el numero de proyectos
                         * en la etiqueta
                         * */
                        if (!Yii::$app->user->isGuest){
                            $datoscontados =  count(Proyectos::find()->where(['finalizado'=>'0'])->all());
                            print_r($datoscontados);
                        }
                        ?>
                        </span>
                    </a>
                    <!-- mostramos la cantidad de proyectos abiertos -->
                    <ul class="dropdown-menu">
                       <li class="header">Tienes                    
                        <?php  if (!Yii::$app->user->isGuest){
                            //$datoscontados =  count(Proyectos::find()->all());        	                   	           
                            print_r(' '.$datoscontados.' proyectos abiertos');                        
                        ?>
                       </li>
                         <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                              <?php
                              /*Traemos todos los proyectos creados y que se encuentran abiertos para mostrarle al usuario
                               * que tiene pendiente por terminar esos proyectos
                               * */
                              $dataTproy = Proyectos::find()->where(['finalizado'=>'0'])->all();
                                foreach ($dataTproy as $rows) {                                           
                                        
                                ?>
                                <li><!-- start message -->
                                <!-- creamos la url a la vista donde se mostrará el proyecto seleccionado -->  
                                    <a <?php echo "href='" ?>
                                       <?= 
                                             Yii::$app->urlManager->createAbsoluteUrl(['proyectos/view?id='.$rows['id']])
                                        ?>
                                        <?php echo "'" ?> >
                                        <!-- asignamos el logo a cada registro encontrado --> 
                                        <div class="pull-left">                                                                              
                                            	<img src="/advanced/frontend/web/images/logoisesproy.png" class="img-circle"
                                             alt="User Image"/>
                                        </div>
                                            <!-- traemos del foreach el nombre del proyecto -->
                                            <h4>
                                             	<?php print_r($rows['nombreProyecto'])?>
                                            </h4>
                                         <!-- traemos del foreach la fecha en que se creo el proyecto -->
                                        <p><small><i class="fa fa-clock-o">
                                        <?php print_r($rows['fechaCreado'])?>
                                        </i></small></p>
                                    </a>
                                </li>
                                <?php }?><!-- Finaliza la llave que muestar los proyectos abiertos  -->
                                <!-- end message -->                                
                                
                            </ul>
                        </li>
                        <!-- creamos la url para que al dar ver todos se muestren todos los proyectos -->
                        <li class="footer"><a <?php echo "href='" ?>
                                        <?= 
                                            Yii::$app->urlManager->createAbsoluteUrl(['/proyectos'])
                                        ?>
                                        <?php echo "'>" ?>Ver todos</a></li>
                        <!-- cerramos la llave del if en donde validamos si el usuario esta logueado -->
                    	<?php 
                        }
                        ?> 
                        </ul>
                    
                    <!-- -->
                </li>
                <?php 
                        }
                }
                ?> 
                <?php
                //Verificamos que el usuario no sea invitado
                if (!Yii::$app->user->isGuest){
                          
                ?>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">
                        <?php  
                        /*Hacemos un conteo de todos los proyectos abiertos y mostramos el numero de proyectos
                         * en la etiqueta
                         * */
                               
                            $usuario = Yii::$app->user->identity->username;
                            $contaEntregables =  count(Entregables::find()->where(['estado' => '0']) -> andWhere(['usuario' => $usuario]) ->all());
                            print_r($contaEntregables);                      
                           
                        ?>                        
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">	You have 
                             				<?= $contaEntregables ?>
                        					notifications
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                               <?php                               
                              /*Traemos todas las tareas o entregables creados y que se encuentran asignados al usuario logueado
                               * para que pueda hacer la entrega de ellas.
                               * */
                               $dataEntregables = Entregables::find()->where(['estado' => '0']) -> andWhere(['usuario' => $usuario]) ->all();
                               foreach ($dataEntregables as $rows) {                                           
                                        
                                ?>
                                <li>
                                    <!-- creamos la url a la vista donde se mostrará el proyecto seleccionado -->  
                                    <a <?php echo "href='" ?>
                                       <?= 
                                             Yii::$app->urlManager->createAbsoluteUrl(['entregables/view?id='.$rows['id']])
                                        ?>
                                        <?php echo "'>" ?>
                                        
                                        <i class="fa fa-warning text-yellow"></i> 
                                        <!-- traemos del foreach el nombre del proyecto -->                                            
                                             	<?php print_r($rows['nombre'])?>
                                            
                                    </a>
                                </li>
                                                                
                                 <?php }?><!-- Finaliza la llave que muestar los entregables abiertos  -->
                            </ul>
                         </li>
                       <li class="footer"><a href="#">View all</a></li>
                       <!-- cerramos la llave del if en donde validamos si el usuario esta logueado -->
                       <?php                     
                                
                        }
                        ?> 
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <?php
                //Verificamos qu eel usuario no sea invitado
                if (!Yii::$app->user->isGuest){
                          
                    $usuario = Yii::$app->user->identity->username;
                    $contaEntregables =  count(Entregables::find()->where(['estado' => '1']) -> 
                        andWhere(['revisor' => $usuario]) -> andWhere(['vistoIni' => '0'])->all());
                    
                ?>
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger"><?php print_r($contaEntregables); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <?= $contaEntregables ?> tasks for check</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                            <?php                               
                              /*Traemos todas las tareas o entregables creados y que se encuentran asignados al usuario logueado
                               * para que pueda hacer la entrega de ellas.
                               * */
                            $dataEntregables = Entregables::find()->where(['estado' => '1']) ->
                                               andWhere(['revisor' => $usuario]) -> andWhere(['vistoIni' => '0'])->all();
                               foreach ($dataEntregables as $rows) {                                           
                                        
                                ?>
                                <li><!-- Task item -->
                                    <!-- creamos la url a la vista donde se mostrará el proyecto seleccionado -->  
                                    <a <?php echo "href='" ?>
                                       <?= 
                                             Yii::$app->urlManager->createAbsoluteUrl(['entregables/view?id='.$rows['id']])
                                        ?>
                                        <?php echo "'>" ?>
                                        
                                        <i class="fa fa-warning text-red"></i> 
                                        <!-- traemos del foreach el nombre del proyecto -->                                            
                                             	<?php print_r($rows['nombre'])?>
                                            
                                    </a>
                                </li>
                                <?php }?><!-- Finaliza la llave que muestar los entregables abiertos  -->
                                <!-- end task item -->
                                
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                         <?php                     
                                
                        }
                        ?> 
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/advanced/frontend/web/images/user.gif" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
                        <!-- mostramos el nombre del usuario cuando se loguea -->
                             <?php 
                                if(!Yii::$app->user->isGuest){
                                    print_r( Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->last_name);
                                }
                                ?>                            
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/advanced/frontend/web/images/avatar04.png" class="img-circle"
                                 alt="User Image"/>
                            <p>
                               <?php                                
                              /*traemos la descripción del tipo de usuario logueado dependiendo del rol usando el id del tipo de usuario,
                               * se compara con el id de la tabla tipousuario y muestra la descripción*/
                                if(!Yii::$app->user->isGuest){
                                    $idUser=Yii::$app->user->identity->tipoUsuario;
                                    $tipoUser = Tipousuario::find()->select('descripcion')->where(['id'=>$idUser])->one()->descripcion;
                                    print_r( Yii::$app->user->identity->username); 
                                    echo '<small>';
                                    print_r($tipoUser);
                                    echo '</small>';
                                }
                                ?>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!--  <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div> -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#">
                                <!-- Agregamos funcionalidad al boton ferfil  -->
                                <?= Html::a(
                                    'Perfil',
                                    ['/signup'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                    )                                
                                ?>
                                </a>
                            </div>
                            <div class="pull-right">
                            <!-- Agregamos funcionalidad al boton sign out, enviamos a desloguearse  -->
                                <?= Html::a(
                                    'Sign out',
                                    ['/salida'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
