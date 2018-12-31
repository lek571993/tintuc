@if(Session::has('flash'))
    <div class="result_msg">
        {!! Session('flash') !!}
    </div>
@endif