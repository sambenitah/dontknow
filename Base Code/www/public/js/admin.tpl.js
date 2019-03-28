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

        var id = this.id.substr(5);
        var url = $("#img"+id+"").attr('src');

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
                            url : 'Pictures/deletePicture',
                            data: {id : id, url : url},
                            type : 'POST',
                            dataType: "json",
                            success : function(data){
                                window.location.reload(true);
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

//---------------   Show article  ------------------//


$(".crossDeleteArticle").click( function () {
    var id = this.id.substr(5);
    console.log(id);
    $.confirm({
        title: false,
        boxWidth: '500px',
        useBootstrap: false,
        content: '<p class="titleAlert">Are you sur ?</p><br><p class="textAlert">Do you want to delete this article ?</p>',
        type: 'dark',
        typeAnimated: true,
        buttons: {
            Delete: {
                text: 'Delete',
                btnClass: 'btn-dark',
                action: function(){
                    $.ajax({
                        url : 'Articles/deleteArticle',
                        data: {id : id},
                        type : 'POST',
                        dataType: "json",
                        success : function(data){
                            window.location.reload(true);
                        }
                    });
                }
            },
            close: function () {
            }
        }
    });
});



//---------------  Articledetail  ------------------//


tinymce.init({
    selector: '#textareaUpdateArticle',
    plugins: "autoresize",
    min_height: 500,
});


function isMobileDevice() {
    return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
};


function isMobileDevice() {
    return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
};











