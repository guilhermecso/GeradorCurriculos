<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Gerador de Currículo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand text-primary" href="#">CurrículoFácil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#dadosPessoais">Dados Pessoais</a></li>
          <li class="nav-item"><a class="nav-link" href="#formacaoAcademica">Formação</a></li>
          <li class="nav-item"><a class="nav-link" href="#experienciaProfissional">Experiência</a></li>
          <li class="nav-item"><a class="nav-link" href="#habilidades">Habilidades</a></li>
          <li class="nav-item"><a class="nav-link" href="#resumoObjetivo">Resumo</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-5 mb-5">
    <form action="preview.php" method="POST" enctype="multipart/form-data">
      <section id="dadosPessoais" class="mb-5">
        <h3 class="mb-4 text-primary">Dados Pessoais</h3>
        <div class="row g-3">
          <div class="col-md-6">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: João da Silva" required>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@dominio.com" required>
          </div>

          <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="(11) 99999-9999" required>
          </div>
          <div class="col-md-6">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
          </div>

          <div class="col-md-6">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Rua, Número, Bairro, Cidade/UF" required>
          </div>
          <div class="col-md-6">
            <label for="linkedin" class="form-label">LinkedIn / GitHub (opcional)</label>
            <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/in/usuario">
          </div>
        </div>
      </section>

      <hr>

      <section id="formacaoAcademica" class="mb-5">
        <h3 class="mb-4 text-primary">Formação Acadêmica</h3>
        <div id="containerFormacoes"></div>
        <button id="btnAddFormacao" class="btn btn-outline-primary btn-sm mb-3">
          <i class="bi bi-plus-lg"></i> Adicionar Formação
        </button>
      </section>

      <hr>

      <section id="experienciaProfissional" class="mb-5">
        <h3 class="mb-4 text-primary">Experiência Profissional</h3>
        <div id="containerExperiencias"></div>
        <button id="btnAddExperiencia" class="btn btn-outline-primary btn-sm mb-3">
          <i class="bi bi-plus-lg"></i> Adicionar Experiência
        </button>
      </section>

      <hr>

      <section id="habilidades" class="mb-5">
        <h3 class="mb-4 text-primary">Habilidades / Competências</h3>
        <div class="mb-3">
          <label for="skillInput" class="form-label">Digite uma habilidade e pressione Enter</label>
          <input type="text" class="form-control" id="skillInput" placeholder="Ex.: JavaScript">
        </div>
        <div id="containerTags" class="mb-3"></div>
      </section>

      <input type="hidden" name="skills" id="skills_hidden">

      <hr>

      <section id="resumoObjetivo" class="mb-5">
        <h3 class="mb-4 text-primary">Resumo Profissional / Objetivo</h3>
        <div class="mb-3">
          <label for="resumo" class="form-label">Descreva em até 300 caracteres</label>
          <textarea class="form-control" id="resumo" name="resumo" rows="4" maxlength="300" placeholder="Ex.: Engenheiro de Software com ..." required></textarea>
          <div class="form-text"><span id="contador">0</span>/300 caracteres</div>
        </div>
      </section>

      <div class="nav-btns text-end">
        <button type="reset" class="btn btn-secondary">Limpar Tudo</button>
        <button type="submit" class="btn btn-primary">Visualizar Currículo</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js"></script>

  <script>
    const textareaResumo = document.getElementById("resumo");
    const contador = document.getElementById("contador");
    if (textareaResumo) {
      textareaResumo.addEventListener("input", function() {
        contador.textContent = this.value.length;
      });
    }

    const form = document.querySelector("form");
    form.addEventListener("submit", function(e) {
      const tags = document.querySelectorAll("#containerTags .badge");
      const arrHabilidades = [];
      tags.forEach(function(span) {
        const texto = span.textContent.trim();
        arrHabilidades.push(texto);
      });
      document.getElementById("skills_hidden").value = arrHabilidades.join(";");
    });
  </script>
</body>
</html>
