@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <span class="error-login">{{ $message }}</span>
    @endforeach
@endif
