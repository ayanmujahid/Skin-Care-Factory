<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /*
    |----------------------------------
    | LIST ORDERS
    |----------------------------------
    */
    public function index(Request $request)
    {
        $query = Order::with(['user', 'professional', 'items.variant.product.mainImage']);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%")
                    ->orWhere('email', 'like', "%{$request->search}%")
                    ->orWhere('phone', 'like', "%{$request->search}%")
                    ->orWhere('id', $request->search);
            });
        }

        $status = $request->status;

        if ($status) {
            $query->where('status', $status);
        }

        $orders = $query->latest()->paginate(20);

        return view('admin.order-management.index', [
            'orders' => $orders,
            'status' => $status,
        ]);
    }

    /*
    |----------------------------------
    | SHOW SINGLE ORDER
    |----------------------------------
    */
    public function show($id)
    {
        $order = Order::with([
            'items.variant.product',
            'user',
            'professional.professionalProfile'
        ])->findOrFail($id);

        return view('admin.order-management.edit', compact('order'));
    }

    public function ordersByStatus($status)
    {
        $orders = Order::with(['user', 'professional'])
            ->where('status', $status)
            ->latest()
            ->paginate(20);

        return view('admin.order-management.index', compact('orders', 'status'));
    }

    /*
    |----------------------------------
    | UPDATE ORDER STATUS
    |----------------------------------
    */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        DB::beginTransaction();

        try {

            $order = Order::with('items.variant')->findOrFail($id);

            $oldStatus = $order->status;

            $order->update([
                'status' => $request->status,
            ]);

            /*
        |----------------------------------
        | RESTORE STOCK IF CANCELLED
        |----------------------------------
        */
            if ($request->status === 'cancelled' && $oldStatus !== 'cancelled') {

                foreach ($order->items as $item) {

                    $item->variant->increment('stock', $item->quantity);
                }
            }

            DB::commit();

            return back()->with('success', 'Order status updated!');
        } catch (\Throwable $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }
}
