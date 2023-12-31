@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>MENU</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    <span>
                        <a class="text-white" href="{{ route('backend.menu.create') }}">

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
                            <th>Name</th>
                            <th>Parent Name</th>
                            <th>Order</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>{{$menu->parent->name ?? "-"}}</td>
                                <td>{{$menu->order}}</td>
                                <td>{{ $menu->slug }}</td>
                                <td>
                                    <form action="{{ route('backend.menu.toggleStatus', $menu->id) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <button
                                            class="btn {{ $menu->status == 1 ? 'btn-success' : 'btn-danger' }}">{{ $menu->status == 1 ? 'ON' : 'OFF' }}</button>
                                    </form>
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('backend.menu.show', $menu->id) }}" class="text-decoration-none fs-4">
                                        <div class="btn btn-success mr-1"><i class="fas fa-eye"></i></div>
                                    </a>

                                    <div class="btn btn-warning text-white mr-1"><a href="{{ route('backend.menu.edit', $menu->id) }}"><i class="fas fa-edit"></i></a></div>
                                    <form action="{{ route('backend.menu.destroy', $menu->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
