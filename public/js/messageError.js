$message = $("div#messageError").text();

UIkit.notify({
    message : "<i class='uk-icon-exclamation-triangle'></i> " + $message,
    status  : "danger",
    timeout : "4000",
    pos     : "top-center"
});
