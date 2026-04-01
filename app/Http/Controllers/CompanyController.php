<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Laravel\Facades\Image;

class CompanyController extends Controller
{
    public function show(Company $company)
    {
        return view("company.show", compact("company"));
    }

    public function edit(Company $company)
    {
        return view("company.edit", compact("company"));
    }

    public function update(Company $company)
    {
        request()->validate([
            'name' => ['required'],
            'nit'      => ['required'],
            'address'   => ['required'],
            'email'   => ['required', 'email'],
            'phone'   => ['required']
        ]);

        $url = null;

        if (request("image")) {
            $upload = request('image');
            $image = Image::read($upload);

            $filename = Str::random() . '.' . $upload->getClientOriginalExtension();
            $encoded = $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 70)->toString();

            Storage::disk('public')->put(
                $filename,
                $encoded
            );

            $url = Storage::disk('public')->url($filename);
        }


        $company->update([
            'name' => request('name'),
            'nit' => request('nit'),
            'address'   => request('address'),
            'email' => request('email'),
            'phone' => request('phone'),
            'logo' => $url
        ]);

        return redirect("/dashboard/company/$company->id")
            ->with("message", "Company updated successfully");
    }
}
