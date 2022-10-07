<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGallery;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $product = Product::join('product_galleries', "products.id", "=", "product_galleries.products_id")
                // ->where('products.id', $id)
                // ->get();
                ->find($id);

            if ($product) {
                return ResponseFormater::success($product, "Data produk berhasil diambil");
            } else {
                return ResponseFormater::error(null, "Data produk tidak ada", 404);
            }
        }

        if ($slug) {
            $product = Product::join('product_galleries', "products.id", "=", "product_galleries.products_id")
                ->where('product_galleries.deleted_at', '!=', Null)
                ->where('products.slug', '=', $slug)
                ->first();

            if ($product) {
                return ResponseFormater::success($product, "Data produk berhasil diambil");
            } else {
                return ResponseFormater::error(null, "Data produk tidak ada", 404);
            }
        }

        $product = Product::join('product_galleries', "products.id", "=", "product_galleries.products_id");

        if ($name) {
            $product->where('name', 'LIKE', '%' . $name . '%');
        }

        if ($type) {
            $product->where('type', 'LIKE', '%' . $type . '%');
        }

        if ($price_from) {
            $product->where('price', '>=', $price_from);
        }

        if ($price_to) {
            $product->where('price', '<=', $price_to);
        }

        return ResponseFormater::success(
            $product->paginate($limit),
            'Data list product berhasil diambil'
        );
    }
}
