<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CloudController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        $offer = Offer::select('id',
        'name_'.LaravelLocalization::getCurrentLocale(). ' as name',
        'price',
        'details_'.LaravelLocalization::getCurrentLocale() .' as details')->get();
        return view('offers.index',compact('offer','offer'));
    }
    public function getOffer()
    {
        return Offer::select('id','name')->get();
    }

    public function store( Request   $request)
    {
        $messages = $this->getMessages();

        $rules = $this->getRules();

        $validator = Validator::make($request->all(),$messages,$rules);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }

        $file_extension = $request->photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'images/offers';

        $request->photo ->move($path,$file_name);
        
        Offer::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar
        ]);

        return redirect()->back()->with(['success'=>'تم الإدخال بنجاح']);

    }

    public function create()
    {
        return view('offers.create');
    }

    public function edit($offer_id)
    {
        $data = Offer::find($offer_id);
        if(!$data)
            return redirect()->back()->withErrors(['error'=>'this id is not found']);
        return view('offers.edit',['offer'=>$data]);;
    }
    protected function getRules()
    {
        return  [
            'name_en.required' => __('messages.name_en is required'),
            'name_ar.required' => __('messages.name_ar is required'),
            'price.numeric' => trans('messages.price must be numeric'),
            'details_en.required' =>'english details is requiered',
            'details_ar.required' =>'arabic details is requiered',
        ];
    }

    protected function getMessages() {
        return  [
            'name_en' => 'required|max:100|unique:offers,name_en',
            'name_ar' => 'required|max:100|unique:offers,name_ar',
            'price' => 'required|numeric',
            'details_en' =>'required',
            'details_ar' =>'required',
        ];
    }


}
