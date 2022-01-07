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
        $.ajax({
            url: $(this).data('url'),
            type: 'POST',
            data: {
                delete: true, 
                id: $(this).data('resource-id'),
                _token: $("input[name='_token']").val(),
            },
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
            if(settings.image.length >= 1) {
                for (const input of settings.image) {
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
