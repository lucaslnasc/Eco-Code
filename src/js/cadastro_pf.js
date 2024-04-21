// função para redirecionamento
function BackIn(){
    location.href = '../views/cadastre-se.html'
}

function CadastroPF() {
    location.href = '../views/cadastro_pf.html'
}

$(document).ready(function(){
    $('#cpf').mask('000.000.000-00');
});