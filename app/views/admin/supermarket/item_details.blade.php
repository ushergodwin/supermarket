@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">{{$collection->name}} Details</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="{{ url('supermarket-items/create') }}" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add New Supermarket Item</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-horizontal card-default card-md mb-4">
                        <div class="card-body py-md-30">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card card-body border-0">
                                        <img src="{{asset('imgs/supermarket/items/' . $collection->image)}}" class="card-img" />
                                        <span>Created on: {{date("D d M, Y", strtotime($collection->created_at))}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <h1><u>Product Details</u></h1>
                                    <br/>
                                    <h4>Product Name: <span class="text-muted">{{ $collection->name }}</span></h4>

                                    <br/>

                                    <h4>Product Price: <span class="text-muted">{{ number_format($collection->price, 2) }}</span></h4>
                                    <br/>

                                    <h4>Product Category: <span class="text-muted">{{ $collection->category }}</span></h4>
                                    <br/>

                                    <h4>Product Location: <span class="text-muted"> Column {{ $collection->column_number }}, in {{ $collection->position }}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
@endsection
