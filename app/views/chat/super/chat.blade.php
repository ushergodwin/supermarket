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
                        <h4 class="text-capitalize breadcrumb-title">YOSIL Support Center</h4>
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
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card shadow chat">
                               <div class="card-header py-1 d-flex justify-content-between">
                                        <div class="d-flex mt-1">
                                            <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url({{ asset('img/undraw_profile.svg') }}); background-size: cover;"></a>
                                            </div>
                                            <div class="userDatatable-inline-title">
                                                <a href="#" class="text-dark fw-500">
                                                    <h6>{{ $user[0]->fname }} {{ $user[0]->lname }}</h6>
                                                </a> 
                                                <p class="d-block mb-0 text-success user-status">
                                                    online
                                                </p>
                                            </div>
                                        </div>
                                        <button type="button" 
                                            class="btn btn-danger btn-sm end-chat py-1"
                                            data-session_id="{{ $session_id }}"
                                            data-url="{{ url('chat/end') }}"
                                            data-_token="{{ _token() }}">
                                            End Chat
                                        </button>
                                   </div>
                                <div class="card-body chat-body" id="chat-body">
                                    
                                </div>
                                <div class="card-footer">
                                    <form action="">

                                        <div class="input-group">
                                            <label for="message"></label>
                                            <textarea  class="form-control" id="message"></textarea>
                                            <button type="button" 
                                            class="btn btn-outline-success ml-2 send-btn" 
                                            id="send" 
                                            data-sender="{{ session('user')->email }}"
                                            data-receiver="{{ $user[0]->request_by }}" 
                                            data-session_id="{{ $session_id }}"
                                            data-url="{{ url('chat/send') }}"
                                            data-_token="{{ _token() }}"><i class="fa fa-paper-plane"></i></button>
                                        </div>
                                   </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-body shadow char-request">
                                <h4>Chat Requests</h4>
                                <div id="chat-requests">

                                </div>
                                <br>
                                <h4><u>Online Users</u></h4>
                                @if (!empty($online))
                                    @foreach($online as $user)
                                        <div class="d-flex mt-1">
                                            <div class="userDatatable__imgWrapper d-flex align-items-center">
                                                <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('{{ asset('img/undraw_profile.svg') }}'); background-size: cover;"></a>
                                            </div>
                                            <div class="userDatatable-inline-title">
                                                <a href="#" class="text-dark fw-500">
                                                    @if ($user->email == session('user')->email)
                                                    <h6>Me</h6> 
                                                    @else
                                                        <h6>{{ $user->fname }} {{ $user->lname }}</h6>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/chat.js') }}"></script>
@show