<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PropertyModel;

class Properties extends BaseController
{
    public function __construct()
    {
        $this->data['title'] = 'Properties';
    }

    public function index()
    {
        $db = \Config\Database::connect();

        $this->data['properties'] = (new PropertyModel())->findAll();

        foreach ($this->data['properties'] as $property) {
            $city = $db->table('cities')->where('id', $property->city_id)->get()->getResult()[0];
            $country = $db->table('countries')->where('id', $property->country_id)->get()->getResult()[0];
            $property->city = $city->name;
            $property->country = $country->name;
        }

        return view('properties/index', $this->data);
    }

    public function create()
    {
        $db = \Config\Database::connect();

        $this->data['icons'] = $db->table('icons')->get()->getResult();

        return view('properties/create', $this->data);
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        $property = $this->request->getVar(['title', 'type', 'price', 'size', 'bedrooms', 'bathrooms', 'floors', 'country_id', 'city_id', 'map_embed', 'longitude', 'latitude']);
        $property['slug'] = url_title($property['title'], '-', true);
        $property['user_id'] = session()->get('user')['id'];

        $data = $this->request->getVar(['summary', 'whys', 'details', 'location']);
        $icons = $this->request->getVar(['icons'])['icons'] ?? null;

        $validation->setRules([
            'title' => 'required|string',
            'type' => 'required|string',
            'price' => 'required',
            'city' => 'required',
            'country_id' => 'required'
        ]);

        // if (!$validation->run($property)) {
        //     die(json_encode($validation->getErrors()));
        // }

        $property_id = (new PropertyModel())->insert($property);

        foreach ($data as $key => $value) {
            if ($key == 'whys') {
                foreach ($value as $why) {
                    $contents['property_id'] = $property_id;
                    $contents['field'] = 'whys';
                    $contents['content'] = $why;
                    $content[] = $contents;
                    $contents = [];
                }
                continue;
            }
            $contents['property_id'] = $property_id;
            $contents['field'] = $key;
            $contents['content'] = $value;
            $content[] = $contents;
            $contents = [];
        }

        $db = \Config\Database::connect();
        $db->table('property_contents')->insertBatch($content);

        if (!is_null($icons)) {
            foreach ($icons as $icon_id) {
                $icons_data[] = [
                    'property_id'   => $property_id,
                    'icon_id'       => $icon_id
                ];
            }
            $db->table('property_icons')->insertBatch($icons_data);
        }

        if ($_FILES['images']['name'][0] !== '') {
            if ($imagefile = $this->request->getFiles()) {
                foreach ($imagefile['images'] as $index => $img) {
                    if ($img->isValid() && !$img->hasMoved()) {
                        $imgName = $property['slug'] . '-' . ($index + 1) . '.' . $img->getClientExtension();
                        $img->move('./assets/uploads', $imgName);
                        $propertyImages[] = [
                            'property_id'   => $property_id,
                            'image_path'    => '/assets/uploads/' . $property['slug'] . '-' . ($index + 1) . '.' . $img->getClientExtension(),
                        ];
                    }
                }
                $db->table('properties_images')->insertBatch($propertyImages);
            }
        }

        return redirect()->to('create');
    }

    public function show()
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('properties');
        // $property = $builder->get()->getResult();
        // $property_id = $property[0]->id;
        // // die(json_encode($builder->get()->getResult()[0]->id));
        // $builder = $db->table('properties_images');
        // $images = $builder->where('property_id', $property_id)->get()->getResult();
        // die(json_encode($images));
        // // $builder->get();
        // // $query = $builder->join('properties_images', 'properties_images.property_id = properties.id', '')
        // $builder = $builder->join('properties_images', 'properties_images.property_id = properties.id');
        // $query = $builder->get()->getResult();
        // die(json_encode($query));
    }
}
