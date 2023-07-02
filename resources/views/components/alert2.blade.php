@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success: </strong>
        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endisset
@if (session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error: </strong>
        {{ session('danger') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endisset
