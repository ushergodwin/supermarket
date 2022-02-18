@extends('partials.user.base')
@section('content')
<section class="contents">
    <section class="container-fluid">
        <div class="row mt-3">
            <div class="col-lg-12">
                <h4><u>Search For Supermarket Items to shop</u></h4>
                <form action="" method="GET" id="itemSearchForm" class="mt-3" data-url="{{ url('user/dashboard/item/search') }}">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="supermarket" class="w-100">
                                Supermarket 
                                <select name="supermarket" class="form-control" id="sup_name" required>
                                    <option value="">-- select -- supermarket</option>
                                    @foreach ($collection as $item)
                                        <option value="{{ $item->db_name }}"> {{ strtoupper($item->name) }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label for="item" class="w-100">
                                Item Name 
                                <input type="search" name="item" class="form-control" 
                                id="itemInput" list="itemsList" 
                                data-url="{{ url('user/dashboard/item/search') }}" 
                                required disabled/>
                                <div id="itemResponse">

                                </div>
                            </label>
                        </div>
                        <div class="col-lg-4">
                            <label for="submit"> Search 
                                <button type="submit" class="btn btn-primary" id="search-btn">Search &nbsp;<i class="fa fa-search,"></i></button>
                            </label>
                        </div>
                    </div>
                </form>
                <span class='text-success text-center'>Search Result</span>
                <div class="row mt-3 response" id="response">
                    
                    <span id="loading"></span>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection

@section('scripts')
    <script src="{{ url('js/search-item.js') }}"></script>
@endsection