

function CadastroPF() {
    location.href = '../views/cadastro_pf.html'
}

// função para fazer validações

function validate() {
    var nome = document.getElementById('nome')
    var email = document.getElementById('email')
    var cep = document.getElementById('cep')
    var bairro = document.getElementById('bairro')
    var numero = document.getElementById('n')
    var senha = document.getElementById('Senha')
    var cpf = document.getElementById('cpf')
    var ddd = document.getElementById('ddd')
    var telefone = document.getElementById('telefone')
    var endereco = document.getElementById('endereco')
    var cidade = document.getElementById('cidade')
    var confirmar_senha = document.getElementById('confirmar_senha')

    var validate_null_input = nome != null && email != null && cep != null && bairro != null && numero != null && senha != null && cpf != null && ddd != null && telefone != null && endereco != null && cidade != null && confirmar_senha != null

    if (validate_null_input) {
        var input = document.getElementsByTagName('input')
        input.style.border = 'green'
    } else {
        return 'preencha os campos corretamente'
    }
}