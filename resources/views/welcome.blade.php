<!DOCTYPE html>
<html>

<head>
    <title>How to Create Multi Language Website in Laravel - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
</head>

<body>
    <div class="container">

        <h1>How to Create Multi Language Website in Laravel - ItSolutionStuff.com</h1>

        <div class="row">
            <form action="{{ route('changeLang') }}" method="get">
                <div class="col-md-2 col-md-offset-6 text-right">
                    <strong>Select Language: </strong>
                </div>
                <div class="col-md-4">
                    <select class="form-control changeLang" name="lang">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="ne" {{ session()->get('locale') == 'ne' ? 'selected' : '' }}>Nepali</option>
                    </select>
                </div>
                <div class="col-md-2"></div>
            </form>
        </div>

        <h1>{{ __('messages.title') }}</h1>

    </div>
</body>
{{--   
<script type="text/javascript">
  
    var url = "{{ route('changeLang') }}";
  
    $(".changeLang").change(function(e){
        
        window.location.href = url + "?lang="+ $(this).val();
    });
  
</script> --}}

</html>
