jQuery(function($){
    $ = jQuery;
    if($('#createuser select[name="role"]').val() === "foretagsanvandare" ||
        $('#createuser select[name="role"]').val() === "foretagsadmin"){
            $("table.company").each(function(){
                $(this).css("display", "table-row");
            });
    }
});

jQuery(('#createuser select[name="role"]')).on("change",function($){
    $ = jQuery;
    if($(this).val() === "foretagsanvandare" || $(this).val() === "foretagsadmin"){
        $("#createuser table.company").css("display", "table-row");
    }else{
        $("#createuser table.company").css("display", "none");
    }
});

jQuery(('#adduser select[name="role"]')).on("change",function($){
    $ = jQuery;
    if($(this).val() === "foretagsanvandare" || $(this).val() === "foretagsadmin"){
        $("#adduser table.company").css("display", "table-row");
    }else{
        $("#adduser table.company").css("display", "none");
    }
});
