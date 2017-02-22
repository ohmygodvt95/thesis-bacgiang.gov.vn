jQuery(document).ready(function($) {
    if ($('.type').val() == 'document'){
        $('#more').show(400);
    }
    else{
        $('#more').hide();
    }

    $('.type').change(function() {
        if ($(this).val() == 'document'){
            $('#more').show(400);
        }
        else{
            $('#more').hide(300);
        }
    });
});
