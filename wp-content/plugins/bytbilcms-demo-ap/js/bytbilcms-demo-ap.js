jQuery(function ($) {
    $("#acf-field-already-sent").prop("disabled", "disabled");
    //Hides accesspackage child-posts
    $("#the-list tr.type-accesspaket:not(.level-0)").remove();

    //Count only parent posts, child-posts are hidden.
    var countRows = $("#the-list tr").length;
    $(".post-type-accesspaket .subsubsub .all .count").text("(" + countRows + ")");
    $(".post-type-accesspaket .subsubsub .publish .count").text("(" + countRows + ")");
});