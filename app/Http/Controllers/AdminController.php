<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\barang;
use App\log;
use Auth;

class AdminController extends Controller
{
    public function index() {
    	if (Auth::check()) {
    	$barang = barang::get();

    	return view('admin/barang/manage',compact('barang'));
    	}
    	return redirect('/');
    }
    public function create(){
    	if(Auth::check()){
    		return view('admin/barang/create');
    	}
    	return redirect('/');
    }
    public function store(Request $request){
    	if(Auth::check()){
    		$validatedData = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'tanggal' =>'required'
        ]);
    	 $barang = barang::create($validatedData);
    	return redirect('/admin');
    	}
    	return redirect('/'); 
    }
    public function edit($id){
    	if(Auth::check()){
    	 $where = array('id' => $id);
    	 $data['barang'] = barang::where($where)->first();
    	return view('admin/barang/update',$data);
    	}
        return redirect('/'); 
    }
    public function update(Request $request, $id){
    	if(Auth::check()){

    	$validatedData = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'tanggal'=>'required',

        ]);
        $status =1;
        $update2 = ['status'=> $status];
		barang::whereId($id)->update($validatedData);
		barang::whereId($id)->update($update2);
    	return redirect('/admin')->with('success','Barang sudah terupdate');
    	}
    	 return redirect('/'); 
    }
    public function validasi($id){
    	if(Auth::check()){
    		$where = array('id' => $id);
        $data['barang'] = barang::where($where)->first();
        $status =2 ;
        $update = ['status'=> $status];
        barang::whereId($id)->update($update);

    	return redirect('/admin');
    	}
    	return redirect('/');

    }
    public function home(){
    	$barang = barang::where('status','=','2')->orderBy('tanggal','desc')->get();
    	$log = log::where('status','=','2')->orderBy('tanggal','desc')->get();
    	return view('home',compact('barang','log'));
    }
}
