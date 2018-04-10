//function message OK
function messageDone()
{
    $message = $("div#messageDone").text();
    $message = $message.trim();

    if($message.length === 0)
    {
        $message = "OK";
    }

    UIkit.notification({
        message : "<span uk-icon='icon: check'></span> " + $message,
        status  : "success",
        timeout : "4000",
        pos     : "top-center"
    });

    return true;
}

//function message KO
function messageError()
{
    $message = $("div#messageError").text();
    $message = $message.trim();

    if($message.length === 0)
    {
        $message = "KO";
    }

    UIkit.notification({
        message : "<span uk-icon='icon: bolt'></span> " + $message,
        status  : "danger",
        timeout : "4000",
        pos     : "top-center"
    });

    return true;
}

//button remove (AJAX METHOD DELETE)
$(".ajaxTrash").click(function(){
    var urlId = $(this).attr("name");

    $.ajax({
        url         : urlId,
        contentType : "application/json",
        type        : "DELETE",
        error       : function(data) { console.warn(data); messageError(); },
        success     : function(data) { console.info(data); location.reload(); messageDone(); }
    });
});
