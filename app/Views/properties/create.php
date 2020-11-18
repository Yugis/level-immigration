<?= $this->extend('templates/admin_template') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <form action="/properties/store" method="post" enctype="multipart/form-data">
        <h3>Add a new Listing</h3>
        <div class="form-group">
            <label for="title">Title</label>
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
            <label for="map_embed">Map Embed (Map iFrame)</label>
            <input type="text" name="map_embed" class="form-control">
        </div>
        <div class="form-group">
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" class="form-control">
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" class="form-control">
        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <input type="number" name="size" class="form-control">
        </div>
        <div class="form-group">
            <label for="bedrooms">Number of Bedrooms</label>
            <input type="number" name="bedrooms" class="form-control">
        </div>
        <div class="form-group">
            <label for="bathrooms">Number of Bathrooms</label>
            <input type="number" name="bathrooms" class="form-control">
        </div>
        <div class="form-group">
            <label for="floors">Number of Floors</label>
            <input type="number" name="floors" class="form-control">
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
        <div class="form-group">
            <label for="icons">Icons</label>
            <?php foreach ($icons as $icon) : ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="icons[]" value="<?= $icon->id ?>" id="defaultCheck1">
                    <label for="1"><?= $icon->title ?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="form-group">
            <label for="images">Images</label>
            <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
        </div>
        <br>

        <button class="btn btn-primary" type="submit">Submit</button>

    </form>
    <!-- <img src="/assets/uploads/non-non-unde-ut-pari-1.jpg" alt=""> -->

</div>
<?= $this->endSection() ?>