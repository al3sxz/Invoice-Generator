<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->paginate(9);
        return view("services.index", compact("services"));
    }

    public function create()
    {
        return view("services.services-form");
    }

    public function store(Service $service)
    {
         request()->validate([
            'service_name' => ['required'],
            'description'      => ['required'],
            'price'   => ['required'],
        ]);

        $is_active = request("is_active") == "on" ? True : False;

        $service->create([
            'service_name' => request('service_name'),
            'description' => request('description'),
            'price'   => request('price'),
            'is_active' => $is_active
        ]);

        return redirect("/dashboard/services")->with("message", "Service created successfully");
    }

    public function edit(Service $service)
    {
        return view("services.edit", ['service' => $service]);
    }

    public function update(Service $service)
    {

        request()->validate([
            'service_name' => ['required'],
            'description'      => ['required'],
            'price'   => ['required']
        ]);

        $is_active = request("is_active") == "on" ? True : False;

        $service->update([
            'service_name' => request('service_name'),
            'description' => request('description'),
            'price'   => request('price'),
            'is_active' => $is_active
        ]);

        return redirect("/dashboard/services")->with("message", "Service updated successfully");
    }

    public function destroy(Service $service)
    {
        if ($service->invoices()->exists()) {
            return back()->with("error", "This service have invoice associated.");
        }
        $service->delete();
        return redirect("/dashboard/services")->with("message", "Service deleted successfully");
    }

    public function search(Service $service)
    {
        $serviceName = request()->query("service");
        $services = Service::query()->where("service_name", "LIKE", "$serviceName%")->paginate(10);
        return view("services.index", compact("services"));
    }
}
