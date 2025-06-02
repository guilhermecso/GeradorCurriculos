document.addEventListener("DOMContentLoaded", function() {
  const inputDataNascimento = document.getElementById("data_nascimento");

  const btnAddFormacao = document.getElementById("btnAddFormacao");
  const containerFormacoes = document.getElementById("containerFormacoes");

  let contadorFormacao = 0;

  btnAddFormacao.addEventListener("click", function(e) {
    e.preventDefault();
    contadorFormacao++;
    const divCard = document.createElement("div");
    divCard.classList.add("card-dinamico", "position-relative");
    divCard.innerHTML = `
      <button type="button" class="btn btn-sm btn-danger btn-remover" data-target="formacao-${contadorFormacao}">
        &times; Remover
      </button>
      <div class="mb-2">
        <label for="curso_${contadorFormacao}" class="form-label">Curso / Nível</label>
        <input type="text" class="form-control" id="curso_${contadorFormacao}" name="curso[]" placeholder="Ex.: Bacharelado em Engenharia ..." required>
      </div>
      <div class="mb-2">
        <label for="instituicao_${contadorFormacao}" class="form-label">Instituição</label>
        <input type="text" class="form-control" id="instituicao_${contadorFormacao}" name="instituicao[]" placeholder="Nome da instituição" required>
      </div>
      <div class="row mb-2">
        <div class="col-md-6">
          <label for="periodoF_${contadorFormacao}" class="form-label">Período</label>
          <input type="text" class="form-control" id="periodoF_${contadorFormacao}" name="periodoFormacao[]" placeholder="Ex.: 2019 – 2023" required>
        </div>
        <div class="col-md-6">
          <label for="descricaoF_${contadorFormacao}" class="form-label">Descrição (opcional)</label>
          <textarea class="form-control" id="descricaoF_${contadorFormacao}" name="descricaoFormacao[]" rows="2" placeholder="Descrição breve (opcional)"></textarea>
        </div>
      </div>
    `;
    divCard.setAttribute("id", `formacao-${contadorFormacao}`);
    containerFormacoes.appendChild(divCard);
  });

  containerFormacoes.addEventListener("click", function(e) {
    if (e.target && e.target.matches(".btn-remover")) {
      const idAlvo = e.target.getAttribute("data-target");
      const elementoRemover = document.getElementById(idAlvo);
      if (elementoRemover) {
        elementoRemover.remove();
      }
    }
  });

  const btnAddExperiencia = document.getElementById("btnAddExperiencia");
  const containerExperiencias = document.getElementById("containerExperiencias");

  let contadorExperiencia = 0;

  btnAddExperiencia.addEventListener("click", function(e) {
    e.preventDefault();
    contadorExperiencia++;
    const divCard = document.createElement("div");
    divCard.classList.add("card-dinamico", "position-relative");
    divCard.innerHTML = `
      <button type="button" class="btn btn-sm btn-danger btn-remover" data-target="exp-${contadorExperiencia}">
        &times; Remover
      </button>
      <div class="mb-2">
        <label for="cargo_${contadorExperiencia}" class="form-label">Cargo / Função</label>
        <input type="text" class="form-control" id="cargo_${contadorExperiencia}" name="cargo[]" placeholder="Ex.: Desenvolvedor Júnior" required>
      </div>
      <div class="mb-2">
        <label for="empresa_${contadorExperiencia}" class="form-label">Empresa</label>
        <input type="text" class="form-control" id="empresa_${contadorExperiencia}" name="empresa[]" placeholder="Nome da empresa" required>
      </div>
      <div class="mb-2">
        <label for="periodoE_${contadorExperiencia}" class="form-label">Período (início – término)</label>
        <input type="text" class="form-control" id="periodoE_${contadorExperiencia}" name="periodoExperiencia[]" placeholder="Ex.: Jan/2022 – Dez/2023" required>
      </div>
      <div class="mb-2">
        <label for="descricaoE_${contadorExperiencia}" class="form-label">Descrição das Atividades</label>
        <textarea class="form-control" id="descricaoE_${contadorExperiencia}" name="descricaoExperiencia[]" rows="3" placeholder="Descreva responsabilidades" required></textarea>
      </div>
    `;
    divCard.setAttribute("id", `exp-${contadorExperiencia}`);
    containerExperiencias.appendChild(divCard);
  });

  containerExperiencias.addEventListener("click", function(e) {
    if (e.target && e.target.matches(".btn-remover")) {
      const idAlvo = e.target.getAttribute("data-target");
      const elementoRemover = document.getElementById(idAlvo);
      if (elementoRemover) {
        elementoRemover.remove();
      }
    }
  });

  const inputSkill = document.getElementById("skillInput");
  const containerTags = document.getElementById("containerTags");

  if (inputSkill) {
    inputSkill.addEventListener("keypress", function(e) {
      if (e.key === "Enter") {
        e.preventDefault();
        const texto = this.value.trim();
        if (texto !== "") {
          const span = document.createElement("span");
          span.classList.add("badge", "bg-primary", "me-1", "mb-1");
          span.innerHTML = `${texto} <i class="bi bi-x-circle ms-1 removable-skill" style="cursor:pointer;"></i>`;
          containerTags.appendChild(span);
          this.value = "";
        }
      }
    });
  }

  containerTags.addEventListener("click", function(e) {
    if (e.target && e.target.matches(".removable-skill")) {
      e.target.parentElement.remove();
    }
  });
});
