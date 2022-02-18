@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">All supermarket</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="{{ url('supermarkets/create') }}" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add New supermarket</a>
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
                                <h6 class="mr-5">Supermarket Listing</h6>
                            </div>
                            <div class="col-md-10">
                                <input type="search" id="search" class="form-control" placeholder="search patient"
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
                                        <th>Owner</th>
                                        <th>Subscription Expiry Date</th>
                                        <th>Join On</th>
                                        <th>Status</th>
                                        <th colspan="3"></th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($collection as $item)
                                            <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="{{ url('admin/supermarket/'.$item->id) }}" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('{{ asset('img/tm6.png') }}'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="{{ url('admin/supermarket/'.$item->id) }}" class="text-dark fw-500">
                                                            <h6>{{ $item->name }}</h6>
                                                        </a>
                                                        <p class="d-block mb-0">
                                                            {{ $item->db_name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->fname . " " . $item->lname }}</td>
                                            <td>{{ date('M d, Y', strtotime($item->expires)) }}</td>
                                            
                                            <td>{{ date('M d, Y', strtotime($item->created_at)) }}</td>
                                            <td>
                                                @if($item->expired == 0)
                                                    <div class="userDatatable-content d-inline-block">
                                                        <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                    </div>
                                                @else 
                                                    <div class="userDatatable-content d-inline-block">
                                                        <span class="bg-opacity-danger  color-danger rounded-pill userDatatable-content-status active">expired</span>
                                                    </div>
                                                @endif
                                            </td>
                                            @if(in_array('edit-supermarkets', session('user')->roles))
                                                <td><a href="{{ url('supermarkets/'.$item->id . '/edit') }}" title="edit details of {{ $item->name }}"><i class="fas fa-pen-square text-primary"></i> </a></td>
                                            @endif
                                            @if(in_array('delete-supermarkets', session('user')->roles))
                                                <td><a href="javascript:void(0)" 
                                                    data-url="{{ url('supermarkets/delete') }}" 
                                                    data-resource_id="{{$item->id}}"
                                                    data-user_id="{{ $item->user_id}}"
                                                    data-request_method="POST"
                                                     title="Delete {{ $item->name }}?"
                                                     class="delete-resource" 
                                                     onclick="return confirm('Delete Supermarket? All data of this supermarket will be lost!')"><i class="fas fa-trash-alt text-danger"></i> </a></td>
                                            @endif
                                            
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="response"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
@endsection
