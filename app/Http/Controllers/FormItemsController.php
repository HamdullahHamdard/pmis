<?php

namespace App\Http\Controllers;

use App\Models\FormItems;
use App\Http\Requests\StoreFormItemsRequest;
use App\Http\Requests\UpdateFormItemsRequest;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Request;

class FormItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $formItems = FormItems::where('form5_id', '=', $id)->get();
        $items = DB::table('items')->select('id', 'name')->get();
        return view('form5.form5ّItems.index', compact('formItems', 'id', 'items'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $items = DB::table('items')->select('id', 'name', 'in_stock')->get();

        return view('form5.form5ّItems.create', compact('items', 'id'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormItemsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormItemsRequest $request, $id) : RedirectResponse
    {
        $request->validated();

        $form = FormItems::where('form5_id', '=',$id)->where('item_id', '=', $request->item_id)->exists();

        $itemsQuantity = Item::where('id','=',$request->item_id)->first();


        if($form){

            Alert::warning("جنس په فورم کی موجود دی");
            return redirect()->back();
        }elseif($itemsQuantity->in_stock < $request->quantity){
            Alert::warning(" د جنس مقدار ".$request->quantity." په ګدام کی موجود نه دی " );
            return redirect()->back();
        }else{
            $itemsQuantity->in_stock = $itemsQuantity->in_stock - $request->quantity;

            //
            $formItems = new FormItems();
            $formItems->form5_id = $id;
            $formItems->item_id = $request->item_id;
            $formItems->quantity = $request->quantity;
            $formItems->save();
            $itemsQuantity->save();

            Alert::success("نوۍ جنس و فورم ته په بریالیتوب سره اضافه شو");
            return redirect('/formItems/'.$id);
        }







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormItems  $formItems
     * @return \Illuminate\Http\Response
     */
    public function show(FormItems $formItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormItems  $formItems
     * @return \Illuminate\Http\Response
     */
    public function edit( $formItemsId, $id, $quantity)
    {
        //
        $formItems = FormItems::find($formItemsId);
        $items = DB::table('items')->select('id', 'name', 'in_stock')->get();

        return view('form5.form5ّItems.edit', compact('items','quantity', 'id','formItems'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormItemsRequest  $request
     * @param  \App\Models\FormItems  $formItems
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormItemsRequest $request, $id, $form5_id, $quantity)
    {
        $request->validated();
        $formItems =  FormItems::find( $id );

        // TODO:: This is necessary
        $form = FormItems::where('form5_id', '=',$form5_id)->where('item_id', '=', $request->item_id)->exists();

        // dd($form);

        $itemQuantity = Item::where('id','=',$formItems->item_id)->first();
        $itemsQuantity = Item::where('id','=',$request->item_id)->first();
        if($itemsQuantity->in_stock + $quantity < $request->quantity){
            Alert::warning(" د جنس مقدار ".$request->quantity." په ګدام کی موجود نه دی " );
            return redirect()->back();
        }else{
            $itemQuantity->in_stock = $itemQuantity->in_stock + $quantity;
            $itemsQuantity->in_stock = $itemsQuantity->in_stock - $request->quantity;


            $itemsQuantity->save();

            $formItems->form5_id = $form5_id;
            $formItems->item_id = $request->item_id;
            $formItems->quantity = $request->quantity;
            $formItems->save();
            $itemQuantity->save();



            Alert::success("نوۍ جنس په بریالیتوب سره تغیر شو");
            return redirect('/formItems/'.$form5_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormItems  $formItems
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $quantity)
    {
        //
        $formItems = FormItems::find($id);

        $itemsQuantity = Item::where('id','=',$formItems->item_id)->first();
        $itemsQuantity->in_stock = $itemsQuantity->in_stock + $quantity;
        $itemsQuantity->save();

        $formItems->delete();

        return redirect()->back();
    }
}
