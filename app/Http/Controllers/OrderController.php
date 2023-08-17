<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrderExport;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'product'])
                    ->where('user_id', auth()->user()->id)
                    ->where(function ($query) {
                        $query->where('status', 'pending')
                            ->orWhere('status', 'process');
                    })
                    ->orderByDesc('id')->get();

        return view('module.user.order', compact('orders'));
    }

    public function orderHistory()  
    {
        $orders = Order::with(['user', 'product'])
                    ->where('user_id', auth()->user()->id)
                    ->where(function ($query) {
                        $query->where('status', 'cancel')
                            ->orWhere('status', 'finish');
                    })
                    ->orderByDesc('id')->get();

        return view('module.user.order_history', compact('orders'));
    }

    public function store(Product $product)
    {
        $products = Product::find($product->id);

        $order               = new Order;
        $order->user_id      = Auth::user()->id;
        $order->product_id   = $product->id;
        $order->user_name    = Auth::user()->name;
        $order->user_email   = Auth::user()->email;
        $order->product_name = $product->name;
        $order->price        = $product->price;
        $order->status       = "pending";
        $order->save();

        // kurangi stok produk
        $products->stock = $product->stock - 1;
        $products->save();

        return redirect()->back()->with('message', 'Order di proses!');
    }

    public function cancel(Order $order)
    {
        // $orders = Order::find($order->id);
        $order->update([
            'status'=> "cancel"
        ]);

        // kembalikan stok
        $products = Product::find($order->product_id);
        $products->stock = $products->stock + 1;
        $products->save(); 

        return redirect()->back()->with('message', 'Order di cancel!');
    }

    public function upload(Order $order, Request $request)
    {
        $imagePath = $order->payment_photo;
        if ($request->hasFile('payment_photo')) {
            // Hapus gambar lama jika ada
            if ($order->payment_photo) {
                Storage::delete('public/' . $order->payment_photo);
            }
            // Upload gambar baru
            $imagePath = $request->file('payment_photo')->store('order_images', 'public');
        }

        $order->update([
            'payment_photo'=> $imagePath,
            'status' => "process",
        ]);

        return redirect()->back()->with('message', 'Berhasil upload bukti pembayaran');
    }

    public function excel_export() 
    {
        $orders = Order::with(['user', 'product'])
                    ->where('user_id', auth()->user()->id)
                    ->where(function ($query) {
                        $query->where('status', 'cancel')
                            ->orWhere('status', 'finish');
                    })
                    ->orderByDesc('id')->get();

        $data = [];
        $no = 1;
        foreach ($orders as $order) {                
            $data[] = [
                'No'     => $no++,
                'Nama'   => $order->user_name,
                'Email'  => $order->user_email,
                'Produk' => $order->product_name,
                'Harga'  => $order->price, 
                'Status' => $order->status
            ];
        }

        $header = [
            'No',
            'Nama',
            'Email',
            'Produk',
            'Harga',
            'Status',
        ];

        return Excel::download(new OrderExport($header, $data), 'Data Order '.now().'.xlsx');
    }
}
