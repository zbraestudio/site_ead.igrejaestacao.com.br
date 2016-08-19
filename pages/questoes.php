<?
$pms = GetParamsArray();

// verifica se tem parametro
if(count($pms) <= 0)
  goPageMessage('As questões que você está tentando acessar está, está com link incorreto.');

$moduloID = $pms[0];

// verifica se o modulo está liberado pra mim
$sql  = 'SELECT * FROM CursoInscricaoModulos';
$sql .= " WHERE Modulo IN(SELECT Modulo FROM CursoModuloAulas Where Modulo = " . $moduloID . " AND Inscricao = " . perfil_id() . ')';
$res = $db->LoadObjects($sql);

if(count($res) < 0)
  goPageMessage('Você não tem permissão para responder essas questões ou elas não foram encontradas.');

//verifica se já foi respondido

if(curso_verifyModuloRespondido($moduloID))
  goPageMessage('Você já respondeu as perguntar desse módulo.');

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
