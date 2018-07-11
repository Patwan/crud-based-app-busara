 @if(Session::has('message'))
            <div class="alert alert-info text-center">
                <p>{{ Session::get('message') }}</p>
            </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif