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
                    Create Menu
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
                {!! Form::open(['route' => 'backend.menu.store', 'method' => 'POST']) !!}
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('title', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control']) !!}
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('parent_id', 'Parent Menu') !!}
                            {!! Form::select('parent_id', $menus, null, ['class' => 'form-control', 'placeholder' => 'Enter parent']) !!}

                            @error('parent_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}
                    {{-- @php
                        $menuOptions = [
                            'Home' => 'Home',
                            'About' => 'About',
                            'Services' => 'Services',
                            'Contact' => 'Contact',
                        ];
                        
                        $childMenuOptions = [
                            'About' => [
                                'First About' => 'first_about',
                                'Second About' => 'second_about',
                            ],
                            'Services' => [
                                'Service 1' => 'service_1',
                                'Service 2' => 'service_2',
                                'Service 3' => 'service_3',
                            ],
                        ];
                        
                    @endphp --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Parent Menu Select -->
                            {!! Form::label('parent_menu', 'Parent Menu') !!}
                            {!! Form::select('parent_menu', $menuOptions, null, [
                                'class' => 'form-control',
                                'placeholder' => 'Select Parent Menu',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Child Menu Select (dependent on the parent menu) -->
                            {!! Form::label('child_menu', 'Child Menu') !!}
                            {!! Form::select('child_menu', $childMenuOptions, null, [
                                'class' => 'form-control',
                                'placeholder' => 'Select Child Menu',
                            ]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('order', 'Order') !!}
                            {!! Form::number('order', null, ['class' => 'form-control', 'placeholder' => 'order']) !!}
                            @error('order')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var childMenuOptions = {!! json_encode($childMenuOptions) !!};

            // Parent Menu Select Change Event
            $('#parent_menu').change(function() {
                var parentMenuId = $(this).val();

                // Clear Child Menu Select
                $('#child_menu').html('');

                if (parentMenuId) {
                    var options = childMenuOptions[parentMenuId];

                    // Add Child Menu Options
                    $.each(options, function(key, value) {
                        $('#child_menu').append($('<option>').text(value).attr('value', key));
                    });
                }
            });
        });
    </script>
@endsection
