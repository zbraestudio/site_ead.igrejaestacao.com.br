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
        $sql .= " WHERE CursoAlunos.Situacao = 'ATV' AND CursoAlunos.Aluno = " . perfil_id();
        $cursos = $db->LoadObjects($sql);

        if(count($cursos) > 0){
        ?>

        <p>Veja abaixo os cursos que você está inscrito.</p>

        <div class="features cursos">
          <?
          foreach($cursos as $curso) {
            ?>
            <article>

              <div class="col1">
                <a href="#" class="image"><img src="<?= UPLOADS_URL . $curso->Capa; ?>" alt=""/></a>

                <ul class="ficha">
                  <li><strong>Professor:</strong> Tihh Gonçalves</li>
                  <li><strong>Sua situação:</strong> Inscrito</li>
                  <li><strong>Aulas:</strong> 10</li>
                  <li><strong>Duração:</strong> Previsão de 2 meses</li>
                </ul>

              </div>


              <div class="inner col2">
                <h4><?= $curso->Nome; ?></h4>

                <p><?= $curso->DescricaoCurta; ?></p>
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