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
        <h2>Identifique-se</h2>
        <p>Faça abaixo seu login.</p>
      </header>

      <form id="login" action="<?= SITE_URL; ?>script/login" method="post">
      <p>Faucibus sed lobortis aliquam lorem blandit. Lorem eu nunc metus col. Commodo id in arcu ante lorem ipsum sed accumsan erat praesent faucibus commodo ac mi lacus. Adipiscing mi ac commodo. Vis aliquet tortor ultricies non ante erat nunc integer eu ante ornare amet commetus vestibulum blandit integer in curae ac faucibus integer non. Adipiscing cubilia elementum.</p>
        <input type="email" name="email" placeholder="Seu e-mail" required="">
        <input type="password" name="senha" placeholder="Sua senha" required="">

        <input type="submit"  class="special" value="Entrar">
      </form>
    </div>
  </section>

</div>
<?
html_footer();
?>