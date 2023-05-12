const RegisterForm = document.getElementById("registro-usuario-form");
const msgAlertErroLogin = document.getElementById("msgAlertErroRegister");

RegisterForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  if (document.getElementById("nome").value === "") {
    msgAlertErroRegister.innerHTML =
      "<span id='msgAlertErroRegister' style='text-size: 12pt;color: #D50000;'>Erro: Necessário preencher o campo nome!</span>";
  } else if (document.getElementById("sobrenome").value === "") {
    msgAlertErroRegister.innerHTML =
      "<span id='msgAlertErroRegister' style='text-size: 12pt;color: #D50000;'>Erro: Necessário preencher o campo sobrenome!</span>";
  } else if (document.getElementById("email").value === "") {
    msgAlertErroRegister.innerHTML =
      "<span id='msgAlertErroRegister' style='text-size: 12pt;color: #D50000;'>Erro: Necessário preencher o campo e-mail!</span>";
  } else if (document.getElementById("telefone").value === "") {
    msgAlertErroRegister.innerHTML =
      "<span id='msgAlertErroRegister' style='text-size: 12pt;color: #D50000;'>Erro: Necessário preencher o campo telefone!</span>";
  } else if (document.getElementById("senha").value === "") {
    msgAlertErroRegister.innerHTML =
      "<span id='msgAlertErroRegister' style='text-size: 12pt;color: #D50000;'>Erro: Necessário preencher o campo senha!</span>";
  } else if (document.getElementById("confirmar-senha").value === "") {
    msgAlertErroRegister.innerHTML =
      "<span id='msgAlertErroRegister' style='text-size: 12pt;color: #D50000;'>Erro: Necessário preencher o campo confirmar-senha!</span>";
  } else if (
    document.getElementById("senha").value !=
    document.getElementById("confirmar-senha").value
  ) {
    msgAlertErroRegister.innerHTML =
      "<span id='msgAlertErroRegister' style='text-size: 12pt;color: #D50000;'>Erro: As senhas digitas não são iguais!</span>";
  } else {
    const dadosForm = new FormData(RegisterForm);

    const dados = await fetch("../projeto_tcc/content/login_validate.php", {
      method: "POST",
      body: dadosForm,
    });

    const resposta = await dados.json();

    if (resposta["erro"]) {
      msgAlertErroLogin.innerHTML = resposta["msg"];
    } else {
      loginForm.reset();
      location.reload();
    }
  }
});
