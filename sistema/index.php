<?php
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html>
    
	<?php include("templates/head_main.php"); ?>
    
	<body style="overflow: hidden;">
        <header>
            <div class="menu">
                <span class="lnr lnr-menu men"></span>
                <p class="derecha"> <b><p id="hora" class="derecha"></p></b></p>
            </div>
        </header>
<?php include("templates/sidebar.php"); ?>
       

            <div class="contenedor">
                <div class="content">

                    
					<a href="productos.php" style="text-decoration:none; color:#000;">
                        <div class="opciones">
                            <div id="triangle-topleft"></div><style> #triangle-topleft {width:0; height:0; border-top:100px solid #fde45e; border-right:100px solid transparent;} </style>
                            <div class="opcion">
                                <span class="lnr lnr-tag pro"></span>
                               <a href="productos.php" style="text-decoration:none; color:#000;"> <h2>Productos</h2></a>
                            </div>

                        </div>
					</a>
					<a href="perfil.php" style="text-decoration:none; color:#000;">
                        <div class="opciones">
                            <div id="triangle-topleft"></div><style> #triangle-topleft {width:0; height:0; border-top:100px solid #fde45e; border-right:100px solid transparent;} </style>
                            <div class="opcion">
                                <span class="lnr lnr-user cong"></span>
                               <a href="perfil.php" style="text-decoration:none; color:#000;"> <h2>Perfil</h2></a>
                            </div>

                        </div>
						</a>
						<a href="pruebas.php" style="text-decoration:none; color:#000;">
                        <div class="opciones">
                            <div id="triangle-topleft"></div><style> #triangle-topleft {width:0; height:0; border-top:100px solid #fde45e; border-right:100px solid transparent;} </style>
                            <div class="opcion">
                                <span class="lnr lnr-book pro"></span>
                               <a href="pruebas.php" style="text-decoration:none; color:#000;"> <h2>Pruebas</h2></a>
                            </div>

                        </div>
					</a>
					<a href="imagen.php" style="text-decoration:none; color:#000;">
                        <div class="opciones">
                            <div id="triangle-topleft"></div><style> #triangle-topleft {width:0; height:0; border-top:100px solid #fde45e; border-right:100px solid transparent;} </style>
                            <div class="opcion">
                                <span class="lnr lnr-upload info"></span>
                                <a href="imagen.php" style="text-decoration:none; color:#000;"><h2>Subir Imagen</h2> </a>
                            </div>

                        </div>
					</a>
                </div>
            </div>

        <script src="../js/abrir.js"></script>
        <script>
        
            $('document').ready(function(){
                function hora(){
                    $.ajax({
                    type: 'GET',
                    url: 'hora.php',
                    success: function($hora){
                        $('#hora').html($hora);
                        setTimeout(hora(),1000);
                    }
                });

                }
                setTimeout(hora(),1000);
            });
        
        </script>
    </body>
</html>