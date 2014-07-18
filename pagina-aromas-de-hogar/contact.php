<!DOCTYPE HTML>
<html>

<head>
  <title>Aromas de Hogar</title>
  <meta name="comidas" content="comidas" />
  <meta name="keywords" content="catering, comidas, mendoza, eventos" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script> 
</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text <h1><a href="index.html">Aromas de Hogar<span class="logo_colour"></span></a><h2>
          <h2>Nuestro estilo, tu deleite.</h2><span class= "logo_colour"><h2></h2-->
        
        </div>
      </div>
            <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            <li><a href="index.html">inicio</a></li>
           
           
           <li><a href="platos principales.html">recetas</a>
              <ul>
                <li><a href="platos principales.html">Platos principales</a></li>
                <li><a href="recetas dulces.html">Recetas dulces</a></li>
                <li><a href="recetas saladas.html">Recetas saladas</a>
                </li>
              </ul>
               <li><a href="galería de fotos.html">galería de fotos</a></li>
               <li><a href="contact.php">contactanos</a></li>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <h3>Contactanos:</h3>
          <h4>federico.cateringeventos@gmail.com</h4>
          <h4>Cel: (0261) 156395912</h4>
          <h4>facebook: aromas de hogar</h4>
          <h5>25 de Enero del 2008</h5>

          <p>También preparamos menú a pedido.<br /><!--<a href="#">Si lee mas</a></p>-->
        </div>
        <div class="sidebar">
          <h3> </h3>
          <ul>
            <!--<li><a href="#"> </a></li>
            <li><a href="#"> </a></li>-->
          
          </ul>
        </div>
      </div>
         <div class="content">
        <h1>Envianos tu mensaje</h1>
        <p>Hola, podés enviarnos mensajes por este medio, ingresá tu nombre y correo electrónico.</p>
        <?php
          // Set-up these 3 parameters
          // 1. Enter the email address you would like the enquiry sent to
          // 2. Enter the subject of the email you will receive, when someone contacts you
          // 3. Enter the text that you would like the user to see once they submit the contact form
          $to = 'federico.cateringeventos@gmail.com';
          $subject = 'consulta de cateringeventos';
          $contact_submitted = 'su mensaje ha sido enviado correctamente.';

          // Do not amend anything below here, unless you know PHP
          function email_is_valid($email) {
            return preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email);
          }
          if (!email_is_valid($to)) {
            echo '<p style="color: red;">You must set-up a valid (to) email address before this contact page will work.</p>';
          }
          if (isset($_POST['contact_submitted'])) {
            $return = "\r";
            $youremail = trim(htmlspecialchars($_POST['your_email']));
            $yourname = stripslashes(strip_tags($_POST['your_name']));
            $yourmessage = stripslashes(strip_tags($_POST['your_message']));
            $contact_name = "Name: ".$yourname;
            $message_text = "Message: ".$yourmessage;
            $user_answer = trim(htmlspecialchars($_POST['user_answer']));
            $answer = trim(htmlspecialchars($_POST['answer']));
            $message = $contact_name . $return . $message_text;
            $headers = "From: ".$youremail;
            if (email_is_valid($youremail) && !eregi("\r",$youremail) && !eregi("\n",$youremail) && $yourname != "" && $yourmessage != "" && substr(md5($user_answer),5,10) === $answer) {
              mail($to,$subject,$message,$headers);
              $yourname = '';
              $youremail = '';
              $yourmessage = '';
              echo '<p style="color: blue;">'.$contact_submitted.'</p>';
            }
            else echo '<p style="color: red;">Por favor, introduzca su nombre, una dirección de correo electrónico válida, el mensaje y la respuesta a la pregunta de matemáticas simples antes de enviar el mensaje.</p>';
          }
          $number_1 = rand(1, 9);
          $number_2 = rand(1, 9);
          $answer = substr(md5($number_1+$number_2),5,10);
        ?>
        <form id="contact" action="contact.php" method="post">
          <div class="form_settings">
            <p><span>Nombre:</span><input class="contact" type="text" name="your_name" value="<?php echo $yourname; ?>" /></p>
            <p><span>Dirección de E-mail:</span><input class="contact" type="text" name="your_email" value="<?php echo $youremail; ?>" /></p>
            <p><span>Mensaje:</span><textarea class="contact textarea" rows="5" cols="50" name="your_message"><?php echo $yourmessage; ?></textarea></p>
            <p style="line-height: 1.7em;">para ayudar a prevenir spam de una respuesta a esta pregunta:</p>
            <p><span><?php echo $number_1; ?> + <?php echo $number_2; ?> = ?</span><input type="text" name="user_answer" /><input type="hidden" name="answer" value="<?php echo $answer; ?>" /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="Enviar" /></p>
          </div>
        </form>
      </div>
    </div>
    <footer>
      <p>Copyright &copy; Aromas de Hogar</p>
       <div class="content">
        
    </footer>
  </div>
  <p>&nbsp;</p>
  <!-- javascript at the bottom for fast page loading -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>
