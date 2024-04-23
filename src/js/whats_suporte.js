// Defina uma função para lidar com o redirecionamento para o WhatsApp
function redirectToWhatsApp() {
    // Número de telefone para o WhatsApp
    var phoneNumber = "27999943806"; // Adicione o código do país antes do número

    // Construa o URL do WhatsApp com o número de telefone
    var whatsappURL = "https://api.whatsapp.com/send?phone=" + phoneNumber;

    // Redirecione para o WhatsApp
    window.location.href = whatsappURL;
}
// Seletor para o botão do WhatsApp
var whatsappButton = document.getElementById("whatsappButton");

// Adicione um evento de clique ao botão
whatsappButton.addEventListener("click", redirectToWhatsApp);