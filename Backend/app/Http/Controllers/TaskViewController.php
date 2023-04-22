<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TaskViewController extends Controller
{
    //

    public function index()
    {
        $client = new Client();
        $url  =   'http://localhost:8000/api/login';

        $data['email'] = 'mukhebi@gmail.com';
        $data['password'] = '12345678';


        $request = $client->post($url, [
            'form_params' => $data
        ]);

        $response = $request->getBody();
        //dd($response);

        $info = json_decode($response, true);

        // dd($info);

        $token = $info['data']['token'];
        // return $token;

        $task_url = 'http://localhost:8000/api/tasks';
        $task_requests = $client->get($task_url, [
            'headers' => ['Authorization' => 'Bearer' . $token],

        ]);

        $tasks_response = json_decode($task_requests->getBody(), true);

        return $tasks_response['data'];

        // $tasks = $tasks_response['data'];

        // return view('tasks', compact('tasks'));
    }
}
