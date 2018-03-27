<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::all();
        return response()->json($items);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = 'product ';
        $description = 'this is product ';
        $price = 10000;
        $qty = 10;

        for( $i = 1; $i < 100; $i++ ) {
            $product = new Product([
                'name' => $name . $i,
                'description' => $description . $i,
                'price' => $price,
                'qty' =>$qty
            ]);
            $product->save();
        }
    }

    public function minhRole(Request $request) {
        if(DB::insert('insert into role_users (role_id, user_id) values (?, ?)', [$request->get('role_id'), $request->get('user_id')]))
            return response()->json('Successfully added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'qty' => $request->get('qty')
        ]);
        $item->save();
        return response()->json('Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $q = $request['q'];
        $items = [];
        if($q) {
            $items = Product::where('name', 'LIKE', '%'.$q.'%')->paginate(8);
            $items->setPath('/products/show');
            $items->appends(['q' => $q]);
        }

        return response()->json($items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::find($id);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Product::find($id);
        $item->name = $request->get('name');
        $item->description = $request->get('description');
        $item->price = $request->get('price');
        $item->qty = $request->get('qty');
        $item->save();

        return response()->json('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::find($id);
        $item->delete();

        return response()->json('Successfully Deleted');
    }
}
