<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CloudController extends Controller
{
    public function __construct()
    {
        
    }

    public function getOffer()
    {
        return Offer::select('id','name')->get();
    }

    public function store( Request $request)
    {
        $messages = $this->getMessages();

        $rules = $this->getRules();

        $validator = Validator::make($request->all(),$messages,$rules);
        
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }
        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'details' => $request->details
        ]);

        return redirect()->back()->with(['success'=>'تم الإدخال بنجاح']);

    }

    public function create()
    {
        return view('offers.create');
    }

    protected function getMessages() {
        return  [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' =>'required',
        ];
    }

    protected function getRules() {
        return  [
            'name.required' => __('messages.name is required'),
            'price.numeric' => trans('messages.price must be numeric'),
            'details.required' =>'التفاصيل مطلوبة',
        ];
    }
}
