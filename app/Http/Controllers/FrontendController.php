<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Contactinfo;
use App\Models\Homebanner;
use App\Models\Inventory;
use App\Models\Policy;
use App\Models\Pro_gallary;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Size;
use App\Models\Team;

class FrontendController extends Controller
{
    public function index(){
        $policies =Policy::all();
        $categories =Category::all();
        $products = Product::latest()->get();
        $new_products = Product::latest()->offset(0)->limit(4)->get();
        $banners = Homebanner::offset(0)->limit(3)->get();


        return view('frontend.index',compact('policies','categories','products','banners','new_products'));
    }
    public function about(){

        return view('frontend.about',[
            'abouts' => About::all(),
            'services' => Service::all(),
            'teams' => Team::all(),
        ]);
    }
    public function shop(){

        return view('frontend.shop',[
            'products' => Product::all(),
        ]);
    }
    public function contact(){

        return view('frontend.contact',[
            'contactinfos' => Contactinfo::all(),
        ]);
    }
    public function accounts(){

        return view('frontend.accounts');
    }
    public function cusregi(Request $request){

        // error part
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        // error part

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer',
            'created_at' => Carbon::now(),
        ]);
        return redirect('/');
    }

    public function productdetails($id){

        $products=Product::findorfail($id);
        $inventories= Inventory::Where("product_id",$products->id)->get();
        $products_gals= Pro_gallary::Where("product_id",$products->id)->get();
        $sizes = explode(",",$products->sizes);
        // Related products code
        $relative_product = Product::where('product_category',$products->product_category)->where('id','!=',$id)->get();
        // Related products code
        return view('frontend.productdetails',compact('products','relative_product','inventories','products_gals'));
    }
}
