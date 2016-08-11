<?
include('includes/autoload.php');

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

        $sql  = 'SELECT Cursos.* FROM CursoAlunos';
        $sql .= ' JOIN Cursos ON(Cursos.ID = CursoAlunos.Curso)';
        $sql .= " WHERE CursoAlunos.Aluno = 3 AND CursoAlunos.Situacao = 'ATV'";
        $cursos = $db->LoadObjects($sql);

        if(count($cursos) > 0){
        ?>

        <p>Veja abaixo os cursos que você está inscrito.</p>

        <div class="features">
          <?
          foreach($cursos as $curso) {
            ?>
            <article>
              <a href="#" class="image"><img src="<?= UPLOADS_URL . $curso->Capa; ?>" alt=""/></a>

              <div class="inner">
                <h4><?= $curso->Nome; ?></h4>

                <p>Curso dedicado a todos que sonham e se sentem chamado a ser Apascentadores do Projeto Talmidim.</p>
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
        </div>

      </div>
    </section>

  </div>
<?
html_footer();
?>