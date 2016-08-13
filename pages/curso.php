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
          <p>Faça abaixo seu login.</p>

          <?= GetParamsArray();?>

          <? print_r(GetParamsArray());?>
        </header>

      </div>
    </section>

  </div>
<?
html_footer();
?>