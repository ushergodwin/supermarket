jQuery(()=> {
    $("#itemSearchForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: $(this).data('url'),
            data: $(this).serializeArray(),
            beforeSend: () => {
                $("#search-btn").attr('disabled', true);
                $("#loading").html("<span class='spinner-border spinner-border-sm'></span> Loading Result...");
            }
        }).done((response) => {
            $("#response").html(response);
            $("#search-btn").attr('disabled', false);
                $("#search-btn").html("Search &nbsp; <i class='fa fa-search'></i>");
        });
    });
    $("#itemInput").on('keyup', function(e){
        $.ajax({
            type: 'GET',
            url: $(this).data('url'),
            data: {
                item: $(this).val(),
                supermarket: $("#sup_name").val(),
                suggest: true
            }
        }).done((response) => {
            $("#itemResponse").html(response);
        });
    });

    $("#sup_name").on('change', () => {
        $("#itemInput").removeAttr('disabled')
    })
});

function autoFillSearch(item_name="")
{
   document.getElementById('itemInput').value = item_name;
   document.getElementById('itemResponse').innerHTML = "";
   $("#itemSearchForm").trigger('submit');
}
