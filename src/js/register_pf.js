function validarForm() {
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var cep = document.getElementById("cep").value;
    var bairro = document.getElementById("bairro").value;
    var n = document.getElementById("n").value;
    var senha = document.getElementById("senha").value;
    var cpf = document.getElementById("cpf").value;
    var ddd = document.getElementById("ddd").value;
    var telefone = document.getElementById("telefone").value;
    var endereco = document.getElementById("endereco").value;
    var cidade = document.getElementById("cidade").value;
    var confirmarSenha = document.getElementById("confirmar_senha").value;

    if (
      nome === "" ||
      email === "" ||
      cep === "" ||
      bairro === "" ||
      n === "" ||
      senha === "" ||
      cpf === "" ||
      ddd === "" ||
      telefone === "" ||
      endereco === "" ||
      cidade === "" ||
      confirmarSenha === ""
    ) {
      alert("Por favor, preencha todos os campos!");
      return false;
    } else {
      alert("Formulário enviado com sucesso!");
      // Aqui você pode enviar o formulário para o servidor ou fazer qualquer outra ação desejada
      document.getElementById("cadastroForm").submit();
    }
}