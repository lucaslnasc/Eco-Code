document.addEventListener('DOMContentLoaded', function () {
    const fotoInput = document.getElementById('foto');
    const videoInput = document.getElementById('video');
    const previewImageContainer = document.getElementById('preview-image');
    const previewVideoContainer = document.getElementById('preview-video');

    fotoInput.addEventListener('change', function (event) {
        showPreview(event.target, previewImageContainer);
    });

    videoInput.addEventListener('change', function (event) {
        showPreview(event.target, previewVideoContainer);
    });

    function showPreview(input, container) {
        const files = input.files;
        if (files && files[0]) {
            const reader = new FileReader();

            reader.onload = function (event) {
                if (input.accept.includes("image")) {
                    const previewImage = document.createElement('img');
                    previewImage.width = 115;
                    previewImage.height = 100;
                    previewImage.src = event.target.result;
                    container.innerHTML = ''; // Limpa o conteúdo anterior
                    container.appendChild(previewImage); // Adiciona a prévia da imagem ao container
                } else if (input.accept.includes("video")) {
                    const previewVideo = document.createElement('video');
                    previewVideo.width = 115;
                    previewVideo.height = 100;
                    previewVideo.controls = true;
                    const source = document.createElement('source');
                    source.src = event.target.result;
                    previewVideo.appendChild(source);
                    container.innerHTML = ''; // Limpa o conteúdo anterior
                    container.appendChild(previewVideo); // Adiciona a prévia do vídeo ao container
                }
            };

            reader.readAsDataURL(files[0]);
        }
    }
});