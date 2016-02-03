$(function(){

    $(window).on('hashchange', function() {
        //console.log(location.hash);
        var hash = location.hash;

        //$(".field_key-field_elasticaccess-hash input").val(hash + existing);
        $(".field_key-field_elasticaccess-hash input").val(hash);
    });

    $("#cleanSearch").on('click', function(){
        window.location.hash = "";
        $(window).trigger('hashchange');
    });
});
