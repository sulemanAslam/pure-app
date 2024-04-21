<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="row">
            <div class="col-lg-12">
                <div class="pull-left">
                    <h2>Dog List</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('dogs.create') }}"> Create New Dog</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Breed</th>
                <th>Allergies</th>
                <th>Suitable Recipes</th>
                <th>Subscribe</th>
            </tr>

            @foreach ($dogs as $dog)
            <tr>
                <td>{{ $dog->name }}</td>
                <td>{{ $dog->age }}</td>
                <td>{{ $dog->breed }}</td>
                <td>
                    @foreach ($dog->allergies as $allergy)
                    <li>{{ $allergy }} </li>
                    @endforeach
                </td>
                <td>
                    @foreach ($dog->suitable_recipes as $recipe)
                    <li>{{ $recipe }} </li>
                    @endforeach
                </td>
                <td>
                <form action="{{ route('subscriptions.store') }}" method="POST">
                @csrf
                    <select name="recipe" id="recipes">
                    <option  value="choose">Choose a recipe</option>
                        @foreach ($dog->suitable_recipes as $recipe)
                        <option value="{{$recipe}}">{{$recipe}}</option>
                        @endforeach
                </select>
                
                    <button name="dog_id" value="{{$dog->id}}" type="submit" class="btn btn-primary">Save</button>
                </form>
                </td>
            </tr>
            @endforeach

        </table>
    </body>
</html>