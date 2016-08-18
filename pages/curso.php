<?
if(!log_verifyPage())
  goPageMessage('Você não pode acessar a página de um Curso sem ter feito seu login antes.', 'login');



$p = GetParamsArray();
$sql = "SELECT * FROM Cursos WHERE  Link = '" . $p[0] . "'";
$cursos = $db->LoadObjects($sql);

if(count($cursos) <= 0)
  goPageMessage('Não encontramos o curso que você tentou acessar. Verifique se o link está correto e qualquer coisa, procure a secretaria da LIVRES EaD.');

$curso = $cursos[0];

//verifica se você está inscrito nesse curso
$sql  = 'SELECT * FROM CursoInscricoes';
$sql .= " WHERE Curso = " . $curso->ID . " AND Membro = " . perfil_id() . " AND Situacao = 'ATV'";
$inscricoes = $db->LoadObjects($sql);
if(count($inscricoes) <= 0)
  goPageMessage('Você ainda não está inscrito para o curso:<br>' . $curso->Nome);

html_header();


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

          $modulo_aberto = curso_ModulosAberto(perfil_id(), $modulo->ID);

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

              <li>Aula <?= $aula_nr; ?> -

                <?
                if($modulo_aberto){
                ?>
                <a href="<?= SITE_URL?>aula/<?= $aula->ID; ?>" title="Assista a essa aula">
                  <?
                  }
                  ?>
                  <?= $aula->Titulo; ?>

            <?
            if($modulo_aberto){
                  ?>
                </a>

              <?
              }

              if(curso_verifyViewAula($aula->ID)) {
                ?>

                <i class="fa fa-check-circle-o" aria-hidden="true" title="VocÊ já assistiu essa aula"></i>


                <?
              }

              ?>
                </li>

                <?
          }

          //verifica se módulo tem questões
          $sql  = 'SELECT * FROM CursoModuloQuestoes WHERE Modulo = ' . $modulo->ID;
          $questoes = $db->LoadObjects($sql);

          if(count($questoes) > 0) {

            $respondido = curso_verifyModuloRespondido($modulo->ID);

            $okay = '<i class="fa fa-check-circle-o" aria-hidden="true" title="Você já enviou sua(s) resposta(s);"></i>';
            ?>
            <li>
              <? if( (!$respondido) && $modulo_aberto) { ?>
              <a href="<?= SITE_URL; ?>questoes/<?= $modulo->ID; ?>">
              <? } ?>
                Sua vez
              <? if( (!$respondido) && $modulo_aberto) { ?>
              </a>
              <? } ?>
              - Responda para concluir o módulo <?= ($respondido?$okay:null)?></li>
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