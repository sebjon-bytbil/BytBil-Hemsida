jQuery(function ($) {
    var createUser = $("#noconfirmation");
    var addUser = $("#adduser-noconfirmation");
    if (createUser.length) {
        // Check checkboxes
        createUser.attr("checked", "checked");
        addUser.attr("checked", "checked");

        // Hide rows
        createUser.parents("tr").hide();
        addUser.parents("tr").hide();
    }
});
