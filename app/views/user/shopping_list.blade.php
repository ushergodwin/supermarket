@extends('partials.user.base')
@section('content')
<section class="contents">
    <section class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-8">
                <h4>Shopping Lists</h4>
                <div class="row">
                    @if (!empty($collection))
                        @foreach ($collection as $item)
                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header py-1">
                                        {{ $item->list_name}}
                                    </div>
                                    <div class="card-body">
                                        <h5>List Items</h5>
                                        @php
                                            $shoppingListItems = DB('shopping_list_items')->where('shopping_list_id', $item->id)->get();
                                            $total = $no = 0;
                                        @endphp
                                        @if (!empty($shoppingListItems))
                                            <table class="table table-striped table-bordered table-dark">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Item Name</th>
                                                    <th>Price</th>
                                                    <th>Location</th>
                                                    <th>Supermarket</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($shoppingListItems as $items)
                                                        @php
                                                            $total += $items->item_price;
                                                            $no++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $no }}</td>
                                                            <td>{{ $items->item_name }}</td>
                                                            <td>{{ number_format($items->item_price, 2)}}</td>
                                                            <td>{{ "column " .  $items->item_column_number . " " . $items->item_position }}</td>
                                                            <td>{{ $items->supermarket }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="4">TOTAL COST </td>
                                                        <th>UGX: {{ number_format($total, 2) }}</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-{{$item->list_status == 'active' ? 'primary' : 'success'}}"
                                        id="diactivate-list" 
                                        data-list_id="{{ $item->id }}"
                                        data-url="{{ url('user/dashboard/lists/diactivate') }}"
                                        data-_token="{{ _token() }}"
                                         {{$item->list_status == 'active' ? '' : 'disabled'}}><i class="fa fa-check-circle"></i> {{ $item->list_status == 'active' ? "Mark List Shopped" : "List Shopped" }}</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <h4>Create a Shopping List</h4>
                <div class="response" id="response"></div>
                <div class="card card-body shadow mt-2">
                    <form action="{{ url('user/dashboard/lists/create') }}" method="POST" id="listForm">
                        @csrf
                        <div class="form-group">
                            <label for="list_name" class="w-100">
                                List Name
                                <input type="text" name="list_name" class="form-control"
                                 value="{{ date("D-d-M-Y-H:i:s") }}_list"/>
                            </label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success" id="list-btn">Create List</button>
                        </div>
                    </form>

                    <div class="row">
                        @if (!empty($lists))
                            @foreach ($lists as $item)
                                <div class="col-lg-12 mt-2">
                                    <div class="card card-body {{ $item->list_status == 'active' ? 'border-success' : '' }}">
                                        <a href="#" class="stretched-link">
                                            <h4>{{ $item->list_name }}</h4>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="response" id="response"></div>
            </div>
        </div>
    </section>
</section>
@endsection

@section('scripts')
    <script>
        request({form: 'listForm', btn: 'list-btn'});
        elementDataRequest({selector: 'id', el: 'diactivate-list', method: 'POST'})
    </script>
@endsection