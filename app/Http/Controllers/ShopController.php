<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Category;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ShopController extends Controller
{
    public function index()
    {
        // $carousels = Carousel::latest()->take(3)->get();
        // $newProducts = Product::inRandomOrder()->with('productImage')->take(24)->get();
        // return view('shop.index')->with([
        //     'carousels' => $carousels,
        //     'newProducts' => $newProducts,
        // ]);
        $categories = Category::all();
        $products = Product::get();
        return view('shop.index')->with([
            'categories' => $categories,
            'products' => $products,
        ]);
    }
    public function show($id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->with('category')->first();
        // $product->image = $product->productImage->first();

        // $questions = $product->getQuestions()->with('user')->paginate(6);
        // $mightAlsoLike = Product::where('id', '!=', $product->id)->inRandomOrder()->with('productImage')->take(6)->get();

        return view('shop.show')->with([
            'product' => $product,
            'categories' => $categories,
            // 'questions' => $questions,
            // 'mightAlsoLike' => $mightAlsoLike
        ]);
    }

    public function catalog(Request $request)
    {
        $categories = Category::all();
        if ($request) {
            $keyword = $request->search;
            $products = Product::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->paginate(10);
            return view('shop.category')->with([
                'keyword' => $keyword,
                'categories' => $categories,
                'products' => $products,
            ]);
        } else {
            $products = Product::all();
            return view('shop.catalog')->with([
                'categories' => $categories,
                'products' => $products
            ]);
        }
    }

    public function catalogCategory($id)
    {
        $categories = Category::all();
        $category = Category::where('id', $id)->first();
        $products = Product::where('category_id', $category->id)->paginate(10);
        return view('shop.category')->with([
            'categories' => $categories,
            'category' => $category,
            'products' => $products
        ]);
    }

    // public function catalog(Request $request)
    // {
    //     if ($request->has('category')) {
    //         $category = Category::where('id', $request->category)->first();
    //         $products = Product::where('category_id', $category->id)->get();
    //         var_dump($products);
    //     } else {
    //         $products = Product::all();
    //     }
    //     //get random sub categories
    //     // $productCategories = SubCategory::inRandomOrder()->take(20)->get();

    //     // $products = QueryBuilder::for(Product::class)
    //     //     ->allowedFilters([
    //     //         'title',
    //     //         'subCategory',
    //     //         AllowedFilter::scope('min_price'),
    //     //         AllowedFilter::scope('max_price'),
    //     //     ])
    //     //     ->with('productImage')
    //     //     ->paginate(20);

    //     // return view('shop.catalog')->with([
    //     //     'productCategories' => $productCategories,
    //     //     'products' => $products
    //     // ]);
    //     // $products = Product::all();
    //     return view('shop.catalog')->with([
    //         'products' => $products
    //     ]);
    // }
}
