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

        $sql  = 'SELECT Cursos.*, Membros.Nome ProfessorNome FROM CursoAlunos';
        $sql .= ' JOIN Cursos ON(Cursos.ID = CursoAlunos.Curso)';
        $sql .= ' JOIN Membros ON(Membros.ID = Cursos.Professor)';
        $sql .= " WHERE CursoAlunos.Situacao = 'ATV' AND CursoAlunos.Aluno = " . perfil_id();
        $cursos = $db->LoadObjects($sql);

        if(count($cursos) > 0){
        ?>

        <p>Veja abaixo os cursos que você está inscrito.</p>

        <div class="features cursos">
          <?
          foreach($cursos as $curso) {

            $link_curso = SITE_URL . 'curso/' . $curso->Link;
            ?>
            <article>

              <div class="col1">

                <h4 class="onMobile"><?= $curso->Nome; ?></h4>
                <a href="<?= $link_curso; ?>" class="image"><img src="<?= UPLOADS_URL . $curso->Capa; ?>" alt=""/></a>

                <ul class="ficha">
                  <li><strong>Professor:</strong><?= $curso->ProfessorNome; ?>.</li>
                  <li><strong>Sua situação:</strong> Inscrito.</li>

                  <?
                    $total_aulas = curso_getTotalAulas($curso->ID);
                  ?>
                  <li><strong>Aulas:</strong> <?= $total_aulas; ?>.</li>
                  <li><strong>Duração:</strong> Previsão de <?= curso_getDuracaoPrevista(21); ?>.</li>
                </ul>

              </div>


              <div class="inner col2">
                <h4 class="offMobile"><?= $curso->Nome; ?></h4>

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