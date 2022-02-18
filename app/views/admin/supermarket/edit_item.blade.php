@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Edit Supermarket Item ({{$collection->name}})</h4>
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
                    @include('partials.notification')
                    <div class="card card-horizontal card-default card-md mb-4">
                        <div class="card-body py-md-30">
                            <form action="{{ url('supermarket-items') }}" method="post" id="supermarketItemForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="name">Item Name</label>
                                            <input type="text" name="name" class="form-control" 
                                             autocomplete="off"
                                            value="{{ $collection->name }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" name="price" class="form-control" value="{{ $collection->price }}" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="category">Item Category</label>
                                            <input type="text" name="category" class="form-control"
                                            value="{{ $collection->category }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="column_number">Item Column Number</label>
                                            <input type="number" name="column_number" value="{{ $collection->column_number }}"  class="form-control" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="position">Item Position {{$collection->position}}</label>
                                            <select name="position" class="form-control" required>
                                                <option value="">-- select position --</option>
                                                <option value="top-left" {{ $collection->position == 'top-left' ? "selected" : ""}}>TOP LEFT</option>
                                                <option value="middle-left" {{ $collection->position == 'middle-left' ? "selected" : ""}}>MIDDLE LEFT</option>
                                                <option value="bottom-left" {{ $collection->position == 'bottom-left' ? "selected" : ""}}>BOTTOM LEFT</option>
                                                <option value="top-right" {{ $collection->position == 'top-right' ? "selected" : ""}}>TOP RIGHT</option>
                                                <option value="middle-right" {{ $collection->position == 'middle-right' ? "selected" : ""}}>MIDDLE RIGHT</option>
                                                <option value="bottom-right" {{ $collection->position == 'bottom-right' ? "selected" : ""}}>BOTTOM RIGHT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <label for="image">Item Image</label>
                                                    <input type="file" name="image" class="form-control" multiple/>
                                                    @method("PUT")
                                                    <input type="hidden" name="id" value="{{ $collection->id }}"/>
                                                </div>
                                                <div class="col-l-4">
                                                    <img src="{{asset('imgs/supermarket/items/' . $collection->image)}}" width="100px" height="100px" class="rounded" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="add-supermarket-btn" class="btn btn-success">SAVE SUPERMARKET ITEM CHANGES</button><br/>
                                </div>
                                <div class="response" id="response"></div>
                            </form>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
@endsection
