$( document ).ready(function() {
    var width = $(document).width();

    $(".figurePicture").mouseover(function() {
        var id = this.id;
        $("#cross"+id+"").css("visibility", "visible");
    });

    $(".figurePicture" ).mouseleave(function() {
        var id = this.id;
        $("#cross"+id+"").css("visibility", "hidden");
    });


    $(".crossDeletePicture").click(function () {

        var id = this.id;
        var idfinal = id.substr(5);
        var url = $("#img"+idfinal+"").attr('src');

        $.confirm({
            title: false,
            boxWidth: '500px',
            useBootstrap: false,
            content: '<p class="titleAlert">Are you sur ?</p><br><p class="textAlert">Do you want to delete this picture ?</p>',
            type: 'dark',
            typeAnimated: true,
            buttons: {
                Delete: {
                    text: 'Delete',
                    btnClass: 'btn-dark',
                    action: function(){
                        $.ajax({
                            url : '/deletePicture',
                            data: {id : idfinal, url : url},
                            type : 'POST',
                            dataType: "json",
                            success : function(){
                                document.location.reload(true);
                            }
                        });
                    }
                },
                close: function () {
                }
            }
        });
    });
});

//---------------------------------//



$( document ).ready(function() {
    $(".Article").click(function () {
        var id = this.id;
        $.ajax({
            url : '/deletePicture',
            data: {id : idfinal, url : url},
            type : 'POST',
            dataType: "json",
            success : function(){
                document.location.reload(true);
            }
        });
    });
});