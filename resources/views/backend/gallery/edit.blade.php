@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> Update Gallery </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">gallery</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    Update gallery 
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
                {!! Form::open([
                    'route' => ['backend.gallery.update', $gallery->id],
                    'method' => 'PUT',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', $gallery->title, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('album_id', 'Album') !!}
                            {!! Form::select('album_id', $albums, $gallery->album->id,['class' => 'form-control']) !!}
                            @error('album_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', $gallery->description, ['class' => 'form-control']) !!}
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Old Image</label>
                    <img src="{{ asset($gallery->image_path) }}" height="100" alt="">
                </div>

                <div class="form-group">
                    {!! Form::label('image_path', 'Image') !!}
                    {!! Form::file('image_path', ['class' => 'form-control', 'onchange' => 'loadFile(event)']) !!}
                    <img class="mt-2" id="output" alt="">
                    @error('image_path')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Save</button>

            </div>

            {!! Form::close() !!}
        </div>

    </section>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.height = "100"
            output.width = "100"
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
