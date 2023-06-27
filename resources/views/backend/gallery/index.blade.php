@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gallery</h1>
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
                    <span>
                        <a class="text-white" href="{{ route('backend.gallery.create') }}">

                            <button class="btn btn-info ">
                                <i class="fas fa-plus"></i>
                            </button>
                        </a>
                        <a class="text-white" href="{{ route('backend.gallery.index') }}">

                            <button class="btn btn-success ">
                                <i class="fas fa-redo"></i>
                            </button>
                        </a>
                    </span>
                  
                </h3>

                <div class="card-tools d-flex">
                        <form  action="{{ route('backend.gallery.index') }}">
                            <input type="text" name="search" class="form-control" placeholder="search" />
                        </form>
                         
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Album</th>
                            <th>Description</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallerys as $item)
                            <tr>
                                <td><img src="{{ asset($item->image_path) }}" alt="" height="50"></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->album->name }}</td>
                                <td>{{ substr($item->description,0,50) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-warning text-white mr-1"
                                            href="{{ route('backend.gallery.edit', $item->id) }}"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ route('backend.gallery.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
