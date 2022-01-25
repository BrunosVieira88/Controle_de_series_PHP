@if ($errors->any())
    <div class="offset-4 alert alert-danger text-center col-4 alerta offset-4 mt-2 " >
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

