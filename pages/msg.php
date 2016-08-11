<?
if(!isset($_SESSION['ead_msg']))
  header('LOCATION: ' . SITE_URL);



html_header();
?>
  <!-- Main -->
  <div id="main">

    <!-- One -->
    <section id="one">
      <div class="container">
        <header class="major">
          <h2>Mensagem</h2>
          <p><?
              echo($_SESSION['ead_msg']);
              $_SESSION['ead_msg'] = null;
            ?></p>
        </header>

      </div>
    </section>

  </div>
<?
html_footer();
?>