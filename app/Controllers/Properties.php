<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Properties extends BaseController
{
    public function create()
    {
        return view('properties/create');
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        $property = $this->request->getVar(['title', 'type', 'price', 'size', 'bedrooms', 'bathrooms', 'floors', 'country_id', 'city_id']);
        $data = $this->request->getVar(['summary', 'whys', 'details', 'location']);
        $property['slug'] = $this->slugify($property['title']);

        // $validation->setRules([
        //     'title' => 'required',
        //     'type' => 'required',
        //     'price' => 'required',
        //     'description' => 'required',
        //     'bedrooms' => 'required',
        //     'bathrooms' => 'required',
        //     'city' => 'required',
        //     'country_id' => 'required'
        // ]);

        // if (!$validation->run($property)) {
        //     die(json_encode($validation->getErrors()));
        // }

        $db = \Config\Database::connect();
        $db->table('properties')->insert($property);

        $last_insert_id = $db->insertID();
        foreach ($data as $key => $value) {
            if ($key == 'whys') {
                foreach ($value as $why) {
                    $contents['property_id'] = $last_insert_id;
                    $contents['field'] = 'whys';
                    $contents['content'] = $why;
                    $content[] = $contents;
                    $contents = [];
                }
                continue;
            }
            $contents['property_id'] = $last_insert_id;
            $contents['field'] = $key;
            $contents['content'] = $value;
            $content[] = $contents;
            $contents = [];
        }

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
