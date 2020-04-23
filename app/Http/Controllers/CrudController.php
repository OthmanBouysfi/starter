<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;

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
    public function getOffers(){
        return Offer::select('id','name')->get();
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
    public function store(Request $request){
        //validate data before insert to database
      
        $rules = $this->getRules();
        $messages = $this->getMessages();
          $validator = Validator::make($request->all(), $rules, $messages);
           
       
          if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput();
          }
        //insert
        Offer::create([
            'name' => $request->name,
            'price' =>$request->price,
            'details' =>$request->details,
        ]);
        return redirect()->back()->with(['success' => 'تم اضافة العرض بنجاح']);
    }
    protected function getRules(){
        return $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => ' required|numeric',
            'details' => 'required',
        ];
      }
    
     protected function getMessages(){
         return $messages = [
            'name.required' => 'اسم العرض',
            'price.required' => 'السعر المطلوب',
            'details.required' => 'التفاصيل العرض المطلوبة ',

         ];
     }
}