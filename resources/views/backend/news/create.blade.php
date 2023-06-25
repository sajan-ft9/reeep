@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">news</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    Create news
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
                {!! Form::open(['route' => 'backend.news.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                @csrf
                <div class="">
                    <div class="row">
                        <div class="col">

                            <div class="form-group">
                                {!! Form::label('title', 'Title') !!}
                                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category" class="form-control" id="" required>
                                    <option value="">Select a Category</option>
                                    <option value="1">News</option>
                                    <option value="2">Activities</option>
                                </select>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>



                    <div class="form-group">
                        {!! Form::label('image_path', 'Image') !!}
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