@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">User Profile</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            {{-- <div class="action-btn">
                                <a href="{{ url('users/create') }}" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add New User (co - admin)</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card card-body shadow">
                                @if (session('user')->account_type !== 'customer')
                                    
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <img src="{{asset('img/undraw_profile.svg')}}" class="rounded-circle" alt="profile photo"/>
                                            <h5 class="text-center">{{ $collection->email }}</h5>
                                            <h5 class="text-center">({{ strtoupper($collection->account) }})</h5>
                                            <h5>Joined on: {{ date("D d M, Y", strtotime($collection->created_at)) }}</h5>
                                        </div>
                                        <div class="col-lg-8">
                                            <h5>NAME: {{ $collection->fname }} {{ $collection->lname }}</h5>
                                            <br>
                                            <h5>PHONE: {{ $collection->phone }}</h5>
                                            <br>
                                            @if (session('user')->account_type === 'admin')
                                                <h5>SUPERMARKET: {{ $collection->name }}</h5>
                                            @endif
                                            <br/>
                                            <h4><u>Privileges</u></h4>
                                            @php
                                                $roles = explode(',', $collection->roles);
                                            @endphp
                                            <div class="row">
                                                @foreach ($roles as $role)
                                                    <div class="col-md-6">
                                                        <div class="card card-body py-1 shadow mt-2">{{ strtoupper(str_replace('-', ' ', $role)) }}</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @else
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="{{asset('img/undraw_profile.svg')}}" class="rounded-circle" alt="profile photo"/>
                                        <h5 class="text-center">{{ $collection->email }}</h5>
                                        
                                    </div>
                                    <div class="col-lg-8">
                                        <h5>NAME: {{ $collection->fname }} {{ $collection->lname }}</h5>
                                        <br>
                                        <h5>PHONE: {{ $collection->phone }}</h5>
                                        <br/>
                                        <h5>Joined on: {{ date("D d M, Y", strtotime($collection->created_at)) }}</h5>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
