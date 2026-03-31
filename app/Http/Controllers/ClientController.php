<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
     public function index() {
       $clients = Client::query()->paginate(12);
       return view("clients.index", compact("clients"));
    }

    public function create() {
        return view("clients.create");
    }

    public function store(Request $request) 
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'DNI'      => ['required'],
            'address'   => ['required'],
            'phone_number' => ['required'],
            'email' => ['required', 'email']
        ]);

      Client::create($attributes);

     return redirect("/dashboard/clients")->with("message", "Client created successfully");

    }

    public function show(Client $client) {
      
      return view("clients.show", compact("client"));
    }

     public function edit(Client $client) {
          return view("clients.edit", ['client'=> $client]);
    }

     public function update(Client $client) {

         request()->validate([
            'name' => ['required'],
            'DNI'      => ['required'],
            'address'   => ['required'],
            'phone_number' => ['required'],
            'email' => ['required', 'email']
        ]);

        $client->update([
            'name' => request('name'),
            'DNI' => request('DNI'),
            'address'   => request('address'),
            'phone_number' => request('phone_number'),
            'email' => request('email')
        ]);

        return redirect("/dashboard/clients")->with("message", "Client updated successfully");
    }

    public function destroy(Client $client) {
          $client->delete();
          return redirect("/dashboard/clients")->with("message", "Client deleted successfully");
    }

    public function search(Client $client) {
      $clientName = request()->query("client");
      $clients = Client::query()->where("name", "LIKE", "$clientName%")->paginate(10);
      return view("clients.index", compact("clients"));
    }
}
