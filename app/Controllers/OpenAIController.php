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
        $openAi = new OpenAi(env('OPENAI_API_KEY'));

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
    }
}