@extends('partials.user.base')
@section('content')
    <section class="contents">
        <section class="container-fluid">
            <div class="row mt-2">
                @foreach ($collection as $item)
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-body shadow">
                                <h4 class="font-weight-bold">{{ $item->name }}</h4>
                                <h6 class="mt-1">Price: UGX {{ number_format($item->price, 2)}} /=</h6>
                                <h6 class="mt-1 text-muted">Location: Column {{ $item->column_number }}, on the {{ strtoupper(str_replace('-', ' ', $item->position)) }} side.</h6>
                            </div>
                            <div class="card-footer">
                                <a href="javascript:;" class="stretched-link shopping-list"
                                data-item_name="{{ $item->name }}"
                                data-item_price="{{ $item->price }}"
                                data-item_column_number="{{ $item->column_number }}"
                                data-item_position="{{ $item->position }}"
                                data-supermarket="{{ $supermarket }}"
                                data-url="{{ url('user/dashboard/shopping-list') }}"
                                data-_token="{{ _token() }}"> Add Items to Shopping List
                                    <span data-feather="shopping-cart" class="nav-icon"></span> 
                                </a>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
            <div class="fixed-bottom response"></div>
        </section>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        jQuery(()=> {
            $(".shopping-list").on('click', function(){
                $(this).html("<span class='spinner-border spinner-border-sm'></span> adding item...");
                $.ajax({
                    url: $(this).data('url'),
                    type: "POST",
                    data: $(this).data()
                }).done((response) => {
                    $(this).html("Add Item to Shopping List");
                    $(".response").html(response).fadeOut(10000);
                });
            });
        });
    </script>
@endsection