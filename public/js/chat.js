jQuery(() => {
    $(".start-chat").on('click', function(){
        const chat_reason = $("#reason").val();
        if(reason.length < 5)
        {
            return alert("Please provide the reason for starting this chat")
        }

        $.ajax({
            type: "POST",
            url: $(this).data('url'),
            data: {
                request_by: $(this).data('request_by'),
                reason: chat_reason,
                session_id: $(this).data('session_id'),
                sent_on: $(this).data('sent_on'),
                sent_at: $(this).data('sent_at'),
                _token: $(this).data('_token')
            },
            beforeSend: () => {
                $(this).attr('disabled', true);
                $(this).html("<span class='spinner-border spinner-border-sm'></span> starting...")
            },
            success: response => {
                if(response.status === 200)
                {
                    $(".response").html(response.message).addClass('alert alert-success')
                }else {
                    $(".response").html(response.message).addClass('alert alert-danger')
                    
                }
            },
            complete: () => {
                $(this).html("<span class='spinner-border spinner-border-sm'></span> waiting for respondent...")
            }
        })
    })
    
    if(document.getElementById('start-chat'))
    {
        let respondent = setInterval(() => {
            $.ajax({
                type: "GET",
                url: window.location.origin + '/chat/respondent',
                data: {}
            }).done(response => {
                if(response.status === 200)
                {
                    $(".start-chat").toggleClass('d-none')
                    $(".end-chat").toggleClass('d-none')
                    $(".chat-header").html(response.message)
                    alert("A respondent has joined you in the current chat request.");
                    clearInterval(respondent)
                    window.location.href = response.redirect
                }
                $(".chat-wait").html(response.message)
            })
        }, 2000);
    }


    if(document.getElementById('chat-requests'))
    {
        setInterval(() => {
            $.ajax({
                type: "GET",
                url: window.location.origin + '/chat/fetch/requests',
                data: {},
                beforeSend: () => {
                    $("#chat-requests").html("<span class='spinner-border spinner-border-sm'></span> fetching chat requests...")
                }
            }).done(response => {
                $("#chat-requests").html(response)
            })
        }, 1000 * 10);
    }

    //chat-body
    if(document.getElementById('chat-body'))
    {
        let chatHasEnded = setInterval(() => {
            $chat_session = $("#send").data('session_id');
            $.ajax({
                type: "GET",
                url: window.location.origin + '/chat/status/' + $chat_session,
                data: {}
            }).done(response => {
                if(response.status === 200)
                {
                    $("#message").val("This chat has been ended!")
                    $("#message").attr('readonly', true)
                    $("#send").attr("disabled", true)
                    clearInterval(chatHasEnded)
                }
            })
        }, 5000);

        $("#message").on('keyup', function(){
            typing(true)
        });
    }

    $("#send").on('click', () => {
        sendMessage()
        typing(false)
    })

    $(".end-chat").on('click', function(){
        let conf = confirm("End chat session?")
        if(!conf)
        {
            return false
        }
        $.ajax({
            type: 'POST',
            url: $(this).data('url'),
            data: $(this).data(),
            beforeSend: () => {
                $(this).attr("disabled", true)
                $(this).html("<span class='spinner-border spinner-border-sm'></span> eding chat...")
            }
        }).done(response => {
            if(response.status === 200)
            {
                alert(response.message)
                window.location.href = window.location.origin + '/admin/dashboard'
            }else {
                $(".response").html(response.message).addClass('alert alert-danger')
                
            }
            $(this).attr("disabled", false)
            $(this).html("End Chat")
        })
    })

    // //send message on ctrl + enter
    // $("#message").on('keydown', function(event){
    //     if (event.ctrlKey && event.keyCode === 13) {
    //         sendMessage()
    //         typing(false)
    //       }
    // })
})

function sendMessage()
{
    $chat_session = $("#send").data('session_id');
    if($chat_session.length < 1)
    {
        alert("Please start a chat session to send a message")
        return
    }
    $.ajax({
        type: 'POST',
        url: $("#send").data('url'),
        data: {
            message: $("#message").val(),
            sender: $("#send").data('sender'),
            receiver: $("#send").data('receiver'),
            _token: $("#send").data('_token'),
            session_id: $("#send").data('session_id')
        },
        beforeSend: () => {
            $("#send").attr('disabled', true)
        },
        success: response => {
            if(response.status === 200)
            {
                $("#message").val("")
            }
        },
        complete: () => {
            $("#send").attr('disabled', false)
            typing(false)
        }
    })
}

function getMessage()
{
    let session_id = $("#send").data('session_id')
    $.ajax({
        type: 'GET',
        url: window.location.origin + '/chat/get/' + session_id,
        data: {},
        success: response => {
            $(".chat-body").html(response)
        },
        complete: () => {
            userTyping();

            function userTyping() {
                scrollSmoothToBottom('chat-body');
                $.ajax({
                    type: "GET",
                    url: `${window.location.origin}/chat/typing/get/${$("#send").data('receiver')}`,
                    data: {},
                    cache: false,
                }).done(res => {
                    $(".user-status").html(res.message);
                });
            }
        }
    });
}

setInterval(getMessage, 2000);
function scrollSmoothToBottom (id) {
    var div = document.getElementById(id);
    $('#' + id).animate({
       scrollTop: div.scrollHeight - div.clientHeight
    }, 500);
 }

 function typing(is_typing = true)
 {
     let status = is_typing ? "typing" : "online"
    $.ajax({
        type: "GET",
        url: `${window.location.origin}/chat/typing/set/${$("#send").data('sender')}/${status}`,
        data: {}
    }).done();
 }
 