@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Location </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">location</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    Add location
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

            @if ($errors->any())
            @foreach ($errors as $item)
                {{ $item->all() }}
            @endforeach
                
            @endif
            <div class="card-body">
                {!! Form::open(['route' => ['backend.location.update', $location->id], 'method' => 'PATCH']) !!}
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('map', 'Map') !!}
                            {!! Form::text('map', $location->map, ['class' => 'form-control', 'placeholder' => 'map']) !!}
                            @error('map')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address', $location->address, ['class' => 'form-control', 'placeholder' => 'address']) !!}
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', $location->email, ['class' => 'form-control', 'placeholder' => 'email']) !!}
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('website', 'Website') !!}
                            {!! Form::url('website', $location->website, ['class' => 'form-control', 'placeholder' => 'website']) !!}
                            @error('website')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            {!! Form::label('call', 'Phone') !!}
                            {!! Form::tel('call', $location->call, ['class' => 'form-control', 'placeholder' => 'phone']) !!}
                            @error('call')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success">Save</button>

            </div>

            {!! Form::close() !!}

        </div>

        </div>
    </section>
@endsection
