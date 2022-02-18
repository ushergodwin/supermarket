@extends('partials.user.base')
@section('content')
<section class="contents">
    <section class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if (isset($_SESSION['notebook']))
                    {!! session('notebook') !!}
                    @php
                        unset($_SESSION['notebook']);
                    @endphp
                @endif
                <h4>Create Item Notes</h4>
                <div class="response" id="response"></div>
                <div class="card card-body shadow mt-2">
                    <form action="{{ url('user/dashboard/notebook/update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="supermarket_name" class="w-100">
                                Supermarket Name
                                <select name="supermarket_name" class="form-control" required>
                                    <option value="">-- select supermart --</option>
                                    @foreach ($collection as $item)
                                        <option value="{{ $item->db_name }}" {{ old('supermarket_name') == $item->db_name ? 'selected' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="items" class="w-100">
                                Items&nbsp;
                                (<span class="text-muted">Separate multiple items with commas (,)</span>)
                                <textarea name="items" class="form-control" rows="5">{{ old('items') }}</textarea>
                            </label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="hidden" name="notebook_id" value="{{ $notebook_id }}"/>
                            <input type="hidden" name="notebook_name" value="{{ $notebook_name }}"/>
                            <button type="submit" class="btn btn-success" id="list-btn">Save Item in the Notebook</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection