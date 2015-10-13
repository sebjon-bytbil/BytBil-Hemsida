jQuery(document).ready(function($){
    $.wp.wpColorPicker.prototype.options = {
        hide: true,
        palettes: ['#fff', '#151515', '#eb2227', '#86a6b2', '#ff8500', '#003057', '#fdb414', '#003690', '#1351d8'],
        mode: 'hsv',
        width: 320,
        change: function(event, ui){
            $(this).find('.wp-color-result').css('background-color', ui.color.toString());
            $(this).find('.wp-color-picker').val(ui.color.toString());
        }
    };
});
