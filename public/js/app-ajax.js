jQuery(()=> {
    //destroy resource
    $(".delete-resource").on('click', function(){
        $.ajax({
            url: $(this).data('url'),
            type: 'POST',
            data: {
                delete: true, 
                id: $(this).data('resource-id'),
                _token: $("input[name='_token']").val(),
                _method: $("input[name='_method']").val()
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


});

function filterTable(input='search', table='') {
    $("#"+input).on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#"+table+" tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
}
