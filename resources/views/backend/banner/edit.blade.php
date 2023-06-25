@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">banner</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    Create Banner
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
                {!! Form::open(['route' => ['backend.banner.update', $banner->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data' ]) !!}
                @csrf
                <div class="">

                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', $banner->title, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', $banner->description, ['class' => 'form-control']) !!}
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    

                    <div class="form-group">
                        <label for="">Old Image</label>
                    <img src="{{ asset($banner->image_path) }}" height="100" alt="">
                    </div>
                    <div class="form-group">
                        {!! Form::label('image_path', 'New Image') !!}
                        {!! Form::file('image_path', null, ['class' => 'form-control', 'placeholder' => 'Choose Image']) !!}
                        @error('image_path')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
