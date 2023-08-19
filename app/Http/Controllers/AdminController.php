<?php

namespace App\Http\Controllers;



use App\Models\Food;
use App\Models\User;
use App\Models\Order;
use App\Models\Foodchef;
use App\Models\Reservation;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function users(){

        $data = User::all();
        return view("admin.users",compact('data'));
    }

    public function deleteusers($id){

        $data  = User::find($id);
        $data->delete();
        return redirect()->back();



        return response('Delete successfully');

    }

    public function foodmenu(){

        $data = Food::all();
        return view("admin.foodmenu",compact("data"));
    }

    public function deletemenu($id){
        $data  = Food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function upload(Request $request){
        $data= new Food;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);

        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();

    }

    public function updateview($id){
        $data = Food::find($id);
        return view("admin.updateview",compact("data"));
    }

    public function updatefood(Request $request, $id){
        $data = Food::find($id);

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);

        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description =$request->description;
        $data->update();
        return redirect()->back();

    }

    public function reservation(Request $request){
        $data = new Reservation;


        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone =$request->phone;
        $data->guest =$request->guest;
        $data->date =$request->date;
        $data->time =$request->time;
        $data->message =$request->message;
        $data->save();
        return redirect()->back();

    }

    public function viewreservation(){

        if (Auth::id()) {
        $data = Reservation::all();
        return view("admin.adminreservation",compact("data"));
        }
        else{
            return redirect('login');
        }
    }

    public function chef(){
        $data = Foodchef::all();
        return view("admin.adminchef",compact("data"));
    }

    public function uploadchef(Request $request){
        $data= new Foodchef;

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage',$imagename);

        $data->image=$imagename;
        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->save();
        return redirect()->back();


    }

    public function updatechef($id){
        $data = Foodchef::find($id);
        return view("admin.updatechef",compact("data"));
    }

    public function updatefoodchef(Request $request,$id){
        $data = Foodchef::find($id);

        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage',$imagename);

            $data->image=$imagename;
        }

        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->update();
        return redirect()->back();

    }

    public function deletechef($id){
        $data = Foodchef::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function vieworder(){
        $data = Jobs::all();
        return view('admin.vieworder',compact('data'));
    }

    public function search(Request $request){

        $search=$request->search;

        $data = Jobs::where('name','Like','%'.$search.'%')->orWhere('foodname','Like','%'.$search.'%')
        ->get();
        return view('admin.vieword er',compact('data'));
    }


    public function deleteorder($id){
        $data  = Jobs::find($id);
        $data->delete();
        return redirect()->back();
    }
}
