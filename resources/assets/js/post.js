/**
 * Post javascript file
 *
 */

jQuery(document).ready(function($) {
    tinymce.init({
        selector: '#body',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        },
        theme: "modern",
        menubar: false,
        height: 400,
        plugins: [
            "autolink link image lists preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code codesample"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code codesample",
        image_advtab: true,

        external_filemanager_path: "/filemanager/",
        filemanager_title: "Chọn file",
        external_plugins: {
            "filemanager": "/filemanager/plugin.min.js"
        }
    });
});
