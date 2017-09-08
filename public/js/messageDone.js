$message = $("div#messageDone").text();

UIkit.notify({
    message : "<i class='uk-icon-check'></i> " + $message,
    status  : "success",
    timeout : "4000",
    pos     : "top-center"
});
