<?php

namespace App\Http\Controllers;

use League\Csv\Writer;
use App\Models\Discounts;
use App\Models\Regions;
use App\Models\Brands;
use App\Models\AccessTypes;
use App\Models\DiscountsRanges;
use App\Http\Requests\StoreDiscountsRequest;
use App\Http\Requests\UpdateDiscountsRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DiscountsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Regions::all();
        $brands = Brands::all();
        $access_types = AccessTypes::all();

        return view('create',compact('regions','brands','access_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiscountsRequest $request)
    {

        $dataDiscount = $request->only(['name', 'start_date','end_date','priority','active','region_id','brand_id','access_type_code']);
        $discounts = Discounts::create($dataDiscount);

        $recentlyCreatedId =  $discounts->id;

        for ($i = 1; $i <= 3; $i++) {

            $discountKey = "discount$i";
            $codeKey = "code$i";
            $fromDaysKey = "from_days$i";
            $toDaysKey = "to_days$i";

            if($request->has( $fromDaysKey) && $request->has($toDaysKey) && !is_null($request->input($fromDaysKey)) && !is_null($request->has($toDaysKey)) )
            {
                $rangesDiscounts = DiscountsRanges::create([
                    'from_days' => $request->input($fromDaysKey),
                    'to_days' => $request->input($toDaysKey),
                    'discount' => $request->input($discountKey),
                    'code' => $request->input($codeKey),
                    'discount_id' => $recentlyCreatedId,]
                );
            }
        }


        return redirect()->route('home')->with('success','Discount has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function show(Discounts $discounts)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Discounts $discounts)
    {

        $regions = Regions::all();
        $brands = Brands::all();
        $access_types = AccessTypes::all();
        $id = $request->query('data');
        $data =  Discounts::with('discountsRanges', 'brands' ,'regions', 'accessTypes')->find($request->query('data'));
        $data = json_decode($data);

        return view('edit', compact('data','regions','brands','access_types','id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscountsRequest  $request
     * @param  \App\Models\Discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscountsRequest $request, Discounts  $discounts)
    {

        $dataDiscount = $request->only(['name', 'start_date','end_date','priority','active','region_id','brand_id','access_type_code']);
        $discounts = Discounts::find($request->input('id'));

        $discounts->update($dataDiscount);



        for ($i = 1; $i <= 3; $i++) {

            $discountKey = "discount$i";
            $codeKey = "code$i";
            $fromDaysKey = "from_days$i";
            $toDaysKey = "to_days$i";

            if($request->has( $fromDaysKey) && $request->has($toDaysKey) && !is_null($request->input($fromDaysKey)) && !is_null($request->has($toDaysKey)) )
            {
                $rangesDiscounts = DiscountsRanges::where('discount_id',$request->input('id'))->update([
                    'from_days' => $request->input($fromDaysKey),
                    'to_days' => $request->input($toDaysKey),
                    'discount' => $request->input($discountKey),
                    'code' => $request->input($codeKey),
                    'discount_id' => $request->input('id'),]
                );
            }
        }


        return redirect()->route('home')->with('success','Discount has been updated successfully.');
    }


    public function destroy(Request $request,Discounts $discounts, DiscountsRanges $ranges)
    {
        $discounts = Discounts::find($request->input('data'))->delete();

        return redirect()->route('home')->with('success','Discount has been erased');
    }

    public function exportToCsv()
    {

        $discounts = Discounts::with('discountsRanges', 'brands' ,'regions', 'accessTypes')->get();

        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        foreach ($discounts as $discount) {
            $csv->insertOne([
                $discount->brands->name,
                $discount->regions->name,
                $discount->name,
                $discount->accessTypes->name,
                $discount->active,
                $discount->priority,
                $discount->start_date,
                $discount->start_end
            ]);
        }

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="descuentos.csv"',
        ];

        return response($csv->getContent(), 200, $headers);
    }
}
