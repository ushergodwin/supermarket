@extends('partials.admin.base')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}" type="text/css"/>
@endsection
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Support Center</h4>
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
                    <div class="card card-horizontal card-default card-md mb-4">
                        <div class="row mt-5 mr-2 ml-2">
                            <div class="col-md-2 mt-3">
                                <h6 class="mr-5">Listing</h6>
                            </div>
                            <div class="col-md-10">
                                <input type="search" id="search" class="form-control" placeholder="search chat request"
                                       onkeyup="filterTable('search', 'patientTable')">
                                <input type="hidden" name="_token" value="{{ _token() }}">
                            </div>
                        </div>
                        <div class="card-body py-md-30">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="patientTable">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Sent On</th>
                                        <th>Status</th>
                                        <th></th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($chat_requests as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                    <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="{{ url('users/'.$item->chat_id) }}" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('{{ asset('img/tm6.png') }}'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="{{ url('users/'.$item->chat_id) }}" class="text-dark fw-500">
                                                            <h6>{{ $item->fname }} {{ $item->lname }}</h6>
                                                        </a>
                                                        {{-- <p class="d-block mb-0">
                                                            {{ $item->phone }}
                                                        </p> --}}
                                                    </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    @if($item->sent_on == date("Y-m-d"))
                                                        Today at {{ $item->sent_at }}
                                                    @else 
                                                        {{ date("D d M, Y", strtotime($item->sent_on)) . " at " . $item->sent_at }}
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($item->chat_status == 1)
                                                        <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                        </div>
                                                    @else 
                                                        <div class="userDatatable-content d-inline-block">
                                                            <span class="bg-opacity-danger  color-danger rounded-pill userDatatable-content-status active">closed</span>
                                                        </div>
                                                    @endif
                                                </td>

                                                <td>
                                                    <a href="{{ $item->chat_status == 1 ? url('admin/dashboard/support/chat/' . $item->session_id) : "javascript:void(0)" }}"
                                                         title="Chat with {{ $item->fname . " ".$item->lname }}?" class="btn">Join <i class="fa fa-paper-plane"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
