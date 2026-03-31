<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $fillable =
    ['invoice_number', 'client_id', 'expiration_date', 'status', 'notes', 'sub_total', 'tax_value', 'tax_percentage', 'final_value'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'invoice_service')
            ->withPivot('quantity', 'unit_price', 'sub_total', 'notes')
            ->withTimestamps();
    }
}
