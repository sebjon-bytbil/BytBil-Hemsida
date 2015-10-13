$(function(){

    $("#SwitchButton").on("click", function(){
        $("#Search").fadeIn(200);
        $("#FreeTextSearch").hide();
        //$(this).attr("id", "ExpandButton");
        $(this).hide();
        $("#ExpandButton").css("display", "inline-block");

    });

    $("#ExpandButton").on('click', function(){
        $("#secondary-view").slideToggle("slow");
    });

    $('.clean-btn').each(function(){
        var $this = $(this);

        $this.on('click', function(){
            var addressBar = $(this).parents('[data-app="elasticaccesspackage"]').find("#addressBar");
            addressBar.val("#");
            //Clean stuff and trigger list reload
            $("#SearchButton").attr("href", "");
            $("#FreeTextSearch").val("");
            $("#FreeTextSearch").trigger("change")
        });
    });

    $('[data-app="elasticaccesspackage"]').each(function(){
        var $this = $(this);
        $(this).on('click change input', 'input', function(){
            setTimeout(function(){
                updateField($this);
            }, 10);
        });
        $(this).on('click', 'a', function(){
            setTimeout(function(){
                updateField($this);
            }, 10);
        });
    });

    function updateField($this){
        $self = $this;
        var hash_field = $self.find("[ng-address-bar] input").val();
        hash_field = hash_field.split("#");
        hash_field = hash_field[1];
        if(!hash_field){
            hash_field = "";
        }
        var searchBtn = $self.find(".search-btn");
        var searchBtn_href = searchBtn.attr("href");
        var base_href = searchBtn_href.split("#");
        var new_url = base_href[0] + "#" + hash_field;
        searchBtn.attr("href", new_url);
    };
});