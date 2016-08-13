<?
if(!log_verifyPage())
  goPageMessage('Você não pode acessar a página de um Curso sem ter feito seu login antes.', 'login');

html_header();

$p = GetParamsArray();
$sql = "SELECT * FROM Cursos WHERE  Link = '" . $p[0] . "'";
$cursos = $db->LoadObjects($sql);

if(count($cursos) <= 0)
  goPageMessage('Não encontramos o curso que você tentou acessar. Verifique se o link está correto e qualquer coisa, procure a secretaria da LIVRES EaD.');

$curso = $cursos[0];
?>
  <!-- Main -->
  <div id="main">

    <!-- One -->
    <section id="one">
      <div class="container">
        <header class="major">
          <h2><?= $curso->Nome; ?></h2>

          <img src="<?= UPLOADS_URL . $curso->Capa; ?>" alt="" />

          <p><?= nl2p($curso->DescricaoCurta); ?></p>

        </header>

      </div>
    </section>


    <section id="two">
      <div class="container">
        <header class="major">
          <h2>Módulos</h2>
        </header>


        <?
        $sql  = 'SELECT * FROM CursoModulos';
        $sql .= ' WHERE Curso = ' . $curso->ID;
        $modulos = $db->LoadObjects($sql);

        foreach($modulos as $m=>$modulo) {
          $modulo_nr = ($m + 1);

          ?>
          <h3><?= $modulo_nr . ' - ' . $modulo->Nome; ?></h3>
          <ul class="aulas">
          <?

          $sql  = 'SELECT * FROM CursoModuloAulas';
          $sql .= ' WHERE Modulo = ' . $modulo->ID;
          $aulas = $db->LoadObjects($sql);


          foreach($aulas as $a=>$aula) {
            $aula_nr = ($a + 1);
            ?>

              <li>Aula <?= $aula_nr; ?> - <a href="#" title="Assista a essa aula"><?= $aula->Titulo; ?></a><!--<i class="fa fa-check-circle-o" aria-hidden="true"></i>--></li>

            <?
          }
          ?>
            </ul>
            <?
        }
        ?>

      </div>
    </section>

  </div>
<?
html_footer();
?>