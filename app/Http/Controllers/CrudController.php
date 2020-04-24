<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use LaravelLocalization;

class CrudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         
    }
    
   /*public function store(){
        Offer::create([
          'name' => 'Ahmed',
          'price' => '4000',
          'details' => 'offer details',
        ]);
    }*/
    public function create(){
        return view('offers.create');
    }
    public function store(OfferRequest $request){
        //validate data before insert to database
      
        //$rules = $this->getRules();
        //$messages = $this->getMessages();
          //$validator = Validator::make($request->all(), $rules, $messages);
           
       
          //if($validator -> fails()){
            //return redirect()->back()->withErrors($validator)->withInput();
          //}
        //insert
        Offer::create([
            'name_en' => $request->name_en,
            'name_fr' => $request->name_fr,
            'name_ar' => $request->name_ar,
            'price' =>$request->price,
            'details_en' =>$request->details_en,
            'details_fr' =>$request->details_fr,
            'details_ar' =>$request->details_ar
        ]);
        return redirect()->back()->with(['success' => 'تم اضافة العرض بنجاح']);
    }
    /*protected function getRules(){
        return $rules = [
            //'name' => 'required|max:100|unique:offers,name',
            //'price' => ' required|numeric',
            //'details' => 'required',
        ];
      }
    
     protected function getMessages(){
         return $messages = [
            //'name.required' => trans('messages.offer name required'),
            //'name.unique' => trans('messages.offer name must be unique'),
            //'price.required' => trans('messages.offer price required'),
            //'details.required' => trans('messages.offer d required'),

         ];
     }*/

     public function getAllOffers()
    {
        $offers = Offer::select('id',
            
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'price',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details'
        )->get(); // return collection
        return view('offers.all', compact('offers'));
    }
}