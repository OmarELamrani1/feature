<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Formulaire</title>
</head>
<body>

    <div class="container">
        <div style="margin-top:30px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <form class="form-horizontal" action="{{ route('posters.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="margin-bottom: 25px" class="input-group">
                    {{-- <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> --}}
                    <label for="path" class="sr-only">Poster : </label>
                    <input id="path" name="path" type="file" class="form-control" placeholder="Poster">
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <label for="summary" class="sr-only">Summary : </label>
                    <input id="summary" name="summary" type="text" class="form-control" placeholder="Summary">
                </div>

                <button type="submit" class="btn btn-primary mb-2">Confirm</button>
            </form>
        </div>
    </div>

</body>
</html>
