<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: DejaVu Sans, sans-serif;
      font-size: 12px;
      color: #1a1a1a;
      background: #ffffff;
      padding: 40px;
    }

    /* HEADER */
    .header-table { width: 100%; margin-bottom: 36px; }
    .company-name {
      font-size: 22px;
      font-weight: 700;
      color: #1a1a1a;
      letter-spacing: -0.5px;
    }
    .company-details { color: #666; font-size: 11px; line-height: 1.7; margin-top: 6px; }
    .invoice-title {
      font-size: 28px;
      font-weight: 700;
      color: #c8622a;
      text-align: right;
      letter-spacing: -1px;
    }
    .invoice-number { font-size: 13px; color: #888; text-align: right; margin-top: 4px; }

    /* DIVIDER */
    .divider {
      border: none;
      border-top: 2px solid #f0ede8;
      margin: 24px 0;
    }
    .divider-accent {
      border: none;
      border-top: 3px solid #c8622a;
      margin: 0 0 24px 0;
      width: 60px;
    }

    /* BILL TO / META */
    .meta-table { width: 100%; margin-bottom: 32px; }
    .section-label {
      font-size: 9px;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      color: #999;
      font-weight: 700;
      margin-bottom: 6px;
    }
    .client-name { font-size: 14px; font-weight: 700; color: #1a1a1a; margin-bottom: 4px; }
    .client-info { font-size: 11px; color: #666; line-height: 1.7; }
    .meta-box {
      background: #faf8f5;
      border: 1px solid #ede9e0;
      border-radius: 8px;
      padding: 14px 18px;
    }
    .meta-row { margin-bottom: 6px; }
    .meta-key { color: #999; font-size: 10px; text-transform: uppercase; letter-spacing: 1px; }
    .meta-val { color: #1a1a1a; font-size: 12px; font-weight: 600; margin-top: 1px; }

    /* STATUS */
    .status-pill {
      display: inline-block;
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 10px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .status-PENDING  { background: #fff4e6; color: #b86a00; }
    .status-PAID     { background: #e8f5ee; color: #2d7a4f; }
    .status-OVERDUE  { background: #fde8e8; color: #c02020; }
    .status-CANCELED { background: #f0f0ee; color: #888; }
    .status-DRAFT    { background: #f0f0ee; color: #888; }

    /* SERVICES TABLE */
    .services-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 24px;
    }
    .services-table thead tr {
      background: #1a1a1a;
      color: #ffffff;
    }
    .services-table thead th {
      padding: 10px 14px;
      text-align: left;
      font-size: 10px;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: 600;
    }
    .services-table thead th:last-child { text-align: right; }
    .services-table tbody tr { border-bottom: 1px solid #f0ede8; }
    .services-table tbody tr:last-child { border-bottom: none; }
    .services-table tbody td {
      padding: 11px 14px;
      font-size: 12px;
      color: #1a1a1a;
      vertical-align: top;
    }
    .services-table tbody td:last-child { text-align: right; font-weight: 600; }
    .service-desc { font-weight: 600; color: #1a1a1a; }
    .service-notes { font-size: 10px; color: #999; margin-top: 2px; }
    .services-table tbody tr:nth-child(even) td { background: #fdfcfa; }

    /* TOTALS */
    .totals-table { width: 100%; margin-bottom: 28px; }
    .totals-inner {
      width: 260px;
      float: right;
      border: 1px solid #ede9e0;
      border-radius: 10px;
      overflow: hidden;
    }
    .totals-row td {
      padding: 9px 16px;
      font-size: 12px;
      border-bottom: 1px solid #f0ede8;
    }
    .totals-row:last-child td { border-bottom: none; }
    .totals-row .t-label { color: #888; }
    .totals-row .t-val { text-align: right; font-weight: 600; color: #1a1a1a; }
    .totals-total-row { background: #1a1a1a; }
    .totals-total-row td { color: #ffffff; padding: 12px 16px; border-bottom: none; }
    .totals-total-row .t-label { color: #aaa; font-size: 11px; }
    .totals-total-row .t-val { font-size: 16px; font-weight: 700; color: #ffffff; }
    .clearfix::after { content: ""; display: table; clear: both; }

    /* NOTES */
    .notes-box {
      background: #faf8f5;
      border-left: 3px solid #c8622a;
      padding: 12px 16px;
      border-radius: 0 8px 8px 0;
      margin-bottom: 32px;
    }
    .notes-box p { font-size: 11px; color: #666; line-height: 1.6; }

    /* FOOTER */
    .footer {
      border-top: 1px solid #ede9e0;
      padding-top: 16px;
      text-align: center;
      color: #bbb;
      font-size: 10px;
      line-height: 1.7;
    }
  </style>
</head>
<body>

  {{-- HEADER --}}
  <table class="header-table">
    <tr>
      <td style="width:60%">
        @if($company->logo)
          <img src="{{ public_path('storage/' . $company->logo) }}" height="48" style="margin-bottom:8px"><br>
        @endif
        <div class="company-name">{{ $company->name }}</div>
        <div class="company-details">
          NIT: {{ $company->nit }}<br>
          {{ $company->address }}<br>
          {{ $company->phone }} &nbsp;·&nbsp; {{ $company->email }}
        </div>
      </td>
      <td style="text-align:right; vertical-align:top;">
        <div class="invoice-title">INVOICE</div>
        <div class="invoice-number">{{ $invoice->invoice_number }}</div>
        <div style="margin-top:10px">
          <span class="status-pill status-{{ $invoice->status }}">
            {{ $invoice->status }}
          </span>
        </div>
      </td>
    </tr>
  </table>

  <hr class="divider">

  
  <table class="meta-table">
    <tr>
      <td style="width:55%; vertical-align:top;">
        <div class="section-label">To</div>
        <div class="client-name">{{ $invoice->client->name }}</div>
        <div class="client-info">
          DNI / NIT: {{ $invoice->client->DNI }}<br>
          {{ $invoice->client->address }}<br>
          {{ $invoice->client->phone_number }}<br>
          {{ $invoice->client->email }}
        </div>
      </td>
      <td style="width:40%; vertical-align:top;">
        <div class="meta-box">
          <div class="meta-row">
            <div class="meta-key">Emition Date</div>
            <div class="meta-val">{{ \Carbon\Carbon::parse($invoice->created_at)->format('d M Y') }}</div>
          </div>
          <div class="meta-row">
            <div class="meta-key">Expiration Date</div>
            <div class="meta-val">{{ \Carbon\Carbon::parse($invoice->expiration_date)->format('d M Y') }}</div>
          </div>
        </div>
      </td>
    </tr>
  </table>

 
  <div class="section-label" style="margin-bottom:10px">Services</div>
  <table class="services-table">
    <thead>
      <tr>
        <th style="width:40%">Description</th>
        <th style="width:15%; text-align:center;">Quantity</th>
        <th style="width:20%; text-align:right;">Unit Price.</th>
        <th style="width:20%">Subtotal</th>
      </tr>
    </thead>
    <tbody>
      @foreach($invoice->services as $service)
      <tr>
        <td>
          <div class="service-desc">{{ $service->service_name }}</div>
          @if($service->pivot->notes)
            <div class="service-notes">{{ $service->pivot->notes }}</div>
          @endif
        </td>
        <td style="text-align:center; color:#666;">{{ $service->pivot->quantity }}</td>
        <td style="text-align:right; color:#666;">${{ number_format($service->pivot->unit_price, 2) }}</td>
        <td style="text-align:right;">${{ number_format($service->pivot->sub_total, 2) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

 
  <div class="clearfix">
    <div class="totals-inner">
      <table style="width:100%; border-collapse:collapse;">
        <tr class="totals-row">
          <td class="t-label">Subtotal</td>
          <td class="t-val">${{ number_format($invoice->sub_total, 2) }}</td>
        </tr>
        <tr class="totals-row">
          <td class="t-label">IVA ({{ $invoice->tax_percentage }}%)</td>
          <td class="t-val">${{ number_format($invoice->tax_value, 2) }}</td>
        </tr>
        <tr class="totals-row totals-total-row">
          <td class="t-label">TOTAL</td>
          <td class="t-val">${{ number_format($invoice->final_value, 2) }}</td>
        </tr>
      </table>
    </div>
  </div>

  @if($invoice->notes)
  <div class="notes-box" style="margin-top:24px">
    <div class="section-label" style="margin-bottom:6px">Notes</div>
    <p>{{ $invoice->notes }}</p>
  </div>
  @endif

  {{-- FOOTER --}}
  <div class="footer">
    @if($company->pdf_footer)
      {{ $company->pdf_footer }}<br>
    @endif
    {{ $company->name }} &nbsp;·&nbsp; NIT {{ $company->nit }} &nbsp;·&nbsp; {{ $company->email }}
  </div>

</body>
</html>