$('.btnUserLogout').on("click", function (e) {
    e.preventDefault();
    let url = $(this).attr("href");
    $.ajax({
        url: url,
        type: "POST",
        dataType: "JSON",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')}
    }).done(function (response) {
        if (response.hasOwnProperty('status')) {
            if (response.status) {
                if (response.hasOwnProperty('redirect')) {
                    return window.location.replace(response.redirect);
                }
            }
        }
    });
});
