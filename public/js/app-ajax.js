jQuery(()=> {
    $.fn.extend({
        printSection: function() {
            var frameName = 'printIframe';
            var doc = window.frames[frameName];
            if (!doc) {
                $('<iframe>').hide().attr('name', frameName).appendTo(document.body);
                doc = window.frames[frameName];
            }
            doc.document.body.innerHTML = this.html();
            doc.window.print();
            return this;
        }
    });
    //destroy resource
    $(".delete-resource").on('click', function(){
        const req_type = typeof $(this).data('request_method') == 'undefined' ? 'POST' :$(this).data('request_method')
        let req_data = {}
        if(req_type == 'POST')
        {
            req_data = $(this).data()
            if(typeof $(this).data('_token') == 'undefined')
            {
                let token = {
                    _token: $("input[name='_token']").val()
                }

                req_data = {...req_data, ...token}
            }
        }
        
        $.ajax({
            url: $(this).data('url'),
            type: req_type,
            data: req_data,
            beforeSend: ()=> {
                $(this).html("<span class='spinner-border spinner-border-sm'></span>deleting...");
                $(this).attr('disabled', true);
            }
        }).done((response) => {
            if(response.status === 200) {
                $(this).parent().parent().remove();
                $(".response").html(response.message)
                .addClass('alert alert-success fixed-bottom w-50').fadeOut(10000);
                return;
            }
            $(".response").html(response.message).addClass('alert alert-warning fade show');
            $(this).html('<i class="fas fa-trash-alt text-danger"></i>').attr('disabled', false);
        });
    });

    //other foods
    $('#other-foods-btn').on('click', function(){
        let input = "<div class='col-lg-4 mt-2'><input type='text' name='categories[]' class='form-control ml-1'/></div>";
        $('#other-foods').append(input);
    });

    // check supermarket exipry
    var request_uri = window.location.origin
    if(document.getElementById('usersBarCanvas'))
    {
        $.ajax({
            url: request_uri + '/supermarkets/expired',
            type: 'GET',
            data: {check_expiry: true},
            beforeSend: () => {
                 $(".sup-expiry").addClass('alert alert-info').html("<span class='spinner-border spinner-border-sm'></span> &nbsp; checking supermarkets exipry...")
            }
        }).done((response) => {
            setTimeout(() => {
                $(".sup-expiry").html(response)
            }, 2000);
            setTimeout(() => {
                $(".sup-expiry").fadeOut(5000)
            }, 5000);
        });
    }
    $.ajax({
        type: 'GET',
        url: request_uri + '/user/online',
        data: {}
    }).done(response => {
        $(".users-active-status").html(response)
    });

});

function filterTable(input='search', table='') {
    $("#"+input).on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#"+table+" tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
}
let settingsData = {form: '', btn: '', is_josn: false, images: []}

function request(settings = settingsData)
{
    let btnText = $("#"+ settings.btn).text();
    $("#"+settings.form).on('submit', function(event){
        event.preventDefault();
        let requestData = new FormData(this);
        if(settings.hasOwnProperty('images'))
        {
            if(settings.images.length >= 1) {
                for (const input of settings.images) {
                    requestData.append(input.name, input.value)
                }   
            }
        }
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: requestData,
            beforeSend: ()=> {
                $("#"+settings.btn).attr('disabled', true);
                $("#"+settings.btn).html("<i class='fa fa-spinner'></i> Processing...");
            },
            success: (response) => {
                let message = settings.hasOwnProperty('is_josn') ? response.message : response;
                let div = document.getElementById('response');
                div.classList.add('fixed-bottom','mb-25');
                div.style.width = "50%";
                $("#response").html(message);
                setTimeout(() => {
                    $("#response").animate({
                        'margin-left' : "50%",
                        'opacity' : '0',
                        },500);
                        window.location.reload();
                }, 4000);
            },
            complete: ()=> {
                $("#"+settings.btn).attr('disabled', false);
                $("#"+settings.btn).html(btnText);
                $(this).trigger('reset');
            }
        });
    });
}

function elementDataRequest(params = {}) {
    let selector = params.selector === 'class' ? "." : "#";
    $(selector+params.el).on('click', function(){
        let btnText = $(this).text();
        $.ajax({
            url: $(this).data('url'),
            type: params.method,
            data: $(this).data(),
            beforeSend: () => {
                $(this).attr('disabled', true);
                $(this).html("<i class='fa fa-spinner text-light'></i> processing...");
            },
            success: (response) => {
                let message = params.hasOwnProperty('is_josn') ? response.message : response;
                let div = document.getElementById('response');
                div.classList.add('fixed-bottom','mb-25');
                div.style.width = "50%";
                $("#response").html(message);
                setTimeout(() => {
                    $("#response").animate({
                        'margin-left' : "50%",
                        'opacity' : '0',
                        },500);
                        window.location.reload();
                }, 4000);
            },
            complete: ()=> {
                $(this).attr('disabled', false);
                $(this).html(btnText);
            }
        });
    });
}
