<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Parts;

use DB, Session;

class InventoryController extends Controller
{
    /**
     * loads inventory list
     * @return view inventory
     */
    public function index(){

        //gets parts
        $data['parts'] = DB::table('parts')->orderby('stock', 'ASC')->paginate(15);
        
        return view('admin.inventory', $data);
    }

    /**
     * view part data
     * @param id part id
     * @return view inventory
     */
    public function view($id){

        //gets part by id
        $data['part_data'] = Parts::where('id', $id)->first();

        return view('admin.view_inventory', $data);
    }

    /**
     * updates part data
     * @param request,id form data, part id
     * @return view inventory
     */
    public function update(Request $request, $id){

        //validates
        $this->validate($request, [
            'name' => 'required',
            'type' => 'required',
            'specs' => 'required',
            'stock' => 'required',
            'price' => 'required',
        ]);

        //updats part daa
        Parts::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type, 
            'specs' => $request->specs,
            'stock' => $request->stock,
            'price' => $request->price,
        ]);

        //update socket is applicable
        if($request->socket){
            Parts::where('id', $id)->update([
                'socket' => $request->socket,
            ]);
        }

        Session::flash('message', 'Part Updated');

        return redirect()->back();
    }

    /**
     * updates part image
     * @param request,id form data, part id
     * @return view inventory
     */
    public function update_image(Request $request, $id){

        //validates
        $this->validate($request, [
            'part_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //processes file
        if ($request->hasFile('part_image')) {
            $image = $request->file('part_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/part-img/');
            $image->move($destinationPath, $name);

            //updates im part name
            Parts::where('id', $id)->update(['image' => $name]);
    
            return back()->with('success','Image Updated');
        } 
    }

    /**
     * creates part
     * @param request part name
     * @return view edit part
     */
    public function create(Request $request){

        //validates
        $this->validate($request, [
            'part_name' => 'required',
        ]);

        //creates new part
        $part = new Parts;
        $part->name = $request->part_name;
        $part->save();

        //gets id of recent entry
        $part_data = Parts::orderby('id', 'DESC')->first();

        return $this->view($part_data->id);
    }
}
