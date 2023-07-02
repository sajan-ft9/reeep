@extends('backend.layout')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Footer </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">footer</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                    Add footer
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
                {!! Form::open(['route' => ['backend.footer.update',$footer->id], 'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', $footer->title, ['class' => 'form-control', 'placeholder' => 'title']) !!}
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                  
                </div>
                <div class="">
                    
                    <div class="form-group mb-4">
                        <div class="m-3">
                            <label for="">Old Image 1</label>
                            <img src="{{ asset($footer->image_1) }}" alt="" height="100" width="100">
                        </div>
                        {!! Form::label('image_1', 'Image1') !!}
                        {!! Form::file('image_1', ['onchange' => 'loadFile1(event)']) !!}
                        <img class="mt-2" id="output1" alt="">
                        @error('image_1')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <div class="m-3">
                            <label for="">Old Image 2</label>
                            <img src="{{ asset($footer->image_2) }}" alt="" height="100" width="100">
                        </div>
                        {!! Form::label('image_2', 'Image2') !!}
                        {!! Form::file('image_2', ['onchange' => 'loadFile2(event)']) !!}
                        <img class="mt-2" id="output2" alt="">
                        @error('image_2')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Save</button>

            </div>

            {!! Form::close() !!}

        </div>

        </div>
    </section>
    <script>
        var loadFile1 = function(event) {
          var output = document.getElementById('output1');
          output.height = "100"
          output.width = "100"
          output.src = URL.createObjectURL(event.target.files[0]);	
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };
        var loadFile2 = function(event) {
          var output = document.getElementById('output2');
          output.height = "100"
          output.width = "100"
          output.src = URL.createObjectURL(event.target.files[0]);	
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }
        };
    </script>
@endsection
