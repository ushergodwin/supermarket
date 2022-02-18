@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">
                            @if ($is_most_searched)
                                Top 10 Most Searched Supermarket Items.
                            @else
                                Supermaket Items Searched and {{ $status }}
                            @endif
                        </h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="{{ url('supermarket-items/create') }}" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add New Supermaket Item
                                </a>
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
                                <h6 class="mr-5">Items</h6>
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
                                        <th>Item Name</th>
                                        <th>No of Searches</th>
                                        <th>Searched On</th>
                                        {{-- <th colspan="3">Action</th> --}}
                                        @if ($is_most_searched)
                                            <th>Status</th>
                                        @endif
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($collection as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                    <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                        <a href="{{ url('supermarket-items/'.$item->id) }}" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('{{ asset('imgs/supermarket/items/'.$item->image) }}'); background-size: cover;"></a>
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="{{ url('supermarket-items/'.$item->id) }}" class="text-dark fw-500">
                                                            <h6>{{ $item->searched_item_name  }}</h6>
                                                        </a>
                                                        <p class="d-block mb-0">
                                                            searched {{ $item->number_of_searches }} times
                                                        </p>
                                                    </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{$item->number_of_searches}} times
                                                </td>
                                                <td>{{ date('D d M, Y', strtotime($item->created_at)) }}</td>
                                                @if ($is_most_searched)
                                                    <td>{{ strtoupper($item->search_status) }}</td>
                                                @endif
                                                {{-- <td>
                                                    <a href="{{ url('supermarket-items/'.$item->id) }}" title="view more details of {{ $item->searched_item_name}}" class="view"><span data-feather="eye"></span> </a>
                                                </td>
                                                <td>
                                                    <a href="{{ url('supermarket-items/'.$item->id . '/edit') }}" title="edit details of {{ $item->searched_item_name }}"><i class="fas fa-pen-square text-primary"></i> </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" data-url="{{ url('supermarket-items/'.$item->id) }}" data-resource-id="{{$item->id}}" title="Delete {{ $item->searched_item_name }}?" class="delete-resource-btn" ><i class="fas fa-trash-alt text-danger"></i> </a>
                                                </td> --}}
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
