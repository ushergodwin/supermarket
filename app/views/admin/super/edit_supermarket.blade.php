@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Edit {{ $supermarket }}</h4>
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
                            <form action="{{ route('supermarkets.index') }}" method="POST" id="supermarketDetailsForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="name">Supermarket Name</label>
                                            <input type="text" name="name" class="form-control" 
                                            placeholder="enter your email or phone number" autocomplete="off"
                                            value="{{ $collection->name }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="owner">Owner</label>
                                            <select name="owner" class="form-control" required>
                                                <option value="">-- select owner --</option>
                                                @if (!empty($users))
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item->id }}" {{ $collection->owner == $item->id ? " selected" : ""}}>{{ $item->fname . " " . $item->lname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="expiry_date" class="w-100">
                                                Expires On 
                                                <input type="date" name="expiry_date" class="form-control" value="{{ $collection->expires}}"/>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="fee" class="w-100">
                                                Subscription Fee
                                                <div class="mt-1">
                                                    <input type="number" name="fee" class="form-control" value="{{ $collection->fee }}"/>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="expiry_date" class="w-100">
                                                Is Expired?
                                                <div class="mt-1">
                                                    <input type="radio" name="is_expired" class="custom-checkbok" value="1"{{ $collection->expired == 1 ? " checked" : ""}}/> Yes
                                                    <input type="radio" name="is_expired" class="custom-checkbok ml-3" value="0"{{ $collection->expired == 0 ? " checked" : ""}}/> No
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="hidden" name="id" value="{{ $collection->id }}"/>
                                    @method("PUT")
                                    <button type="submit" id="add-supermarket-btn" class="btn btn-success">SAVE CHANGES</button><br/>
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

@section('scripts')
    <script> 
        request({form: 'supermarketDetailsForm', btn: 'add-supermarket-btn'})
    </script>
@endsection