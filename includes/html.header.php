<?
$page = GetPage();
$logado = log_verify();
?>
<!DOCTYPE HTML>
<!--
	Read Only by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <title>EaD LIVRE // Educação</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->

  <script>
    var SITE_URL = '<?= SITE_URL; ?>';
  </script>
  <script src="<?= SITE_URL; ?>js/jquery.min.js"></script>
  <script src="<?= SITE_URL; ?>js/jquery.scrollzer.min.js"></script>
  <script src="<?= SITE_URL; ?>js/jquery.scrolly.min.js"></script>
  <script src="<?= SITE_URL; ?>js/skel.min.js"></script>
  <script src="<?= SITE_URL; ?>js/skel-layers.min.js"></script>
  <script src="<?= SITE_URL; ?>js/init.js"></script>
  <noscript>
    <link rel="stylesheet" src="<?= SITE_URL; ?>css/skel.css" />
    <link rel="stylesheet" src="<?= SITE_URL; ?>css/less.css" />
    <link rel="stylesheet" src="<?= SITE_URL; ?>css/style-xlarge.css" />
  </noscript>
  <!--[if lte IE 8]><link rel="stylesheet" src="<?= SITE_URL; ?>css/ie/v8.css" /><![endif]-->

</head>
<body>
<div id="wrapper">

  <!-- Header -->
  <section id="header" class="skel-layers-fixed">

    <?
    if(!$logado) {
      ?>
      <header>
        <span class="image avatar"><img src="<?= SITE_URL; ?>images/avatar.jpg" alt=""/></span>

        <h1 id="logo"><a href="#">Olá visitante</a></h1>

        <p><a href="<?= SITE_URL ?>login">Clique aqui</a> e faça seu login.</p>
      </header>
      <?
    } else {
      ?>
      <header>
        <span class="image avatar"><img src="<?= SITE_URL; ?>images/avatar.jpg" alt=""/></span>

        <h1 id="logo"><a href="#">Olá <?= perfil_apelido(); ?></a></h1>

        <p><a href="<?= SITE_URL ?>script/logout.php">Sair</a></p>
      </header>
      <?
    }
    ?>

    <?

    if(!$logado){

      if($page == 'home.php'){
        ?>
        <nav id="nav">
          <ul>
            <li><a href="#one" class="active">Bem vindo</a></li>
            <li><a href="#two">Quem pode participar</a></li>
            <li><a href="#three">Cursos </a></li>
            <li><a href="#four">Contato</a></li>
          </ul>
        </nav>
        <?

      } else if($page == 'login.php') {
        ?>
        <nav id="nav">
          <ul>
            <li><a href="<?= SITE_URL; ?>home" >Home</a></li>
            <li><a href="#one"class="active">Login</a></li>
          </ul>
        </nav>
        <?
      }

    } else {

      if (GetPage() == 'curso.php') {

        ?>
        <nav id="nav">
          <ul>
            <li><a href="<?= SITE_URL ?>/perfil">Perfil</a>
            <li><a href="#one">Sobre o curso</a>
            <li><a href="#two">Módulos</a>
            </li>
          </ul>
        </nav>

        <?
      } else {

        ?>
        <nav id="nav">
          <ul>
            <li><a href="<?= SITE_URL ?>/perfil" <?= GetPage() == 'perfil.php' ? 'class="active"' : null; ?>>Perfil</a>
            </li>
          </ul>
        </nav>
        <?
      }
    }
    ?>



    <footer>
      <ul class="icons">
        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
        <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
      </ul>
    </footer>
  </section>
