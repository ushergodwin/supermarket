@extends('partials.user.base')
@section('css')
    <style type="text/css">
        .notebook {
            background: url("{{ asset('imgs/site/notebook-paper.png') }}") repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

        }
    </style>
@endsection
@section('content')
<section class="contents">
    <section class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-8">
                <h4>Notebooks</h4>
                @include('partials.notification')
                <div class="row">
                    @if (!empty($collection))
                        @foreach ($collection as $item)
                            <div class="col-lg-6">
                                <div class="card mt-2 notebook">
                                    <div class="card-header py-1 notebook">
                                        <h5>{{$item->note_name}}</h5> 
                                    </div>
                                    <div class="card-body" id="notebook-body">
                                      @php
                                          $notes = explode(',', $item->notes);
                                      @endphp
                                      @foreach ($notes as $item_note)
                                          <a href="{{ url('user/dashboard/supermarket_items/search?q=' . $item->supermarket_name . '&item=' . trim($item_note)) }}">{{ $item_note }}</a>, &nbsp;
                                      @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <h4>Create a Notebook</h4>
                <div class="response" id="response"></div>
                <div class="card card-body shadow mt-2">
                    <form action="{{ url('user/dashboard/notebooks/save') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="note_name" class="w-100">
                                NoteBook Name
                                <input type="text" name="note_name" class="form-control"
                                 value="{{ empty(old('note_name')) ? "NB_".date("dmYHis") : old('note_name') }}"/>
                            </label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Create NoteBook</button>
                        </div>
                    </form>
                </div>
                <div class="response" id="response"></div>
            </div>
        </div>
    </section>
</section>
@endsection

@section('scripts')
    <script>
        request({form: 'listForm', btn: 'list-btn'});
        elementDataRequest({selector: 'id', el: 'diactivate-list', method: 'POST'})
    </script>
@endsection