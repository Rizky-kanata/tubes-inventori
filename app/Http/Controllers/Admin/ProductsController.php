<?php

namespace App\Http\Controllers\Admin;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {

        $products = Product::with('category')->latest()->paginate(10);


        return view('pages.products.index', [
            "products" => $products,
        ]);
    }
    public function create()
    {

        $categories = Category::all();

        return view('pages.products.create', [
            "categories" => $categories,
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stock" => "required",
            "sku" => "required",
            "category_id" => "required",
        ], [
            "name.required" => "Nama produk harus diisi!",
            "name.min" => "Minimal 3 Karakter!",
            "price.required" => "Harga harus diisi!",
            "stock.required" => "Stok harus diisi!",
            "sku.required" => "Kode produk harus diisi!",
            "category_id.required" => "Kategori harus diisi!"
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Berhasil menambahkan produk');
    }

    public function edit($id)
    {

        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('pages.products.edit', [
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate(
            [
                "name" => "required|min:3",
                "description" => "nullable",
                "price" => "required",
                "stock" => "required",
                "sku" => "required",
                "category_id" => "required",
            ],
            [
                "name.required" => "Nama produk harus diisi!",
                "name.min" => "Minimal 3 Karakter!",
                "price.required" => "Harga harus diisi!",
                "stock.required" => "Stok harus diisi!",
                "sku.required" => "Kode produk harus diisi!",
                "category_id.required" => "Kategori harus diisi!"
            ]
        );

        Product::where('id', $id)->update($validated);

        return redirect('/products')->with('success', 'Berhasil mengubah produk');
    }

    public function delete($id)
    {

        $product = Product::where('id', $id);
        $product->delete();

        return redirect('/products')->with('success', 'Berhasil menghapus produk');
    }

    public function exportPdf()
    {
        $products = Product::all();
        $pdf = Pdf::loadView('pages.products.export_pdf', compact('products'));
        return $pdf->download('products.pdf');
    }
}
