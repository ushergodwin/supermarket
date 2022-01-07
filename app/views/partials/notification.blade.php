@if (!empty(response()->message()))
    @php
        $message = response()->message();
    @endphp
    @if (array_key_exists('success', $message))
        <!-- Success Alert -->
        <div class="alert alert-success alert-dismissible fade show">
            <strong>Success!</strong> &nbsp;&nbsp;{{ $message['success'] }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @else
        @if (array_key_exists('failed', $message))
            <!-- Error Alert -->
            <div class="alert alert-danger alert-dismissible fade show mt-1">
                <strong>Error!</strong> &nbsp;&nbsp;{{ $message['failed']  }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
    @endif
@else
    @if (!empty(response()->errors()))
        @foreach (response()->errors() as $item)
            <div class="alert alert-danger alert-dismissible fade show mt-1">
                <strong>Error!</strong> &nbsp;&nbsp;{{ $item }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endforeach
    @endif
@endif