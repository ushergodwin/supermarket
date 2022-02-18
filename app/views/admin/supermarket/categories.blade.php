@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Supermaket Item Categories</h4>
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
                <div class="col-lg-4">
                    <h6 class="mr-5">Categories</h6>
                    <div class="card card-horizontal card-default card-md mb-4 mt-2">
                        <div class="row mt-3 mr-2 ml-2">
                            @foreach ($collection as $item)
                                <div class="col-md-12 mt-1">
                                    <div class="card card-body shadow mb-3">
                                        {{ $item->category}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>

                <div class="col-lg-8">
                    <h6 class="mr-5">Most Searched Categories</h6>
                    <div class="card card-horizontal card-default card-md mb-4 mt-2">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Name</th>
                                    <th>No of Searches</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($most_searched_categories))
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($most_searched_categories as $item)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $item->key }}</td>
                                            <td>{{ $item->value}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
@endsection
