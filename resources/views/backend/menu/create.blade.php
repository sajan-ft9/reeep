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

                    <!-- resources/views/select-form.blade.php -->
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Parent Menu</label>
                            <select name="parent_id" class="form-control">
                                @foreach ($result as $item)
                                    <option style="font-size: 18px" value="{{ $item['id'] }}">
                                        &blacktriangleright;{{ $item['name'] }}</option>

                                    @if (!empty($item['children']))
                                        @foreach ($item['children'] as $child)
                                            <option style="font-size: 15px" value="{{ $child['id'] }}"> &emsp;&bull;
                                                {{ $child['name'] }}</option>

                                            @if (!empty($child['children']))
                                                @foreach ($child['children'] as $grandchild)
                                                    <option style="font-size: 13px" value="{{ $grandchild['id'] }}">
                                                        &emsp;&emsp; &#10140;{{ $grandchild['name'] }}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                            @error('order')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Parent Menu</label>
                            <select name="parent_id" class="form-control">
                                @foreach ($result as $item)
                                    @include('partials.option', ['item' => $item, 'depth' => 0])
                                @endforeach
                            </select>
                            @error('order')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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

    {{-- <script>
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
    </script> --}}
@endsection
