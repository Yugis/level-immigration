<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PropertyModel;

class Properties extends BaseController
{
    public function __construct()
    {
        $this->data['title'] = 'Create a Property';
    }

    public function create()
    {
        echo view('partials/header', $this->data);
        echo view('properties/create');
        return view('partials/footer');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        $property = $this->request->getVar(['title', 'type', 'price', 'size', 'bedrooms', 'bathrooms', 'floors', 'country_id', 'city_id']);
        $property['slug'] = $this->slugify($property['title']);
        $property['user_id'] = session()->get('id');

        $data = $this->request->getVar(['summary', 'whys', 'details', 'location']);

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

        return redirect()->to('create');
    }

    private function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
