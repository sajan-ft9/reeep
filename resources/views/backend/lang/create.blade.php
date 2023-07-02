@extends('backend.layout')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Language</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">language</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    Create language
                </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <h1>Create Language</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            
                <form method="post" action="{{ route('backend.lang.store') }}">
                    @csrf

                    <div>
                        <label for="title_en">Title (English)</label>
                        <input type="text" class="form-control" name="title[en]" id="title_en" required>
                    </div>
                    <div>
                        <label for="title_ne">Title (Nepali)</label>
                        <input type="text" class="form-control" name="title[ne]" id="title_ne" required>
                    </div>
                    <div>
                        <label for="description_en">Description (English)</label>
                        <textarea class="form-control" name="description[en]" id="description_en" required></textarea>
                    </div>
                    <div>
                        <label for="description_ne">Description (Nepali)</label>
                        <textarea class="form-control" name="description[ne]" id="description_ne" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                </form>
            </div>
        </div>
    </section>
@endsection
