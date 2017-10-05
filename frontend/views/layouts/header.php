<?php
use yii\helpers\Html;
use frontend\models\Proyectos;
use frontend\models\Tiposproyectos;
use frontend\models\Tipousuario;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">
<!-- <img src=" $directoryAsset /img/logoisesproy.png" class="img-circle" alt="User Image"/> Yii::$app->name -->
    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg img-circle">' .'<img src="'.$directoryAsset .'/img/logoisesproy.png' . '" width="20%"/></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
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
                                $dataTproy = Proyectos::find()->all();
                                foreach ($dataTproy as $rows) {                                           
                                        
                                ?>
                                <li><!-- start message -->
                                <!-- creamos la url a la vista donde se mostrará el proyecto seleccionado -->  
                                    <a <?php echo "href='" ?>
                                       <?= 
                                             Yii::$app->urlManager->createAbsoluteUrl(['proyectos/view?id='.$rows['id']])
                                        ?>
                                        <?php echo "'>" ?> 
                                        <div class="pull-left">                                                                              
                                            	<img src="<?= $directoryAsset ?>/img/logoisesproy.png" class="img-circle"
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
                                <?php }?>
                                <!-- end message -->                                
                                
                            </ul>
                        </li>
                        <!-- creamos la url par que al dar ver todos se muestren todos los proyectos -->
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
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                        not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                         </li>
                       <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user.gif" class="user-image" alt="User Image"/>
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
                            <img src="<?= $directoryAsset ?>/img/avatar04.png" class="img-circle"
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
                         <!-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>-->
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
