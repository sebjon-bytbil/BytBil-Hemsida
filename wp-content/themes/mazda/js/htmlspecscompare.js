jQuery(document).ready(function($) {
    $.ajax({
        url: 'http://www.mazda.se/Handlers/HtmlSpecsCompare.ashx',
        type: 'GET',
        dataType: 'html',
        data: specControls.getData($('#aspnetForm').serialize()),
        success: function (txt) {
            $('.mazdaSpecArea').html(txt);
        },
        error: function (err) {
        }
    });
});
