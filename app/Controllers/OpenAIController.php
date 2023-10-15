<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Orhanerday\OpenAi\OpenAi;

class OpenAIController extends Controller
{
    public function index()
    {
        return view('admin/product/openai_form');
    }

    public function generateImages()
    {
        $openAi = new OpenAi('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');

        $prompt = $this->request->getVar('prompt');


        $complete = $openAi->image([
            "prompt" => $prompt,
            "n" => 1,
            // number of images
            "size" => "256x256",
            // image dimension
            "response_format" => "b64_json",
            // use 'url' for less credit usage
        ]);
        // Pass the image data to the view
        // Check if $complete is a string (JSON) and decode it into an array
        $data['images'] = is_string($complete) ? json_decode($complete, true) : [];
        // Encode the array as a JSON string before sending the response
        $jsonResponse = json_encode($data['images']);
        // return $jsonResponse;

        // Return the JSON response
        return $this->response->setJSON($data['images'])->setStatusCode(200);


        // $prompt = $this->request->getVar('prompt');
// return $prompt.'re';
        //     $complete = $openAi->image([
        //         "prompt" => $prompt,
        //         "n" => 1,
        //         // number of images
        //         "size" => "256x256",
        //         // image dimension
        //         "response_format" => "b64_json",
        //         // use 'url' for less credit usage
        //     ]);
        //     // Pass the image data to the view
        //     // Check if $complete is a string (JSON) and decode it into an array
        //     $data['images'] = is_string($complete) ? json_decode($complete, true) : [];

        //     // echo "<pre>";
        //     // print_r($data['images']);
        //     // exit();

        //     return view('admin/product/openai_image', $data);
    }
}