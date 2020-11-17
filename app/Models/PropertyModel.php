<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
    protected $table      = 'properties';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';

    protected $allowedFields = ['title', 'type', 'slug', 'price', 'size', 'bedrooms', 'bathrooms', 'floors', 'country_id', 'city_id', 'map_embed', 'longitude', 'latitude'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
