<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Video;
use App\Traits\OfferTrait;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Http\Request;
use LaravelLocalization;


class CrudController extends Controller
{

    use OfferTrait;
    // photo
    // update
    // delete
    // upload image 
    //improve code 


    
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

    public function getOffers()
    {
        return Offer::select('id', 'name')->get();
    }


    public function store(OfferRequest $request){
        //validate data before insert to database
      
        //$rules = $this->getRules();
        //$messages = $this->getMessages();
          //$validator = Validator::make($request->all(), $rules, $messages);
           
       
          //if($validator -> fails()){
            //return redirect()->back()->withErrors($validator)->withInput();
          //}



         //save photo in folder  
        $file_name = $this -> saveImage($request -> photo , 'images/offers');
      
         
        


        //insert
        Offer::create([
            'photo' => $file_name,
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

    public function editOffer($offer_id){
      // Offer::findOrFail($offer_id);
      $offer = Offer::find($offer_id);  // search in given table id only
      if (!$offer)
          return redirect()->back();

      $offer = Offer::select('id', 'name_ar','name_fr' ,  'name_en', 'details_ar', 'details_fr' , 'details_en', 'price')->find($offer_id);

      return view('offers.edit', compact('offer'));
        
      

    }
    public function UpdateOffer(OfferRequest $request , $offer_id){
    //validation request
    
    //check if offer exists
    $offer = Offer::find($offer_id);  // search in given table id only

    if (!$offer)
    return redirect()->back();
    //update data  -- Method 1
     
    $offer -> update($request -> all());
    return redirect() -> back() -> with(['success' => 'تم التحديث بنجاح']);
  
     //Method 2
   /**$offer -> update([
     'name_ar' => $request -> name_ar,
     'name_en' => $request -> name_en,
     'name_fr' => $request -> name_fr,
     'price' => $request -> price,
    ]);*/

    }
    public function DelleteOffer($offer_id){
        //check if offer id exists

        $offer = Offer::find($offer_id); // Offer::where('id','$offer_id') -> first();
        
        if(!$offer)
        return redirect() -> back() -> with(['error' => __('messages.Offer not exist')]);
        
        $offer->delete();
        return redirect()->route('offers.delete',$offer_id)
          ->with(['success' => __('messages.offer deleted successfully')]);
        
    }

    public function getVideo(){
        $video = Video::first();
        event(new VideoViewer($video));
        return view('youtube')->with('video' , $video);

    }

}