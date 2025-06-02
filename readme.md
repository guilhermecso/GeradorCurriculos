# Gerador de Currículo - CurrículoFácil

Este projeto é uma aplicação web simples para gerar currículos de forma dinâmica e intuitiva. O usuário preenche um formulário com seus dados pessoais, formação acadêmica, experiências profissionais, habilidades e um resumo profissional. Após o preenchimento, é possível visualizar uma prévia do currículo e imprimi-lo ou salvá-lo em PDF.

## Estrutura do Projeto

- **index.php**  
  Página principal com o formulário para preenchimento dos dados do currículo.

- **preview.php**  
  Página de visualização do currículo gerado a partir dos dados enviados pelo formulário.

- **assets/**
  - **css/style.css**  
    Estilos personalizados para o layout do formulário e da prévia do currículo.
  - **js/script.js**  
    Scripts para adicionar/remover dinamicamente formações, experiências e habilidades, além de calcular a idade automaticamente.

## Funcionalidades

- **Formulário Dinâmico:**  
  Adicione múltiplas formações acadêmicas e experiências profissionais sem recarregar a página.
- **Habilidades em Tags:**  
  Digite uma habilidade e pressione Enter para adicioná-la como uma tag removível.
- **Prévia do Currículo:**  
  Visualize o currículo formatado antes de imprimir ou salvar em PDF.
- **Impressão e PDF:**  
  Botão para imprimir ou salvar o currículo gerado em PDF.
- **Validação Simples:**  
  Campos obrigatórios e limites de caracteres para garantir um currículo bem estruturado.

## Como Usar

1. Abra o arquivo `index.php` em um servidor local (ex: XAMPP, WAMP, Laragon).
2. Preencha todos os campos do formulário conforme desejado.
3. Adicione quantas formações, experiências e habilidades quiser.
4. Clique em "Visualizar Currículo" para ver a prévia.
5. Na prévia, utilize o botão "Imprimir / Salvar como PDF" para exportar seu currículo.

## Tecnologias Utilizadas

- **PHP:** Processamento dos dados do formulário e geração da prévia.
- **HTML5 & CSS3:** Estrutura e estilização das páginas.
- **Bootstrap 5:** Layout responsivo e componentes visuais.
- **JavaScript:** Manipulação dinâmica do DOM para adicionar/remover campos e tags.
- **Bootstrap Icons:** Ícones visuais para botões e navegação.

## Observações

- O projeto não utiliza banco de dados; os dados são processados apenas em memória durante a sessão.
- Para funcionamento correto, é necessário rodar em um ambiente com suporte a PHP.

---

Desenvolvido para facilitar a criação de currículos de forma rápida, moderna e gratuita.