<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    //menambah data kedatabase
    public function store(Request $request){
        //memvalidasi inputan
        $validator = Validator::make($request->all(),[
        'product_name' => 'required|max:50',
        'product_type' => 'required|in:snack,fruit,minuman,makeup',
        'product_price' => 'required|numeric',
        'expired_at' => 'required|date'
        ]);

        //koneksi apabila inputan tidak sesuai
        if($validator -> fails()){
            //response json akan dikirim jika inputan salah
            return response()->json($validator->messages())->setStatusCode(422);

}    
$validated = $validator->validated();
//masukkan inputan yang benar ke database
product::create([
    'product_name' =>$validated['product_name'],
    'product_type' =>$validated['product_type'],
    'product_price' =>$validated['product_price'],
    'expired_at' =>$validated['expired_at']
]);
//renspose yang akan dikirim jika inputan benar
return response()->json(['msg' => 'Data Produk brhasil di simpan'],201);


}
function showAll(){

    //panggil semua data produk dari tabel product
    $products = Product::all();

//kirim respons json
return response()->json([
    'msg'=> 'Data produk keseluruhan', 
    'data' => $products
],200);
}

public function update(Request $request,$id){
    //memvalidasi inputan
    $validator = Validator::make($request->all(),[
    'product_name' => 'required|max:50',
    'product_type' => 'required|in:snack,fruit,minuman,makeup',
    'product_price' => 'required|numeric',
    'expired_at' => 'required|date'
    ]);

    //koneksi apabila inputan tidak sesuai
    if($validator -> fails()){
        //response json akan dikirim jika inputan salah
        return response()->json($validator->messages())->setStatusCode(422);

}    
$validated = $validator->validated();
//masukkan inputan yang benar ke database
product::create([
'product_name' =>$validated['product_name'],
'product_type' =>$validated['product_type'],
'product_price' =>$validated['product_price'],
'expired_at' =>$validated['expired_at']
]);
//renspose yang akan dikirim jika inputan benar
return response()->json(['msg' => 'Data Produk brhasil di ubah'],201);


}
public function delete($id){
    $products = Product::where('id', $id)->get();
    if($products){
        Product::where('id',$id)->delete();
        //response json untuk dikirim
        return response()->json([
            'msg'=> 'Data produk dengan ID: '.$id.'Berhasil dihapus'],200);

        
    }
    //response json akan dikirim jika ID tidak ada
    return response()->json([
        'msg'=>'Data produk dengan ID: '.$id.'tidak di temukan'],484);
    
}
}

