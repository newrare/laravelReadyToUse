//load page completed
$(window).load(function(){
    $("#loadLogo").removeClass("uk-icon-spin");
});

//link
$("a").click(function() {
    if( ($(this).attr("id") != "buttonLink") && (!$(this).hasClass("uk-close")) )
    {
        $("#loadLogo").addClass("uk-icon-spin");
    }
});

//button
$(".uk-button").click(function() {
    if($(this).attr("id") != "buttonLink")
    {
        $("#loadLogo").addClass("uk-icon-spin");
    }
});

//onClickForm
$(".onClickForm").click(function(){
    $(this).closest("form").submit();
});

//button remove (AJAX METHOD DELETE)
$(".uk-icon-trash").click(function(){
    var urlId = $(this).attr("name");

    $.ajax({
        url         : urlId,
        contentType : "application/json",
        type        : "DELETE",
        success : function(data){
            console.info(data);
        },
        error : function(data){
            console.warn(data);
        }
    });

    location.reload();
});
