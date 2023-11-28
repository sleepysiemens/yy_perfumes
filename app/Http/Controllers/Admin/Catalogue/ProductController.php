<?php

namespace App\Http\Controllers\Admin\Catalogue;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $request->file('product_img');

        $imageName = time() . '_' . Str::slug($img->getFilename()) . "." . $img->extension();

        // Public Folder
        $img->move(public_path('storage/products'), $imageName);

        Product::query()->create([
            'category_id' => $request->input('category_id'),
            'img' => $imageName,
            'title' => [
                'en' => $request->input('en_title'),
                'ru' => $request->input('ru_title'),
            ],
            'short_description' => [
//                'en' => $request->input('en_title'),
//                'ru' => $request->input('ru_title'),
            ],
            'description' => [
                'en' => $request->input('en_description'),
                'ru' => $request->input('ru_description'),
            ],
            'cost' => $request->input('cost'),
            'cost_dealer' => $request->input('cost_dealer'),
            'cost_vip_dealer' => $request->input('cost_vip_dealer'),
            'slug' => $request->input('slug') ?? Str::slug($request->input('en_title')),
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'category_id' => $request->input('category_id'),
            'title' => [
                'en' => $request->input('en_title'),
                'ru' => $request->input('ru_title'),
            ],
            'description' => [
                'en' => $request->input('en_description'),
                'ru' => $request->input('ru_description'),
            ],
            'fix_prices' => [
                'RUB' => $request->input('fix_prices_rub'),
                'USD' => $request->input('fix_prices_usd'),
                'KAZ' => $request->input('fix_prices_kaz'),
            ],
            'cost' => $request->input('cost'),
            'cost_dealer' => $request->input('cost_dealer'),
            'cost_vip_dealer' => $request->input('cost_vip_dealer'),
            'slug' => $request->input('slug') ?? Str::slug($request->input('en_title')),
        ]);

        return redirect()->back()->with('success', 'Товар успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
