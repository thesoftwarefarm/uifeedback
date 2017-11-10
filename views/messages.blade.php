@foreach($ui_messages as $messages)
    <div class="alert alert-dismissible fade show alert-{{ $messages['type'] }}">
        @if ($messages['close_button'] === true) <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> @endif
        @foreach($messages['messages'] as $message)
            @if($loop->count > 1)<p>@endif
                {{ $message }}
            @if($loop->count > 1)</p>@endif
        @endforeach
    </div>
@endforeach