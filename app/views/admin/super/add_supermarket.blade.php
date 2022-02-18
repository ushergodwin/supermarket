@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Add Supermarket</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="{{ url('users/create') }}" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add New Supermarket</a>
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
                            <form action="{{ url('supermarkets/store') }}" method="post" id="supermarketForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="name">Supermarket Name</label>
                                            <input type="text" name="name" class="form-control" 
                                            placeholder="name of the supermarket" autocomplete="off"
                                            value="{{ old('name') }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="owner">Owner</label>
                                            <select name="owner" class="form-control"required>
                                                <option value="">-- select owner --</option>
                                                @if (!empty($users))
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item->id }}" {{ old('owner') == $item->id ? "selected" : ""}}>{{ $item->fname . " " . $item->lname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="fee" class="w-100">
                                                Subscription Fee 
                                                <input type="number" name="fee" class="form-control" value="{{ old('fee', 100000) }}"/>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="expiry_date" class="w-100">
                                                Expires On 
                                                <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date', date("Y-m-d", strtotime("+1 month"))) }}"/>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="add-supermarket-btn" class="btn btn-success">ADD SUPERMARKET ACCOUNT</button><br/>
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
