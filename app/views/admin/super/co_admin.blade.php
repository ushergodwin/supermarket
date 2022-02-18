@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">co admin users </h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="{{ url('users/co-admin/create') }}" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add co Admin</a>
                            </div>
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
                                <input type="search" id="search" class="form-control" placeholder="search co admin users"
                                       onkeyup="filterTable('search', 'patientTable')">
                                @csrf
                            </div>
                        </div>
                        <div class="card-body py-md-30">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="patientTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Joined On</th>
                                        <th colspan="2"></th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $item)
                                            <tr>
                                            <td>
                                                <div class="d-flex">
                                                <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                    <a href="{{ url('users/'.$item->id) }}" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('{{ asset('img/tm6.png') }}'); background-size: cover;"></a>
                                                </div>
                                                <div class="userDatatable-inline-title">
                                                    <a href="{{ url('users/'.$item->id) }}" class="text-dark fw-500">
                                                        <h6>{{ $item->fname }} {{ $item->lname }}</h6>
                                                    </a>
                                                    <p class="d-block mb-0">
                                                        {{ $item->phone }}
                                                    </p>
                                                </div>
                                                </div>
                                            </td>
                                                <td>
                                                    <a href="mailto:{{ $item->email }}"> {{ $item->email }} </a>
                                                </td>
                                                <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>
                                                @if(in_array('edit-users', session('user')->roles))
                                                    <td>
                                                        <a href="{{ url('users/co-admin/'.$item->id . '/edit') }}" title="edit details of {{ $item->fname . " ".$item->lname }}"><i class="fas fa-pen-square text-primary"></i> </a>
                                                    </td>
                                                @endif

                                                @if(in_array('delete-users', session('user')->roles))
                                                    <td>
                                                        <a href="javascript:void(0)" data-url="{{ url('users/co-admin/'.$item->id) }}" data-resource-id="{{$item->id}}" title="Delete {{ $item->fname . " ".$item->lname }}?" class="delete-resource-btn" ><i class="fas fa-trash-alt text-danger"></i> </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
@endsection