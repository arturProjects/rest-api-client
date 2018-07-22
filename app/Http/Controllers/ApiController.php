<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public $client;
    public $url; 

    public function __construct()
    {
       $this->client = new Client();
       $this->url = 'http://localhost:8001/api/items/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->client->request('GET', $this->url);
        $response = $response->getBody()->getContents(); 
        $response = json_decode($response);
        return view("items/index", compact('response'));

    } 
    
    /**
     * Display a listing of the resource with params.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $response = $this->client->request('GET', $this->url.$request->column.'/'.$request->sign.'/'.$request->value);
        $response = $response->getBody()->getContents();
        $response = json_decode($response);
        return view("items/index", compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("items/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = $this->client->request('POST', $this->url, [
        'form_params' => [
            'name' => $request->name,
            'amount' => $request->amount
         ]
       ]); 
       $response = $response->getBody()->getContents();
       return redirect("items");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = $this->client->request('GET', $this->url.$id);
        $response = $response->getBody()->getContents();
        $response = json_decode($response); 
        $item = $response->data;
        return view("items/show", compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = $this->client->request('GET', $this->url.$id);
        $response = $response->getBody()->getContents();
        $response = json_decode($response); 
        $item = $response->data;
        return view("items/edit", compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $response = $this->client->request('PUT', $this->url.$request->id, [
        'form_params' => [
            'name' => $request->name,
            'amount' => $request->amount
         ]
       ]); 
       $response = $response->getBody()->getContents();
       return redirect("items"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $response = $this->client->request('DELETE', $this->url.$id); 
       $response = $response->getBody()->getContents();
       return redirect("items");
    }
}
