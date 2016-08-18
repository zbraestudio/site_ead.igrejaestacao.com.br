<?
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

      <?
      if(!empty($_SESSION['ead_msg'])){

        echo('<div class="alert">' . $_SESSION['ead_msg'] . '</div>');
        $_SESSION['ead_msg'] = null;
      }
      ?>

      <form id="login" action="<?= SITE_URL; ?>script/login.php" method="post">
      <p>Digite abaixo suas credenciais para o Livres EaD.
        Caso você ainda não tenha um <i>login</i> e uma senha e gostaria de fazer um curso, envie um e-mail para <a href="mailto:ead@livresweb.com">ead@livresweb.com</a>.</p>
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