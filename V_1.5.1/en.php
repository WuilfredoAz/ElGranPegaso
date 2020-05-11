<?php
    require_once ("../sistema/config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
    require_once ("../sistema/config/conexion.php");//Contiene funcion que conecta a la base de datos
    $sql = mysqli_query($con,"SELECT * FROM products WHERE clasificacion = 'internacional' ORDER BY nombre_producto ASC");
	$sql_pruebas = mysqli_query($con,"SELECT * FROM pruebas ORDER BY id");
	$sql_perfil = mysqli_query($con,"SELECT * FROM perfil WHERE id_perfil = '1'");
	$row_perfil = mysqli_fetch_array($sql_perfil);
    $sql_tag = mysqli_query($con,"SELECT DISTINCT tag FROM products");

	$user_agent = $_SERVER['HTTP_USER_AGENT'];
    if(isset($_POST['boton'])){
        $nombre= $_POST['nombre'];
        $correo= $_POST['correo'];
        $telefono= $_POST['telefono'];
        $mensaje= $_POST['mensaje'];
        $contenido= "Nombre: " . $nombre . "\nCorreo: ". $correo . "\nTelefono: " . $telefono . "\nMensaje: " . $mensaje;
        $destinatario="ventas@elgranpegaso.com";
        $asunto="Consulta desde pagina web";

        if (!empty($_POST['nombre']) &&
            !empty($_POST['correo']) &&
            !empty($_POST['telefono']) &&
            !empty($_POST['mensaje']))
            {
                mail($destinatario,"Consulta desde pagina web (Ingles)", $contenido);
                $messages[] = "Message sent correctly";
            }
        else
            {
                $errors[] = "Your message has not been sent. Please verify that the fields are not empty";
            }
    }
                $nombre= "";
                $correo= "";
                $telefono= "";
                $mensaje= "";
                $contenido= "";
                $destinatario= "";
                $asunto = "";
?>

<!DOCTYPE <html>
<html lang="en">
    <head>
        <title>The Great Pegasus</title>
        <meta charset="UTF-8">

        <!-- HTML Meta Tags -->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name=”Revisit” content=”15 day”>
        <meta name="description" content="Venezuelan company dedicated to the manufacture of mortars and materials for construction. Wholesale and retail sales throughout the world.">

        <!-- Google / Search Engine Tags -->
        <meta itemprop="name" content="The Great Pegasus">
        <meta itemprop="description" content="Venezuelan company dedicated to the manufacture of mortars and materials for construction. Wholesale and retail sales throughout the world.">
        <meta itemprop="image" content="https://www.elgranpegaso.com/img/Logo-Meta-EN.jpg">

        <!-- Facebook - WhatsApp Meta Tags -->
        <meta property="og:site_name" content="The Great Pegasus" />
        <meta property="og:url" content="https://www.elgranpegaso.com/indexen.php">
        <meta property="og:type" content="website">
        <meta property="og:title" content="The Great Pegasus">
        <meta property="og:description" content="Venezuelan company dedicated to the manufacture of mortars and materials for construction. Wholesale and retail sales throughout the world.">
        <meta property="og:image" itemprop="image" content="https://www.elgranpegaso.com/img/Logo-Meta-EN.jpg">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@<?php echo $row_perfil['twitter'] ?>">
        <meta name="twitter:title" content="The Great Pegasus">
        <meta name="twitter:description" content="Venezuelan company dedicated to the manufacture of mortars and materials for construction. Wholesale and retail sales throughout the world.">
        <meta name="twitter:image" content="https://www.elgranpegaso.com/img/Logo-Meta-EN.jpg">

		<?php if(strpos($user_agent, 'Firefox') !== FALSE){ ?>
		<link rel="stylesheet" href="css/Estilos_f.css">
		<?php }else{ ?>
		<link rel="stylesheet" href="css/Estilos.css">
		<?php } ?>
		<link rel="stylesheet" href="css/fontello.css">
		<link rel="stylesheet" href="css/superslides.css">
        <link rel="stylesheet" href="icon/style.css">
        <link rel="icon" href="assets/Logo.ico">
        <link rel="stylesheet" href="css/animate.min.css">
		<script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/scrollreveal.min.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121195399-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-121195399-1');
        </script>
    </head>
    <body>
        <div id="demo"></div>
        <header class="Header" id="Header_id">
            <div class="Contenedor">
                <div class="Logo">
                    <img src="img/Logo.png" alt="Inversiones El Gran Pegaso">
                </div>
                <nav>
					<input type="checkbox" id="btn-menu">
					<label for="btn-menu" class="icon-menu"></label>
					<ul class="Menu" id="Menu_id">
                        <li class="Menu-Items"><a class="Menu-Link" href="#Inicio">Home</a></li>
                        <li class="Menu-Items"><a class="Menu-Link" href="#Nosotros">About Us</a></li>
                        <li class="Menu-Items"><a class="Menu-Link" href="#Productos">Products</a></li>
                        <li class="Menu-Items"><a class="Menu-Link" href="#Calidad">Quality</a></li>
                        <li class="Menu-Items"><a class="Menu-Link" href="#Contactanos">Contact Us</a></li>
						<li class="Menu-Items"><a class="Menu-Linka" href="/">Versión Español</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <section class="Pagina-1" id="Inicio">
                <div class="Banner">
                    <div id="slides">
                        <ul class="slides-container">
                            <li>
                                <img src="img/1.jpg" alt="Fondo-slider1">
                                <div class="Contenedor-txt ">
                                    <p class="Banner-txt-arriba animated fadeInUp">Investments</p>
                                    <strong class="Banner-Titulo animated fadeInUp Delay-1">The Great Pegasus</strong>
                                    <p class="Banner-txt-abajo animated fadeInUp Delay-1">Construction glue manufacturing </p>
                                </div>
                                <div class="Contenedor-btn">
                                <div class="ventana">
                                </div>
                                    <a class="Btn-Banner call_modal animated fadeIn Delay-1" href="#">See history</a>
                                </div>
                            </li>
                            <li>
                                <section class="Promo-1 Fondo-1">
                                  <div class="Contenedor-SS">
                                    <div class="Lado-Iz">
                                      <p class="Premisa animated fadeInUp">Meet</p>
                                      <h2 class="Titulo-Premisa animated fadeInUp Delay-1">Ultra Pego</h2>
                                      <a class="btn-premisa animated fadeInUp Delay-1" href="#">See datails</a>
                                    </div>
                                    <div class="Lado-Der animated slideInRight Delay-1">
                                    </div>
                                  </div>
                              </section>
                            </li>
                            <li>
                                <section class="Promo-1 Fondo-3">
                                  <div class="Contenedor-SSW">
                                      <p class="Premisa animated fadeInUp">We come to</p>
                                      <h2 class="Titulo-Premisa animated fadeInUp Delay-1">Dominican republic</h2>
                                      <a class="btn-premisa-3 animated fadeInUp Delay-1" href="#Contactanos">Quote your order</a>
                                  </div>
                              </section>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="S-Banner-Conocenos">
                <div class="Contenedor">
                    <div class="Forma">
                        <div class="Rocket">
                            <img src="img/Internacionales.png" alt="International Shipping">
                            <p>International Shipping</p>
                        </div>
                        <div class="Sales">
                            <img src="img/Ventas.png" alt="Wholesale & Retail">
                            <p>Wholesale & Retail</p>
                        </div>
                        <div class="Safe">
                            <img src="img/Seguridad.png" alt="100% Safe">
                            <p>100% Safe</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="Pagina-2" id="Nosotros">
                <div class="Contenedor">
                    <h2 class="animado">About Us</h2>
                    <p class="Conocenos-descripcion animado">
                        We are a company dedicated to the manufacturing and commercialization of products from the building sector since
                        more than 10 years in the country's east and west and other states, contributing also with the best service,
                        innovation and responsability, evironment's conservation, since we are located in Clarines city, Bruzual
                        municipality, in the beautiful Anzoategui state in Venezuela.
                    </p>
                    <div class="Contenedor-detalles">
                        <div class="Mision secuencia">
                            <img class="Img-Detalles" src="img/Mision.png" alt="Mision-imagen">
                            <h3>Mission</h3>
                            <p>
                                Get to know our mision. <br/><br/>
                            </p>
                            <p><a class="Leer-mas call_modal_m" href="#Nosotros">Read more</a></p>
                        </div>
                        <div class="Vision secuencia">
                            <img class="Img-Detalles" src="img/Vision.png" alt="Vision-imagen">
                            <h3>Vision</h3>
                            <p>
                                Get to know our vision. <br/><br/>
                            </p>
                            <p><a class="Leer-mas call_modal_v" href="#Nosotros">View More</a></p>
                        </div>
                        <div class="Fortalezas secuencia">
                            <img class="Img-Detalles" src="img/Fortalezas.png" alt="Fortalezas-Imagen">
                            <h3>Strengths</h3>
                            <p>
                                Know the enterprise strengths.
                            </p>
                            <p><a class="Leer-mas call_modal_f" href="#Nosotros">View More</a></p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="S-Conocenos-Productos">
                <div class="Contenedor">
                    <div class="Forma-Amarilla">
                        <p>
                            Follow us on our social media to keep you from missing any news
                        </p>
                    </div>
                    <div class="Contenedor-Logos-RedesSociales">
                        <a href="https://facebook.com<?php echo $row_perfil['facebook']; ?>" class="Fb-Footer animado"><img src="img/Facebook.png" alt="Facebook"></a>
                        <a href="https://instagram.com/<?php echo $row_perfil['instagram']; ?>" class="Ins-Footer animado-1"><img src="img/Instagram.png" alt="Instagram"></a>
                        <a href="https://twitter.com/<?php echo $row_perfil['twitter']; ?>" class="Tt-Footer animado-2"><img src="img/Twitter.png" alt="Twitter"></a>
                    </div>
                </div>
            </section>
            <section class="Pagina-3" id="Productos">
                <div class="Contenedor">
                    <div class="Contenedor-Filtros">
                        <a class="Filtro btn active" onclick="filterSelection('all')" href="#Productos">#All</a>
                          <?php  while($row=mysqli_fetch_array($sql_tag)){
                                $tag = $row['tag']; ?>
                                <a class="Filtro btn" onclick="filterSelection('<?php echo $tag; ?>')" href="#Productos">#<?php echo $tag; ?></a>
                            <?php } ?>
                    </div>
                    <div class="Contenedor-Titulo animado">
                        <p>Know our</p>
                        <h2>Products</h2>
                    </div>
                        <div class="Contenedor-Todos-Productos">
                        <?php while($row=mysqli_fetch_array($sql)){
                                $imagen = $row['imagen'];
                                $nombre = $row['nombre_producto'];
                                $tipo = $row['tipo'];
                                $peso = $row['pesokg'];
                                $pesou = $row['pesolbs'];
                                $tag = $row['tag'];
                                $pdf = $row['pdf'];
                         ?>
                        <div class="Tarjeta secuencia <?php echo $tag ?>  ">
                            <div class="Tarjeta-Izquierda">
                                <img src="../<?php echo $imagen ?>" alt="<?php echo $nombre ?>">
                            </div>
                            <div class="Tarjeta-Derecha">
                                <div class="Contenedor-Tarjeta-Derecha">
                                    <div class="Produto-Titulos">
                                        <p class="Tipo"><?php echo $tipo ?></p>
                                        <span class="Nombre"> <?php echo $nombre ?> </span>
                                    </div>
                                    <div class="Producto-Detalles">
                                        <div class="PesoKg">
                                            <span class="PesoKg-Letra">Peso</span>
                                            <p class="PesoKg-Numero"><?php echo $peso ?></p>
                                        </div>
                                        <div class="PesoLbs">
                                            <span class="PesoLbs-Letra">Weight</span>
                                            <p class="PesoLbs-Numero"><?php echo $pesou ?></p>
                                        </div>
                                        <div class="Nuevo">
                                            <span class="Producto-Nuevo">New</span>
                                        </div>
                                    </div>
                                    <div class="Btn-Producto-Detalles">
                                        <a href="../<?php echo $pdf ?>" target="_blank">See details</a>
                                    </div>
                                </div>
                            </div>
                        </div><?php } ?>
                    </div>
                    <div class="Contenedor-Modo-De-Uso">
                        <div class="Modo-De-Uso">
                            <a onclick="openNav()" class="tooltip">Bs.S
                                <span class="tooltiptext">
									Type of sale
                                </span>
                            </a> <!--5%-->
                        </div>
                        <!-- BEGIN COPY -->
                        <div id="myNav" class="overlay">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <div class="overlay-content">
                                <h2 class="H2-Overlay">Type of sale</h2><br>
                                <a href="nacionales#Productos">Sale on Venezuela</a>
                                <a href="#Productos">Sale for Export</a>
                            </div>
                        </div>
                        <!-- END COPY -->
                    </div>
                </div>
            </section>
            <section class="S-Productos-Calidad">
                <div class="Contenedor">
                    <div class="Forma-Amarilla-2"></div>
                    <div class="Promocion">
                        <div class="Promocion-Textos">
                            <p class="Interes">Interested in our products?</p>
                            <p class="Contacto">Do your query or ask for your estimated budget. Now!</p>
                        </div>
                        <a class="btn-Contactanos" href="#Contactanos">Contact us</a>
                    </div>
                </div>
            </section>
            <section class="Pagina-4" id="Calidad">
                <div class="Contenedor">
                    <div class="Textos">
                        <div class="Titulos-Pagina animado">
                            <p>Our Study of</p>
                            <h2>Quality</h2>
                        </div>
                        <div class="Descripcion-Pagina animado-1">
                            <p class="Intro">
                            Our official quality control, guarantees the user that the product found in the market fulfills the general
                            specifications indicated by the national norm. Moreover, to be endorsed and certified bias technical tests done
                            by the U.D.O (Universidad de Oriente de Venezuela).
                            </p>
                        </div>
                    </div>
                    <div class="Todas-Pruebas">
                                <?php while($row=mysqli_fetch_array($sql_pruebas)){
                                $clasificacion = $row['clasificacion'];
                                $texto = $row['texto'];
                                $pdf = $row['pdf'];
								$tipop = $row['tipo'];
                         ?>
                        <div class="Tarjeta-Prueba secuencia">
                            <div class="Imagen-Contenedor">
                                <img src="img/Checked.png" alt="Checked">
                            </div>
                            <div class="Titulos-Contenedor">
                                <span class="Palabra-Prueba"><?php echo $tipop ?></span>
                                <p class="Tipo-Prueba"><?php echo $clasificacion ?></p>
                            </div>
                            <div class="Descripcion-Contenedor">
                                <p class="Descripcio-Prueba">
                                    <?php echo $texto ?>...
                                </p>
                            </div>
                            <div class="Leer-Mas-Contenedor">
                                <a class="Btn-leer-mas call_modal_pp" href="../<?php echo $pdf ?>" target="_blank">Read more</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <section class="S-Calidad-Contactanos">
                <p>100% Venezuelan quality</p>
            </section>
            <section class="Pagina-5" id="Contactanos">
                <div class="Contenedor">
                    <div class="Textos-Pag-5 animado">
                        <p>Doubts? Questions? Piece of advice?</p>
                        <h2>Contact us</h2>
                    </div>
                    <div class="Contenedor-inputs animado-1">
                        <form action="" method="post" class="Formulario-Consulta">
                            <input type="text" placeholder="Name" name="nombre" required>
                            <input type="email" placeholder="E-mail" name="correo" required>
                            <input type="tel" placeholder="Phone" name="telefono"required>
                            <textarea placeholder="Write your message here" maxlength="320" minlength="50" name="mensaje" required></textarea>
                            <button type="submit" name="boton">Send Ticket</button>
                        </form>
                    </div>
                    <div class="Contenedor-Info">
                        <div class="Titulo-Info animado-1">
                            <p>More Information</p>
                        </div>
                        <div class="Direccion-Info secuencia-1">
                            <div class="Imagen-Info">
                                <img src="img/Location.png" alt="Location">
                            </div>
                            <div class="Texto-Info">
                                <p>
									<?php
									echo $row_perfil['direccion'];
									?>
                                </p>
                            </div>
                        </div>
                        <div class="Tel-1 secuencia-1">
                            <div class="Imagen-Info">
                                <img src="img/Tel.png" alt="Tel1">
                            </div>
                            <div class="Texto-Info">
                                <p><?php echo $row_perfil['telefono'] ?></p>
                            </div>
                        </div>
                        <div class="Tel-2 secuencia-1">
                            <div class="Imagen-Info">
                                <img src="img/Tel-2.png" alt="Tel2">
                            </div>
                            <div class="Texto-Info">
                                <p><?php echo $row_perfil['telefono2'] ?></p>
                            </div>
                        </div>
                        <div class="Tel-3 secuencia-1">
                            <div class="Imagen-Info">
                                <img src="img/WhatsApp.png" alt="WhastApp">
                            </div>
                            <div class="Texto-Info">
                                <a href="https://goo.gl/Z8VtHj" class="links-new"><p><?php echo $row_perfil['telefono'] ?></p></a>
                            </div>
                        </div>
                        <div class="Facebook-2 secuencia-1">
                            <div class="Imagen-Info">
                                <img src="img/Facebook-2.png" alt="Fb">
                            </div>
                            <div class="Texto-Info">
                                <a href="https://facebook.com<?php echo $row_perfil['facebook'] ?>" class="Fb-Footer">El Gran Pegaso</a>
                            </div>
                        </div>
                        <div class="Instagram-2 secuencia-1">
                            <div class="Imagen-Info">
                                <img src="img/Instagram-2.png" alt="Ins">
                            </div>
                            <div class="Texto-Info">
                                <a href="https://instagram.com/<?php echo $row_perfil['instagram'] ?>" class="Ins-Footer">@<?php echo $row_perfil['instagram'] ?></a>
                            </div>
                        </div>
                        <div class="Twitter-2 secuencia-1">
                            <div class="Imagen-Info">
                                <img src="img/Twitter-2.png" alt="T">
                            </div>
                            <div class="Texto-Info">
                                <a href="https://twitter.com/<?php echo $row_perfil['twitter'] ?>" class="Tt-Footer">@<?php echo $row_perfil['twitter'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="Footer">
            <div class="Contenedor">
                <div class="Logo-Letra">
                    <p class="Arriba">Investments</p>
                    <p class="Abajo">The Great Pegasus</p>
                </div>
                <div class="Devs-thx">
                    <p class="Part-1">Designed with <br><img class="Part-2" src="img/Create.png" alt="Heart"> in Venezuela</p>
                </div>
            </div>
        </footer>
        <?php require_once ("modal/video.php"); ?>
        <?php require_once ("modal/visionEN.php"); ?>
        <?php require_once ("modal/fortalezaEN.php"); ?>
        <?php require_once ("modal/misionEN.php"); ?>

        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" scr="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.superslides.js"></script>
               <?php if (isset($messages)){
                ?>
                <div id="snackbar">
                        <?php
                            foreach ($messages as $message) {
                                    echo $message;
                                }
                            ?>
                </div>
                <?php
            } ?>
    <script type="text/javascript">
        $(document).ready(function() {
        setTimeout(function(){
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
            }, 5000)
            });
    </script>

    <script type="text/javascript">
    filterSelection("all")
    function filterSelection(c) {
      var x, i;
      x = document.getElementsByClassName("Tarjeta");
      if (c == "all") c = "";
      for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
      }
    }

    function w3AddClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
      }
    }

    function w3RemoveClass(element, name) {
      var i, arr1, arr2;
      arr1 = element.className.split(" ");
      arr2 = name.split(" ");
      for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
          arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
      }
      element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var btnContainer = document.getElementById("myBtnContainer");
    var btns = btnContainer.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function(){
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
      });
    }
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
      $(".call_modal").click(function(){
    	$(".modal").fadeIn();
    	$(".modal_main").show();
    	  });
    });
    $(document).ready(function(){
      $(".close").click(function(){
    	$(".modal").fadeOut();
    	$(".modal_main").fadeOut();
    	$("iframe").each(function() {
            var src= $(this).attr('src');
            $(this).attr('src',src);
    });
    	  });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $(".call_modal_v").click(function(){
        $(".modal_v").fadeIn();
        $(".modal_main_v").show();
          });
    });
    $(document).ready(function(){
      $(".close_v").click(function(){
        $(".modal_v").fadeOut();
        $(".modal_main_v").fadeOut();
          });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $(".call_modal_f").click(function(){
        $(".modal_f").fadeIn();
        $(".modal_main_f").show();
          });
    });
    $(document).ready(function(){
      $(".close_f").click(function(){
        $(".modal_f").fadeOut();
        $(".modal_main_f").fadeOut();
          });
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $(".call_modal_m").click(function(){
        $(".modal_m").fadeIn();
        $(".modal_main_m").show();
          });
    });
    $(document).ready(function(){
      $(".close_m").click(function(){
        $(".modal_m").fadeOut();
        $(".modal_main_m").fadeOut();
          });
    });
    </script>
    <script type="text/javascript">
        window.sr= ScrollReveal();
        sr.reveal('.animado', {duration: 600});
        sr.reveal('.animado-1', {delay: 300, duration: 600});
        sr.reveal('.animado-2', {delay: 400, duration: 600});
        sr.reveal('.animado-3', {delay: 600, duration: 600});
        sr.reveal('.secuencia', {interval: 150, scale: 0.85, distance: '50px', origin:'bottom'});
        sr.reveal('.secuencia-1', {interval: 80, delay: 300, scale: 0.85});
    </script>
    </body>
</html>
