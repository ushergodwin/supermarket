$(document).ready(function() {
    $("#loginForm").on('submit', function(e) {
        e.preventDefault()
        const url = $(this).attr('action')
        $.ajax({
            url: url,
            type: "POST",
            data: $(this).serializeArray(),
            beforeSend: () => {
                $(".response").html("<span class='spinner-border spinner-border-sm text-info'></span> Authenticating")
                $(".login-btn").attr("disabled", true)
            },
            success: (data) => {
                let response = JSON.parse(data)
                let responseDiv = $(".response");
                if (response.status === "Authenticated") {
                    responseDiv.addClass('alert alert-success fade show w-50')
                    responseDiv.html("<i class='fas fa-check-circle text-success'></i> " + response.status)
                    window.location.href = response.redirect;
                } else {
                    responseDiv.addClass('alert alert-warning fade show');
                    responseDiv.html("<i class='fas fa-exclamation-triangle text-warning'></i> " + response.status)
                }
            },
            complete: () => {
                $(".login-btn").attr("disabled", false);
            }
        });
    });

    $("#candidateForm").on('submit', function(e) {
        e.preventDefault();
        let url = $(this).attr('action');
        let form_data = new FormData(document.getElementById('candidateForm'));
        form_data.append('photo', $('#photo').val());
        $.ajax({
            url: url,
            type: 'post',
            processData: false,
            contentType: false,
            cache: false,
            data: form_data,
            enctype: 'multipart/form-date',
            beforeSend: () => {
                $(".add-candidate-btn").attr("disabled", true);
                $(".candidate-response").html("<span class='spinner-border spinner-border-sm text-primary'></span> adding...");
            },
            success: (data) => {
                $(".candidate-response").html(data);
            },
            complete: () => {
                $(".add-candidate-btn").attr('disabled', false);
                $("#candidateForm").trigger('reset');
            }
        });
    });

    //vote
    $("#voteForm").on('submit', function(e) {
        e.preventDefault();
        let url = $(this).attr('action');
        $.ajax({
            url: url,
            type: 'post',
            data: $(this).serializeArray(),
            beforeSend: () => {
                $("#vote-btn").attr('disabled', true);
                $(".vote-response").html("<span class='spinner-border spinner-border-sm text-primary'></span> voting...")
            },
            success: (response) => {
                $(".vote-response").html(response);
            },
            complete: () => {
                let xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        document.getElementById('vote-count').innerHTML = this.responseText + ' Votes';
                    }
                }
                let cid = document.getElementById('cid');
                let url = document.getElementById('base').value + "/";
                xhr.open('get', url + 'VoteController/voteCount?cid=' + cid.value);
                xhr.send();
            }
        });
    });

    $("#show-password").on('click', function() {
        $("#hide-password").toggleClass('d-none');
        $(this).toggleClass('d-none');
        $("#password").attr('type', 'text');
    });
    $("#hide-password").on("click", function() {
        $(this).toggleClass('d-none')
        $("#show-password").toggleClass('d-none')
        $("#password").attr('type', 'password');
    });

});


//pure JS
function extractFilename(path) {
    if (path.substr(0, 12) === "C:\\fakepath\\")
        return path.substr(12); // modern browser
    var x;
    x = path.lastIndexOf('/');
    if (x >= 0) // Unix-based path
        return path.substr(x + 1);
    x = path.lastIndexOf('\\');
    if (x >= 0) // Windows-based path
        return path.substr(x + 1);
    return path; // just the filename
}
$(window).on('load', function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
});