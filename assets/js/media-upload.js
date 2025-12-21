document.addEventListener('DOMContentLoaded', () => {
    console.log('Media JS DOM Ready');

    const btn = document.getElementById('coraMediaUploadBtn');
    const input = document.getElementById('coraMediaFileInput');

    console.log('Upload button:', btn);
    console.log('File input:', input);

    if (!btn || !input) {
        console.error('Upload elements missing');
        return;
    }

    btn.addEventListener('click', () => {
        console.log('Upload button clicked');
        input.click();
    });

    input.addEventListener('change', () => {
        console.log('Files selected:', input.files);
    });
});
