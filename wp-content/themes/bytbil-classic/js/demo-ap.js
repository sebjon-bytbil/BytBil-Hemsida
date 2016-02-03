/*----------------------------------------

 Written by: Tobias Franzén
 Last change: 2015-02-26

 -----------------------------------------*/

function generateCode() {

    // Define variables
    var alias = $("#alias").val();
    var criterias = $("#criterias").val();
    var view = $("#view").val();
    var jqueryver = "1.11.2";

    // Set default values
    if(alias === "") { alias = "basicclassic"; }
    if(criterias === "") { criterias = "AEQDUDIAAYAWDnkAAA__!"; }
    if(view === "") { view = "Lista"; }

    // Set up HTML code to be placed into text fields
    var htmlHead = "";
    htmlHead += '<script src="//code.jquery.com/jquery-' + jqueryver + '.min.js"><\/script>\n';
    htmlHead += '<script src="http://access.bytbil.com/' + alias + '/access/content/getcontent/1/access.iframe.host.js"><\/script>\n\n';
    htmlHead += '<script>\n';
    htmlHead += '  $.noConflict();\n';
    htmlHead += '  jQuery(function($) {\n';
    htmlHead += '    var iframe = $(\'#accessFrame\');\n';
    htmlHead += '    var iframeLoad = new Access.Iframe.Load({\n';
    htmlHead += '      packageName: "' + alias + '",\n';
    htmlHead += '      assortment: "' + criterias + '",\n';
    htmlHead += '      actionName: "' + view + '",\n';
    htmlHead += '      parentUrl: window.location,\n';
    htmlHead += '      idName: "objekt"\n';
    htmlHead += '    });\n';
    htmlHead += '    iframeLoad.load(iframe);\n';
    htmlHead += '  });\n';
    htmlHead += '<\/script>';

    $("#embedcode-head").val(htmlHead);
    $("#embedcode-body").val("<iframe id=\"accessFrame\" frameborder=\"0\" allowTransparency=\"true\"></iframe>");

    if( $("#show-codes").prop("checked") == true ) {
        $("#embedcodes").fadeIn();
    } else {
        $("#embedcodes").fadeOut();
    }

    // Display a "loading" message
    $("#loading").fadeIn();

    // Change the source of the cross-frame Javascript
    $("#jquery-source").attr("src", "//code.jquery.com/jquery-' + jqueryver + '.min.js");
    $("#js-source").attr("src", "http://access.bytbil.com/" + alias + "/access/content/getcontent/1/access.iframe.host.js");

    // Set up Iframe
    var iframe = $('#accessFrame');
    var iframeLoad = new Access.Iframe.Load({
        packageName: alias,
        assortment: criterias,
        actionName: view,
        parentUrl: window.location,
        scroll: false
    });
    setTimeout(function() {
        iframeLoad.load(iframe);
    },500);

    setTimeout(function() {
        $("html, body").animate({ scrollTop: 0 }, "fast");
    },500);
}

function isIE () {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
}

var setupHeight;

function adjustTop() {
    setTimeout(function() {
        setupHeight = $("#setup").height();
        if( $("#setup").css("position") == "fixed" ) {
            $("body").animate({
                paddingTop: setupHeight
            },200, function() {
            });
        }
    }, 500);
}

$(function () {

// Do these at page load
//--------------------------

    $('#accessFrame').load(function() {
        $("#loading").fadeOut();
        setTimeout(function() {
            $("html, body").animate({ scrollTop: 0 }, "fast");
        },100);
    });

    // Input placeholder fallback for older IE versions
    if( isIE() < 10 && isIE() != false ) {
        $("#alias").before("Alias:<br />");
        $("#criterias").before("Kriteriestr&auml;ng:<br />");
        $("#view").before("Listvy:<br />");
    }

    setupHeight = $("#setup").height();

// Actions performed by user
//--------------------------

    $("#setup-toggler button").click(function() {
        $("#setup-inner").slideToggle();
        $("#setup-toggler button").toggleClass("setup-open");

        if( $("#setup-toggler button").hasClass("setup-open") ) {
            $(this).html("<i class='fa fa-angle-up'></i> Dölj panel");
        } else {
            $(this).html("<i class='fa fa-angle-down'></i> Visa panel");
        }

        adjustTop();
    });

    $("#generateCode").click(function() {
        generateCode();
        adjustTop();
    });
    $(document).keypress(function(e) {
        if(e.which == 13) {
            generateCode();
            adjustTop();
        }
    });

    $("#hidecodes").click(function() {
        $("#embedcodes-inner").slideToggle();
        adjustTop();

        $("#hidecodes").toggleClass("codes-closed");

        if( $("#hidecodes").hasClass("codes-closed") ) {
            $(this).html("<i class='fa fa-angle-down'></i> Visa kod");
        } else {
            $(this).html("<i class='fa fa-angle-up'></i> Dölj kod");
        }
    });

    $(window).resize(function() {
       adjustTop();
    });

    // Change background color
    $("#option-bgcolor input[type='button']").click(function() {
        if( $("#option-bgcolor input[type='text']").val() !== "" ) {
            var hexCode = $("#option-bgcolor input[type='text']").val();

            var isHex = /(^#[0-9A-F]{6}$)|(^#[0-9A-F]{3}$)/i.test( hexCode );

            if(hexCode.indexOf("#") == -1 && isHex == true) {
                hexCode = "#" + hexCode;
            }

            $("body").css("background-color", hexCode );
        } else {
            $("body").css("background-color", "transparent" );
        }
    });

    // Switch platform
    $("#platform").change(function() {
        $("#accessFrameContainer").animate({
            width: $(this).val()
        }, 300, function() {
        });
        $(this).blur();
    });

    // Change width freely
    $("#option-width input[type='button']").click(function() {

        var widthVal = $("#option-width input[type='text']").val();

        if( $("#option-width input[type='text']").val() !== "" ) {

            if(widthVal.indexOf("px") == -1 && widthVal.indexOf("%") == -1) {
                widthVal = widthVal + "px";
            }

            $("#accessFrameContainer").animate({
                width: widthVal
            }, 300);
        } else {
            $("#accessFrameContainer").animate({
                width: "100%"
            }, 300);
        }
    });

    // Switch slug
    $("#slug-switch").change(function() {
        var url = window.location.href;
        url = url.replace(/\/$/, "");
        if (url.indexOf("://") > -1) {
            url = url.split('/');
        }

        var path;
        //handlare/handlarkod/
        if(url.length <=5){
            path = "";
        }
        //handlare/handlarkod/vy/
        else{
            path = "../"
        }
        window.location.href = path + $("#slug-switch").val() + "/";
    });

    $("button, input[type=button]").mouseup(function() {
       $(this).blur();
    });


// Tooltips
//--------------------------

    $(".has-tooltip").mouseover(function() {
        if($(this).next(".tooltip").length === 0) {
            $(this).after("<div class='tooltip'><span>" + $(this).attr("title") + "</span></div>");
            $(this).attr("title", "");
            $(this).next(".tooltip").css({
                "top" : $(this).offset().bottom,
                "left" : $(this).offset().left
            });
            $(this).next(".tooltip").fadeIn("fast");
        }
    });
    $(".has-tooltip").mouseout(function() {
        if($(this).next(".tooltip").length !== 0) {
            $(this).attr("title", $(this).next(".tooltip").text() );

            $(this).next(".tooltip").fadeOut("fast", function() {
                $(this).remove();
            });
        }
    });

    $(document).click(function() {
        $(".tooltip").fadeOut("fast");
    });

});