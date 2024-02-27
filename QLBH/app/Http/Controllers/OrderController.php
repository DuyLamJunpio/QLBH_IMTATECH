<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\billDetail;
use App\Models\Product;
use App\Models\product_variants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(Request $request, string $status)
    {
        $userId = Auth::user()->id;

        if ($status == 'all') {
            $bills = Bill::where('user_id', $userId)
                ->with(['billDetails.product.category', 'billDetails.variant'])
                ->get();
        } else {
            $bills = Bill::where('user_id', $userId)
                ->whereHas('billDetails', function ($query) use ($status) {
                    $query->where('status', $status);
                })
                ->with(['billDetails.product.category', 'billDetails.variant'])
                ->get();
        }

        if ($request->ajax()) {
            return view('User.profile.status', ['bills' => $bills])->render();
        } else {
            return view('User.profile.purchase', ['bills' => $bills]);
        }
    }

    public function showDetail(Request $request, string $id)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $color = $request->color;
            $size = $request->size;
            $variant = product_variants::where([
                ['color', $color],
                ['size', $size]
            ])->first();
            $quantity = $request->quantity;
        }
        $product = Product::join('categories', 'products.cat_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS categories_name')
            ->find($id);
        return view("User.product.donhang", compact("product", "variant", "quantity"));
    }

    public function showOrder(Request $request)
    {
        $validated = $request->validate([
            'selectedIds' => 'required|json',
            'selectedQuantities' => 'required|json',
        ]);

        // Decode the JSON strings into arrays
        $selectedIds = json_decode($request->selectedIds, true);
        $selectedQuantities = json_decode($request->selectedQuantities, true);
        $carts = DB::table('carts')
            ->join('product_variants', 'carts.idVariant', '=', 'product_variants.id')
            ->join('products', 'carts.idProduct', '=', 'products.id')
            ->where('carts.idUser', Auth::user()->id)
            ->whereIn('carts.id', $selectedIds) // Filter by selectedIds
            ->select(
                'carts.*',
                'carts.id AS cart_id',
                'product_variants.*',
                'product_variants.id AS product_variant_id',
                'products.*',
                'products.id AS id_Prod'
            )
            ->get();
        return view("User.product.order", compact("carts", "selectedQuantities"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createOrder(Request $request)
    {
        if ($request->isMethod('POST')) {
            // Validate the request...
            $validated = $request->validate([
                'products' => 'required|array',
                'products.*.id' => 'required|exists:products,id',
                'products.*.quantity' => 'required|integer|min:1',
                'products.*.variant_id' => 'exists:product_variants,id'
            ]);

            // Create the order
            $bill = new Bill;
            $bill->user_id = Auth::user()->id;
            $bill->save();

            // Add the products to the order
            foreach ($request->products as $product) {
                $billDetail = new billDetail;
                $billDetail->bill_id = $bill->id;
                $billDetail->product_id = $product['id'];
                $billDetail->quantity = $product['quantity'];
                $billDetail->variant_id = $product['variant_id'];
                $billDetail->status = 0;
                $billDetail->save();
            }
            if ($bill->id) {
                return redirect()->route('trangchu')->with('success', 'Add order successfully!');
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        return redirect()->back()->with('success', 'Delete bill successfully!');
    }
}
