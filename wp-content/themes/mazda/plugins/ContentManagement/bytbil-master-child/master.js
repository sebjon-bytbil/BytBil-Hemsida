(function ($) {
    var updateSuccess = function (data, statustext, obj) {
        if (obj.status === 304) {
            alert("Siten är redan master, avbryter.");
        } else {
            alert("Mastersite uppdaterad");
        }
    };

    var updateError = function (data, status) {
        alert("Något gick fel.");

    };

    var updateForm = $(".update-form");
    updateForm.on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: ajaxurl,
            method: "post",
            data: {
                action: "updateNetworkMaster",
                blog_id: $('.update-form input').val()
            },
            success: updateSuccess,
            error: updateError
        });
    });
}(jQuery));
