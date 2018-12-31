@if (count($errors) > 0)
    <ul class="error_msg" style="list-style: none;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif