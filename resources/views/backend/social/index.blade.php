@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Social</h1>
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
                    <span>
                        <a class="text-white" href="{{ route('backend.social.create') }}">

                            <button class="btn btn-info ">
                                <i class="fas fa-plus"></i>
                            </button>
                        </a>
                    </span>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Url</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($socials as $item)
                            <tr>
                                <td>{{ substr($item->type, 7) }}</td>
                                <td>{{ $item->url }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-warning text-white mr-1"
                                            href="{{ route('backend.social.edit', $item->id) }}"><i
                                                class="fas fa-edit"></i></a>
                                        <form action="{{ route('backend.social.destroy', $item->id) }}" method="POST">
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
