@extends('partials.user.base')
@section('content')
    <section class="contents">
        <section class="container-fluid">
            <div class="row mt-2">
                @foreach ($collection as $item)
                    <div class="col-lg-4">
                        <div class="card mt-3">
                            <div class="card-body shadow">
                                <h5>{{ $item->name }}</h5>
                            </div>
                            <div class="card-footer">
                                <a href="{{ url('user/dashboard/supermarkets/' . $item->db_name) }}" class="stretched-link">View Items </a>
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        </section>
    </section>
@endsection