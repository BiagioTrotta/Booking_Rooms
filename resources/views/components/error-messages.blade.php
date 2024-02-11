<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="my-auto">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>