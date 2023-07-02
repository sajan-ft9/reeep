<!DOCTYPE html>
<html>

<head>
    <title>How to Create Multi Language Website in Laravel - ItSolutionStuff.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="{{ route('changeLang') }}" method="get">

            <div class="row py-3">
                <div class="col-4 text-end">
                    <strong>Select Language: </strong>
                </div>
                <div class="col-4">
                    <select name="lang" class="form-control">
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="ne" {{ session()->get('locale') == 'ne' ? 'selected' : '' }}>Nepali</option>
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-success" type="submit">Translate</button>
                </div>
            </div>
        </form>

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
