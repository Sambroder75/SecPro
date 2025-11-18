const fileInput = document.getElementById('recipe-file');
const previewBox = document.querySelector('.file-upload-box');
const plusIcon = document.querySelector('.plus-icon');
const chooseText = document.querySelector('.choose-text');

fileInput.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            const imageUrl = e.target.result;
            
            previewBox.style.backgroundImage = `url(${imageUrl})`;
            previewBox.style.backgroundSize = 'cover';
            previewBox.style.backgroundPosition = 'center';
            previewBox.style.border = 'none';

            if (plusIcon) plusIcon.style.display = 'none';
            if (chooseText) chooseText.style.display = 'none';
        }

        reader.readAsDataURL(file);
    }
});