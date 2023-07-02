@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Social </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">social</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    Add social
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
                {!! Form::open(['route' => ['backend.social.update', $social->id], 'method' => 'PATCH']) !!}
                @csrf
                <div class="row">

                    <div class="col">

                        <div class="form-group">
                            {!! Form::label('url', 'Url') !!}
                            {!! Form::text('url', $social->url, ['class' => 'form-control', 'placeholder' => 'url']) !!}
                            @error('url')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label for="">Type</label>
                            <select name="type" class="form-control" id="" required>
                                <option value="">Select media type</option>
                                <option value="bx bxl-facebook" {{ ($social->type == 'bx bxl-facebook') ? "selected" : "" }}>Facebook</option>
                                <option value="bx bxl-skype" {{ ($social->type == 'bx bxl-skype') ? "selected" : "" }}>Skype</option>
                                <option value="bx bxl-instagram" {{ ($social->type == 'bx bxl-instagram') ? "selected" : "" }}>Instagram</option>
                                <option value="bx bxl-twitter" {{ ($social->type == 'bx bxl-twitter') ? "selected" : "" }}>Twitter</option>
                                <option value="bx bxl-linkedin" {{ ($social->type == 'bx bxl-linkedin') ? "selected" : "" }}>LinkedIn</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-success">Save</button>

            </div>

            {!! Form::close() !!}
        </div>
    </section>
@endsection
