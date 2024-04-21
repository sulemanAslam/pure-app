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
    <h2>Create Dog Form</h2>
        <div>
            <form action="{{ route('dogs.store') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter Dog Name">
                </div><br>

                <div class="form-group">
                    <label for="age">Age (in months):</label>
                    <input type="number" id="age" name="age" placeholder="Enter Age">
                </div><br>

                <div class="form-group">
                    <label for="breed">Breed:</label>
                    <input type="text" id="breed" name="breed" placeholder="Enter Breed">
                </div><br>

                <div class="form-group">
                    <label for="allergies">Allergies:</label>
                    <input type="text" id="allergies" name="allergies[]" placeholder="Enter Allergies">
                </div><br>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form> 
        </div>
    </body>
</html>
