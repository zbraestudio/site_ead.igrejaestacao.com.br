<?
html_header();
?>
  <!-- Main -->
  <div id="main">

    <!-- One -->
    <section id="one">
      <div class="container">
        <header class="major">
          <h2>Seu Perfil</h2>
          <p>Bem vindo, <?= perfil_apelido(); ?></p>
        </header>

        <?

        $sql  = 'SELECT Cursos.*, Membros.Nome ProfessorNome FROM CursoInscricoes';
        $sql .= ' JOIN Cursos ON(Cursos.ID = CursoInscricoes.Curso)';
        $sql .= ' JOIN Membros ON(Membros.ID = Cursos.Professor)';
        $sql .= " WHERE CursoInscricoes.Situacao = 'ATV' AND CursoInscricoes.Membro = " . perfil_id();
        $cursos = $db->LoadObjects($sql);

        if(count($cursos) > 0){
        ?>

        <p>Veja abaixo o(s) curso(s) que você está inscrito.</p>

        <div class="features cursos">
          <?
          foreach($cursos as $curso) {

            $link_curso = SITE_URL . 'curso/' . $curso->Link;
            ?>
            <article>

              <div class="col1">

                <h4 class="onMobile"><a href="<?= $link_curso; ?>"><?= $curso->Nome; ?></a></h4>
                <a href="<?= $link_curso; ?>" class="image"><img src="<?= UPLOADS_URL . $curso->Capa; ?>" alt=""/></a>

                <ul class="ficha">
                  <li><strong>Professor:</strong> <?= $curso->ProfessorNome; ?>.</li>

                  <?
                  $total_aulas = curso_getTotalAulas($curso->ID);
                  $total_modulos = curso_getTotalModulos($curso->ID);

                  ?>
                  <li><strong>Aulas:</strong> <?= $total_aulas; ?> (<?= $total_modulos; ?> módulos).</li>
                  <li><strong>Duração:</strong> Previsão de <?= curso_getDuracaoPrevista($total_modulos); ?>.</li>
                </ul>

              </div>


              <div class="inner col2">
                <h4 class="offMobile"><a href="<?= $link_curso; ?>"><?= $curso->Nome; ?></a></h4>

                <p><a href="<?= $link_curso; ?>" class="entrarCurso">Entrar no curso</a> </p>

                <p><?=  nl2p($curso->DescricaoCurta); ?></p>
              </div>
            </article>
            <?
          }
          } else {
          ?>
            <p>Nenhum curso disponível pra você no momento.</p>


            <?
          }
        ?>
          <div style="clear: both"></div>
        </div>

      </div>
    </section>

  </div>
<?
html_footer();
?>