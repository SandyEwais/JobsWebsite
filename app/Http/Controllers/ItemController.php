<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(){
        return view('Pages.index',
        [
            'items' => Item::latest()->filter(request(['tag' , 'search']))->paginate(4)
        ]);

    }

    public function show(Item $item){
        return view('Pages.show',
        [
            'item' => $item
        ]);
    }

    public function create(){
        return view('Pages.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')){
            $data['logo'] = $request->file('logo')->store('logos','public');
        }
        $data['user_id'] = Auth::id();
        Item::create($data);
        return redirect()->route('index')->with('success', 'Job Has Been Added Successfully!');
    }

    public function edit(Item $job){
        return view('Pages.edit',['job' => $job]);
    }

    public function update(Item $job,Request $request){
        $data = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => 'required|email',
            'website' => 'required|url',
            'tags' => 'required',
            'description' => 'required'
        ]);
        if($request->hasFile('logo')){
            $data['logo'] = $request->file('logo')->store('logos','public');
        }
        $job->update($data);
        return redirect()->route('index')->with('success', 'Job Has Been Updated Successfully!');
        

    }

    public function destroy(Item $job){
        $job->delete();
        return redirect()->route('index')->with('message','Job Has Been Deleted Succesfully!');
    }

    public function manage(){
        return view('Pages.manage',
        [
            'items' => Item::latest()->filter(request(['search']))->get()
        ]);
    }
}
