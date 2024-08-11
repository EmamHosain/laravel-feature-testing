<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {

        return view('pages.products', [
            'products' => Product::latest()->get()
        ]);
    }

    public function addProducts()
    {
        return view('pages.add-products');
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        $data = array();
        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');
        $data['price'] = $request->input('price');
        Product::create($data);
        return redirect()->back()->with(['success' => 'Product created successfully.']);

    }

    public function editProducts($id)
    {
        // dd(Product::findOrFail($id));
        return view('pages.product-edit', [
            'product' => Product::findOrFail($id),
        ]);
    }
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);


        $product = Product::findOrFail($id);
        $data = array();
        $data['name'] = $request->input('name');
        $data['description'] = $request->input('description');
        $data['price'] = $request->input('price');

        $product->update($data);
        return redirect()->route('get.products')->with(['success' => 'Product updated successfully.']);
    }



    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with(['success' => 'Product deleted successfully.']);

    }
}
