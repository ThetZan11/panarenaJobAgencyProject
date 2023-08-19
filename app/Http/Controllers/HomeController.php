<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Jobs;
use App\Models\User;
use App\Models\Order;
use App\Models\Foodchef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        if(Auth::id()){
            return redirect('redirects');
        }
        else
        $data = Food::all();
        $data2 = Foodchef::all();
        return view("home",compact("data","data2"));
    }

    public function redirects()
    {
        if (Auth::check()) {
            $data = Food::all();


            $usertype = Auth::user()->usertype;

            if ($usertype == '1') {
                return view('admin.adminhome');
            } else {
                $user_id = Auth::id();

                return view('home', compact('data'));
            }
        } else {
            // Handle the case when the user is not authenticated (optional)
            return redirect()->route('login'); // Redirect to the login page or show an error message
        }
    }


    // public function redirects(){

    //     $data = Food::all();
    //     $data2 = Foodchef::all();

    //     $usertype = Auth::user()->usertype;

    //     if($usertype=='1')
    //     {
    //         return view('admin.adminhome');
    //     }
    //     else{

    //         $user_id = Auth::id();

    //         $count = Cart::where('user_id',$user_id)->count();

    //         return view('home',compact('data','data2','count'));
    //     }
    // }

    public function details($id){

        if(Auth::id()){

            $user_id = Auth::id();
            $data = Food::select('title','price','image','description')
            ->where('id',$id)
            ->first();
            return view('details')
            ->with('data',$data);

        }
        else{
            return redirect('/login');
        }
    }

    // public function showcart(Request $request, $id){

    //     // $count = Cart::where('user_id',$id)->count();

    //     if( Auth::id()==$id){

    //     $data2 = Cart::select('*')->where('user_id','=',$id)->get();

    //     $data = Cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();
    //     return view('showcart',compact('data','data2'));
    // }
    // else{
    //     return redirect()->back();
    // }
    // }

    // public function showcart(Request $request, $id){

    //     $data2 = Cart::select('*')->where('user_id','=',$id)->get();

    //     $data = Cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();
    //     return view('showcart',compact('count','data','data2'));

    // }


    // public function remove($id){
    //     $data = Cart::find($id);

    //     $data->delete();
    //     return redirect()->back();
    // }

    public function orderconfirm(Request $request){

        foreach($request->foodname as $key => $foodname){
            $data = new Order;

            $data->foodname=$foodname;
            $data->price=$request->price[$key];
            $data->quantity=$request->quantity[$key];
            $data->name=$request->name;
            $data->phone=$request->phone;
            $data->address=$request->address;

            $data->save();
        }
        return redirect()->back();
    }


    // public function applyjob(Request $request){

    //     foreach($request->foodname as $key => $foodname){
    //         $data = new Jobs;

    //         $data->foodname=$foodname;
    //         $data->price=$request->price[$key];
    //         $data->name=$request->name;
    //         $data->phone=$request->phone;
    //         $data->phone2=$request->phone2;
    //         $data->address=$request->address;

    //         $image1 = $request->image;
    //         $imagename1 = time().'.'.$image1->getClientOriginalExtension();
    //         $request->image->move('image1',$imagename1);
    //         $data->image1=$imagename1;

    //         $image2 = $request->image;
    //         $imagename2 = time().'.'.$image2->getClientOriginalExtension();
    //         $request->image->move('image2',$imagename2);
    //         $data->image2=$imagename2;

    //         $image3 = $request->image;
    //         $imagename3 = time().'.'.$image3->getClientOriginalExtension();
    //         $request->image->move('image3',$imagename3);
    //         $data->image3=$imagename3;






    //         $data->fbacc=$request->fbacc;

    //         $data->save();
    //     }
    //     return redirect()->back();
    // }


    public function applyjob(Request $request)
{
    foreach ($request->foodname as $key => $foodname) {
        $data = new Jobs;

        $data->foodname = $foodname;
        $data->price = $request->price[$key];
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->phone2 = $request->phone2;
        $data->address = $request->address;

        $image1 = $request->file('image1');
        $imagename1 = time() . '.' . $image1->getClientOriginalExtension();
        $image1->move('image1', $imagename1);
        $data->image1 = $imagename1;

        $image2 = $request->file('image2');
        $imagename2 = time() . '.' . $image2->getClientOriginalExtension();
        $image2->move('image2', $imagename2);
        $data->image2 = $imagename2;

        // $image3 = $request->file('image3');
        // $imagename3 = time() . '.' . $image3->getClientOriginalExtension();
        // $image3->move('image3', $imagename3);
        // $data->image3 = $imagename3;

        $data->fbacc = $request->fbacc;

        $data->save();
    }

    return redirect()->back();
}

}
