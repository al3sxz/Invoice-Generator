<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Models\Invoice;
use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function index(Invoice $invoice)
    {
        $invoices = Invoice::query()->paginate(9);
        return view("invoices.index", compact("invoices"));
    }

    public function create()
    {
        $services = Service::all();
        $clients = Client::all();
        return view("invoices.create", compact('services', 'clients'));
    }

    private function generateNumber(): string
    {
        $last = Invoice::latest('id')->first();
        $next = $last ? $last->id + 1 : 1;
        return 'INV-' . str_pad($next, 4, '0', STR_PAD_LEFT);
    }

    public function downloadPDF(Invoice $invoice) {
    $company = Company::get()[0];
    $pdf = Pdf::loadView('invoices.pdf', compact('invoice', 'company'));
    return $pdf->download("invoice-{$invoice->invoice_number}.pdf");

    }

    public function store(Request $request)
    {

        $invoice = Invoice::create([
            'invoice_number' => $this->generateNumber(),
            'client_id'      => $request->client_id,
            'expiration_date' => $request->expiration_date,
            'status'         => 'PENDING',
            'notes'          => $request->notes,
            'sub_total'      => $request->sub_total,
            'tax_percentage' => $request->tax_percentage,
            'tax_value'      => $request->tax_value,
            'final_value'    => $request->final_value,
        ]);

       
        foreach ($request->service_id as $index => $serviceId) {
            $invoice->services()->attach($serviceId, [
                'quantity'   => $request->quantity[$index],
                'unit_price' => $request->unit_price[$index],
                'sub_total'  => $request->quantity[$index] * $request->unit_price[$index],
            ]);
        }

        return redirect('/dashboard/invoices')->with("message", "Invoice created successfully");
    }

    public function show(Invoice $invoice) {
        
        return view("invoices.show", compact("invoice"));
    }

    public function search(Invoice $invoice) {

      $clientName = request()->query("invoice");

     $invoices = Invoice::whereHas('client', function ($query) use ($clientName) {
       $query->where("name", "like", "$clientName%");
     })->with('client')->get();

      return view("invoices.index", compact("invoices"));
    }
}
