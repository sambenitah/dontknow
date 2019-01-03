$( document ).ready(function() {

    var width = $(document).width();
    if (width < 768) {
        $("#leftPartMainSection").attr("class", "col col-12");
        $("#rightPartMainSection").attr("class", "col col-12");
    }

    $(window).resize(function(){
        var width = $(document).width();

        if (width < 768) {
            $("#leftPartMainSection").attr("class", "col col-12");
            $("#rightPartMainSection").attr("class", "col col-12");
        }else if(width > 768){
            $("#leftPartMainSection").attr("class", "col col-2");
            $("#rightPartMainSection").attr("class", "col col-10");

        }
    });
});
