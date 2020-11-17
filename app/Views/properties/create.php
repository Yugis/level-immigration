<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- STYLES -->
</head>

<body>

    <div class="container mt-5">
        <form action="/properties/store" method="post">
            <h3>Add a new Listing</h3>
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="custom-select">
                    <option value="villa">Villa</option>
                    <option value="apartment">Apartment</option>
                    <option value="suite">Suite</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="summary">Summary</label>
                <textarea name="summary" cols="30" rows="2" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="whys">Whys</label>
                <ol>
                    <li><input type="text" name="whys[]" class="form-control"></li>
                    <br>
                    <li><input type="text" name="whys[]" class="form-control"></li>
                    <br>
                    <li><input type="text" name="whys[]" class="form-control"></li>
                    <br>
                    <li><input type="text" name="whys[]" class="form-control"></li>
                    <br>
                    <li><input type="text" name="whys[]" class="form-control"></li>
                </ol>
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea name="details" cols="30" rows="2" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="location">Location Description</label>
                <textarea name="location" cols="30" rows="2" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input type="number" name="size" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bedrooms">Number of Bedrooms</label>
                <input type="number" name="bedrooms" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bathrooms">Number of Bathrooms</label>
                <input type="number" name="bathrooms" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="floors">Number of Floors</label>
                <input type="number" name="floors" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select name="country_id" class="custom-select">
                    <option value="1">United Arab Emarites</option>
                    <option value="2">Egypt</option>
                    <option value="3">Italy</option>
                    <option value="4">Germany</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <select name="city_id" class="custom-select">
                    <option value="1">Cairo</option>
                    <option value="2">Dubai</option>
                    <option value="3">Abu Dhabi</option>
                </select>
            </div>

            <button class="btn btn-primary" type="submit">Submit</button>

        </form>
    </div>

    <br>
    <br>
    <br>

</body>

</html>