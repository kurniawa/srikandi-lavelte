<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function chooseCategory () {
        return Inertia::render("Products/ChooseCategory", []);
    }

    public function create (Request $request) {
        $get = $request->query();
        if (!isset($get['category'])) {
            return redirect()->route('products.choose_category');
        }
        $category = Category::where('slug', $get['category'])->first();
        $category_name = $category ? $category->name : null;
        $ornament_types = [];
        $ornament_variants = [];
        if ($category->parent_slug === 'jewelry') {
            $ornament_types = Category::where('division', 'ornament_types')->select('id', 'slug', 'nama')->get()->toArray();
            $ornament_variants = Category::where('division', 'ornament_variants')->select('id', 'slug', 'name', 'parent_slug')->get()->toArray();
            // dd($ornament_types);
            // dd($ornament_variants);
        }

        $attributes = Attribute::select('id', 'parent_slug', 'name', 'nama', 'slug', 'data_type')->get();
        $gold_colors = $attributes->where('parent_slug', 'gold-color')->values()->toArray();
        $trays = $attributes->where('parent_slug', 'tray')->values()->toArray();
        $conditions = $attributes->where('parent_slug', 'condition')->values()->toArray();
        return Inertia::render("Products/Create", [
            'category' => $category_name,
            'ornament_types' => $ornament_types,
            'ornament_variants' => $ornament_variants,
            'gold_colors' => $gold_colors,
            'trays' => $trays,
            'conditions' => $conditions,
        ]);
    }
}
