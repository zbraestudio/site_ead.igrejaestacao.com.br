<?
$pms = GetParamsArray();

// verifica se tem parametro
if(count($pms) <= 0)
  goPageMessage('O link da aula que você tentando acessar está incorreto.');

$aulaID = $pms[0];

// verifica se existe aula no banco
$sql  = 'SELECT * FROM CursoInscricaoModulos';
$sql .= " WHERE Modulo IN(SELECT Modulo FROM CursoModuloAulas Where ID = " . $aulaID . ") AND Inscricao = " . perfil_id();
$res = $db->LoadObjects($sql);

if(count($res) < 0)
  goPageMessage('Você não tem permissão para assistir essa aula ou não foi encontrada.');

$aulaTB = LoadRecord('CursoModuloAulas', $aulaID);
$moduloTB = LoadRecord('CursoModulos', $aulaTB->Modulo);
$cursoTB = LoadRecord('Cursos', $moduloTB->Curso);

//registra que assistiu a aula
curso_viewAula($aulaID);

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
        <h2><?= $aulaTB->Titulo; ?></h2>
        <p><?= $cursoTB->Nome . ' // ' . $moduloTB->Nome; ?></p>
      </header>

      <?
      echo $aulaTB->Aula;
      ?>
    </div>
  </section>

</div>
<?
html_footer();
?>
