<?
include('./includes/autoload.php');

if(!log_verifyPage())
  goPageMessage('Você não pode acessar a página de um Curso sem ter feito seu login antes.', 'login');

html_header();
?>
  <!-- Main -->
  <div id="main">

    <!-- One -->
    <section id="one">
      <div class="container">
        <header class="major">
          <h2>Nome do Curso</h2>
          <p>Faça abaixo seu login.</p>
        </header>

      </div>
    </section>

  </div>
<?
html_footer();
?>