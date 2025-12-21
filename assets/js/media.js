jQuery(document).ready(function ($) {
    console.log('Cora Media JS Loaded');

    let mediaFrame;

    $('#coraMediaUpload').on('click', function (e) {
        e.preventDefault();

        console.log('Upload button clicked');

        // Reuse existing frame
        if (mediaFrame) {
            mediaFrame.open();
            return;
        }

        mediaFrame = wp.media({
            title: 'Upload Media',
            button: {
                text: 'Add to Media Library'
            },
            multiple: true
        });

        mediaFrame.on('select', function () {
            const selection = mediaFrame.state().get('selection');

            selection.each(function (attachment) {
                console.log('Selected:', attachment.toJSON());
            });

            // Simple reload to show new media
            window.location.reload();
        });

        mediaFrame.open();
    });
});
