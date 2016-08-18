<?
$page = GetPage();
$logado = log_verify();

global $db;
?>
<!DOCTYPE HTML>
<!--
	Read Only by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
  <title>Livres EaD</title>
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
        <span class="image avatar" style="background-image: url('<?= SITE_URL; ?>images/avatar.jpg');"></span>

        <h1 id="logo"><a href="#">Olá visitante</a></h1>

        <p><a href="<?= SITE_URL ?>login">Clique aqui</a> e faça seu login.</p>
      </header>
      <?
    } else {

      $avatar = SITE_URL . 'images/avatar.jpg';

      $sql = 'SELECT * FROM MembroFotos WHERE Membro = ' . perfil_id();
      $res = $db->LoadObjects($sql);


      if(count($res) > 0){
        $reg = $res[0];
        $avatar = UPLOADS_URL . $reg->Foto;
      }
      ?>
      <header>
        <span class="image avatar" style="background-image: url('<?= $avatar; ?>');"></span>

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
      } elseif(GetPage() == 'aula.php' || GetPage() == 'questoes.php') {

        global $aulaTB, $cursoTB, $moduloTB, $db;
        ?>
        <nav id="nav">
        <ul>
        <li><a href="<?= SITE_URL ?>perfil">Perfil</a>
        <li><a href="<?= SITE_URL ?>curso/<?= $cursoTB->Link; ?>"><?= $cursoTB->Nome; ?></a>

          <?
          $sql = 'SELECT * FROM CursoModuloAulas';
          $sql .= ' WHERE Modulo = ' . $moduloTB->ID;
          $sql .= ' ORDER BY Ordem ASC';
          $aulas = $db->LoadObjects($sql);

          foreach ($aulas as $x=>$aula) {

          $nro = ($x + 1);

          $selecionado = null;

          if(isset($aulaTB)){

            if($aulaTB->ID == $aula->ID)
              $selecionado = 'class="active"';
          }


          ?>
          <li><a href="<?= SITE_URL . 'aula/' . $aula->ID; ?>" <?= $selecionado; ?>> <?= $nro . ' - ' . $aula->Titulo; ?></a></li>
            <?
            }
            ?>

          <?
          //verifica se módulo tem questões
          $sql  = 'SELECT * FROM CursoModuloQuestoes WHERE Modulo = ' . $moduloTB->ID;
          $questoes = $db->LoadObjects($sql);

          if(count($questoes) > 0) {

            if(GetPage() == 'questoes.php')
              $selecionado = 'class="active"';
            else{
              $selecionado = null;
            }
            ?>
            <li><a href="<?= SITE_URL; ?>questoes/<?= $moduloTB->ID; ?>" <?= $selecionado; ?>>Sua vez - Responda!</a></li>
            <?
          }
          ?>
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
        <!--<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>-->
        <li><a href="mailto:tiago@ielbc.com.br" class="icon fa-envelope"><span class="label">Email</span></a></li>
      </ul>
    </footer>
  </section>
