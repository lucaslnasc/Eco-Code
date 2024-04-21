// função para redirecionamento
function BackInToCadastreSe() {
    location.href = './cadastre-se.html'
}

function CadastroPF() {
    location.href = '../views/cadastro_pf.html'
}

$(document).ready(function(){
    $('#cpf').mask('000.000.000-00');
});