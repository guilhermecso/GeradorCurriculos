<?php
function sanitize($str) {
    return htmlspecialchars(trim($str), ENT_QUOTES, 'UTF-8');
}

$nome        = isset($_POST['nome']) ? sanitize($_POST['nome']) : "";
$email       = isset($_POST['email']) ? sanitize($_POST['email']) : "";
$telefone    = isset($_POST['telefone']) ? sanitize($_POST['telefone']) : "";
$dataNasc    = isset($_POST['data_nascimento']) ? sanitize($_POST['data_nascimento']) : "";
$endereco    = isset($_POST['endereco']) ? sanitize($_POST['endereco']) : "";
$linkedin    = isset($_POST['linkedin']) ? sanitize($_POST['linkedin']) : "";
$resumo      = isset($_POST['resumo']) ? sanitize($_POST['resumo']) : "";

$cursoArr        = isset($_POST['curso']) ? $_POST['curso'] : [];
$instituicaoArr  = isset($_POST['instituicao']) ? $_POST['instituicao'] : [];
$periodoFArr     = isset($_POST['periodoFormacao']) ? $_POST['periodoFormacao'] : [];
$descricaoFArr   = isset($_POST['descricaoFormacao']) ? $_POST['descricaoFormacao'] : [];

$cargoArr        = isset($_POST['cargo']) ? $_POST['cargo'] : [];
$empresaArr      = isset($_POST['empresa']) ? $_POST['empresa'] : [];
$periodoEArr     = isset($_POST['periodoExperiencia']) ? $_POST['periodoExperiencia'] : [];
$descricaoEArr   = isset($_POST['descricaoExperiencia']) ? $_POST['descricaoExperiencia'] : [];

$skills_concat = isset($_POST['skills']) ? sanitize($_POST['skills']) : "";
$skillsArr = $skills_concat !== "" ? explode(";", $skills_concat) : [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Preview do Currículo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">

  <style>
    @media print {
      body * {
        visibility: hidden;
      }
      .preview-container, .preview-container * {
        visibility: visible;
      }
      .preview-container {
        position: absolute;
        left: 0;
        top: 0;
      }
    }
  </style>
</head>
<body>
  <div class="container mt-4 mb-5">
    <button class="btn btn-secondary mb-3" onclick="window.history.back();">
      &larr; Voltar e Editar
    </button>
    <button class="btn btn-primary mb-3 float-end" onclick="window.print();">
      <i class="bi bi-printer"></i> Imprimir / Salvar como PDF
    </button>

    <div class="preview-container">
      <div class="row">
        <div class="col-md-8">
          <h1 class="fw-bold mb-1"><?php echo $nome; ?></h1>
          <p class="mb-0"><strong>E-mail:</strong> <?php echo $email; ?></p>
          <p class="mb-0"><strong>Telefone:</strong> <?php echo $telefone; ?></p>
          <?php if ($linkedin): ?>
            <p class="mb-0"><strong>LinkedIn/GitHub:</strong> <a href="<?php echo $linkedin; ?>" target="_blank"><?php echo $linkedin; ?></a></p>
          <?php endif; ?>
          <p class="mb-0"><strong>Endereço:</strong> <?php echo $endereco; ?></p>
          <p class="mb-0"><strong>Data de Nascimento:</strong> <?php echo $dataNasc; ?></p>
        </div>
      </div>
      <hr class="my-3">

      <?php if ($resumo): ?>
      <section class="mb-4">
        <h5 class="text-primary mb-2">Resumo Profissional / Objetivo</h5>
        <p><?php echo nl2br($resumo); ?></p>
      </section>
      <?php endif; ?>

      <?php if (!empty($cursoArr)): ?>
      <section class="mb-4">
        <h5 class="text-primary mb-2">Formação Acadêmica</h5>
        <?php
        for ($i = 0; $i < count($cursoArr); $i++):
          $c = sanitize($cursoArr[$i]);
          $inst = isset($instituicaoArr[$i]) ? sanitize($instituicaoArr[$i]) : "";
          $per = isset($periodoFArr[$i]) ? sanitize($periodoFArr[$i]) : "";
          $desc = isset($descricaoFArr[$i]) ? sanitize($descricaoFArr[$i]) : "";
        ?>
          <div class="mb-2">
            <p class="mb-0"><strong><?php echo $c; ?></strong> – <?php echo $inst; ?> (<?php echo $per; ?>)</p>
            <?php if ($desc): ?>
              <p class="ms-3 mb-0"><?php echo nl2br($desc); ?></p>
            <?php endif; ?>
          </div>
        <?php endfor; ?>
      </section>
      <?php endif; ?>

      <?php if (!empty($cargoArr)): ?>
      <section class="mb-4">
        <h5 class="text-primary mb-2">Experiência Profissional</h5>
        <?php
        for ($i = 0; $i < count($cargoArr); $i++):
          $cargo  = sanitize($cargoArr[$i]);
          $emp    = isset($empresaArr[$i]) ? sanitize($empresaArr[$i]) : "";
          $perE   = isset($periodoEArr[$i]) ? sanitize($periodoEArr[$i]) : "";
          $descE  = isset($descricaoEArr[$i]) ? sanitize($descricaoEArr[$i]) : "";
        ?>
          <div class="mb-2">
            <p class="mb-0"><strong><?php echo $cargo; ?></strong> – <?php echo $emp; ?> (<?php echo $perE; ?>)</p>
            <p class="ms-3 mb-0"><?php echo nl2br($descE); ?></p>
          </div>
        <?php endfor; ?>
      </section>
      <?php endif; ?>

      <?php if (!empty($skillsArr)): ?>
      <section class="mb-4">
        <h5 class="text-primary mb-2">Habilidades / Competências</h5>
        <ul class="list-inline">
          <?php foreach ($skillsArr as $skill): 
            $s = sanitize($skill);
            if (!$s) continue;
          ?>
            <li class="list-inline-item badge bg-secondary me-1"><?php echo $s; ?></li>
          <?php endforeach; ?>
        </ul>
      </section>
      <?php endif; ?>

      <footer class="text-center mt-5">
        <small class="text-muted">Currículo gerado em <?php echo date('d/m/Y'); ?></small>
      </footer>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
