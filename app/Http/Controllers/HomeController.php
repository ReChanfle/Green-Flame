<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discounts;
use App\Models\DiscountsRanges;
use App\Models\Brands;
use App\Models\Regions;
use App\Models\AccessTypes;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $brands = Brands::all();
        $regions = Regions::all();

        $discounts = Discounts::with('discountsRanges', 'brands', 'regions', 'accessTypes')->paginate(5);

        return view('home',compact('discounts','brands','regions'));
    }

    public function filter(Request $request)
    {
        //dd($request->input('rentadora'),$request->input('region'),$request->input('nombre_descuento'), $request->input('code'));
        $brands = Brands::all();
        $regions = Regions::all();
        $code = $request->input('code');

       // $discounts = Discounts::with('discountsRanges', 'brands', 'regions', 'accessTypes')->where([
       // ['brand_id',$request->input('rentadora')],
       // ['region_id',$request->input('region')],
        //['name',$request->input('nombre_descuento')]
       // ])->paginate(2);

       $discounts = Discounts::with('discountsRanges', 'brands', 'regions', 'accessTypes')
       ->where('brand_id', $request->input('rentadora'))
       ->where('region_id', $request->input('region'))
       ->when($request->filled('nombre_descuento'), function ($query) use ($request) {
           $query->where('name', $request->input('nombre_descuento'));
       })
       ->when($code, function ($query, $code) {
           $query->whereHas('discountsRanges', function ($query) use ($code) {
               $query->where('code', $code);
           });
       })
       ->paginate(5);


        return view('home',compact('discounts','brands','regions'));
    }
}

