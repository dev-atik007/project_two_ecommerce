<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Models\Order;

class PdfController extends Controller
{
    public function printPdf($id)
    {
        $order=Order::find($id);
        $pdf= PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }
}
