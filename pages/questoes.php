<?
$pms = GetParamsArray();

// verifica se tem parametro
if(count($pms) <= 0)
  goPageMessage('As quest�es que voc� est� tentando acessar est�, est� com link incorreto.');

$moduloID = $pms[0];

// verifica se existe aula no banco
$sql  = 'SELECT * FROM CursoInscricaoModulos';
$sql .= " WHERE Modulo IN(SELECT Modulo FROM CursoModuloAulas Where Modulo = " . $moduloID . " AND Inscricao = " . perfil_id() . ')';
$res = $db->LoadObjects($sql);

if(count($res) < 0)
  goPageMessage('Voc� n�o tem permiss�o para responder essas quest�es ou elas n�o foram encontradas.');

$moduloTB = LoadRecord('CursoModulos', $moduloID);
$cursoTB = LoadRecord('Cursos', $moduloTB->Curso);


?>

<?
html_header();
?>
<!-- Main -->
<div id="main">

  <!-- One -->
  <section id="one">
    <div class="container">
      <header class="major">
        <h2>Sua vez!</h2>
        <p><?= $cursoTB->Nome; ?> // <?= $moduloTB->Nome; ?></p>
      </header>

      <div id="questoes">
        <form action="<?= SITE_URL; ?>script/respostas.php" method="post">

        <?
        $sql = 'SELECT * FROM CursoModuloQuestoes';
        $sql .= ' WHERE Modulo = ' . $moduloID;
        $sql .= ' ORDER BY Ordem ASC';
        $questoes = $db->LoadObjects($sql);

        $ids = array();

        foreach($questoes as $questao){
          $ids[] = $questao->ID;
          ?>
          <label for="questao_<?= $questao->ID; ?>"><?= $questao->Questao; ?></label>
          <textarea name="questao_<?= $questao->ID; ?>" id="message" placeholder="Responda com suas palavras." rows="6" required></textarea>
          <?
        }
        ?>

        <input type="submit" class="special" value="Enviar sua(s) resposta(s)" style="margin-top: 25px;">

          <input type="hidden" name="modulo" value="<?= $moduloID?>">
          <input type="hidden" name="questoesID" value="<?= implode('|', $ids); ?>">
        </form>
      </div>

    </div>
  </section>

</div>
<?
html_footer();
?>
