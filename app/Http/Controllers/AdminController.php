<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\barang;
use App\log;

class AdminController extends Controller
{
    public function index() {
    	$barang = barang::get();

    	return view('admin/barang/manage',compact('barang'));
    }
    public function create(){
    	return view('admin/barang/create');
    }
    public function store(Request $request){
    	 $validatedData = $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required',
            'tanggal' =>'required'
        ]);
    	 $barang = barang::create($validatedData);
    	return redirect('/admin');
    }
    public function edit($id){
    	 $where = array('id' => $id);
        $data['barang'] = barang::where($where)->first();
    	return view('admin/barang/update',$data);
    }
    public function update(Request $request, $id){

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
    public function validasi($id){
    	$where = array('id' => $id);
        $data['barang'] = barang::where($where)->first();
        $status =2 ;
        $update = ['status'=> $status];
        barang::whereId($id)->update($update);

    	return redirect('/admin');

    }
    public function home(){
    	$barang = barang::where('status','=','2')->orderBy('tanggal','desc')->get();
    	$log = log::orderBy('tanggal','desc')->get();
    	return view('home',compact('barang','log'));
    }
}
