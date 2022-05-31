<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    // Division view
    public function DivisionView(){
        $divisions = ShipDivision::orderBy('id', 'DESC')->get();
        return view('backend.ship.division.view_division', compact('divisions'));
    }// end mathod



    // Division Store
    public function DivisionStore(Request $request){

    	$request->validate([
    		'division_name' => 'required|alpha',

    	]);


	ShipDivision::insert([

		'division_name' => $request->division_name,

		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Division Create Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method

 // Edit division
    public function DivisionEdit($id){
        $divisions = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('divisions'));
    } // end mathod







    // Update Division

    public function DivisionUpdate(Request $request, $id){


        $request->validate([
    		'division_name' => 'required|alpha',

    	]);

        ShipDivision::findOrFail($id)->update([

          'division_name' => $request->division_name,
          'created_at' => Carbon::now(),

          ]);

          $notification = array(
              'message' => 'Division Updated Successfully',
              'alert-type' => 'info'
          );

          return redirect()->route('manage.division')->with($notification);


      } // end mehtod

       // Delete Division
       public function DivisionDelete($id){

    	ShipDivision::findOrFail($id)->delete();
    	$notification = array(
			'message' => 'Division Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    } // end mathod




//#################### District View ####################
     // Division view
     public function DistrictView(){

        $division = ShipDivision::orderBy('division_name', 'ASC')->get();

        $districts = ShipDistrict::with('division')->orderBy('id', 'DESC')->get();

        return view('backend.ship.district.view_district', compact('districts', 'division'));
    } // end mathod


    // District Store
    public function DistrictStore(Request $request){


    	$request->validate([
    		'division_id' => 'required',
    		'district_name' => 'required|alpha',

    	]);


	ShipDistrict::insert([

		'division_id' => $request->division_id,
		'district_name' => $request->district_name,

		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'District Create Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method


      // District Edit
      public function DistrictEdit($id){

        $division = ShipDivision::orderBy('division_name', 'ASC')->get();

        $districts = ShipDistrict::findOrFail($id);
           return view('backend.ship.district.edit_district',compact('districts', 'division'));
       } // end mathod


       // Distric Update
       public function DistricUpdate(Request $request, $id){
        $request->validate([
    		'division_id' => 'required',
    		'district_name' => 'required|alpha',

    	]);

        ShipDistrict::findOrFail($id)->update([
        'division_id' => $request->division_id,
		'district_name' => $request->district_name,

          'created_at' => Carbon::now(),

          ]);

          $notification = array(
              'message' => 'Distric Updated Successfully',
              'alert-type' => 'info'
          );

          return redirect()->route('manage.district')->with($notification);


      } // end mehtod


        // Delete Division
        public function DistricDelete($id){

            ShipDistrict::findOrFail($id)->delete();
            $notification = array(
                'message' => 'District Deleted Successfully',
                'alert-type' => 'info'
            );

            return redirect()->back()->with($notification);

        } // end mathod




     //  Ship State
        public function StateView(){
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::with('division', 'district')->orderBy('id','DESC')->get();
            return view('backend.ship.state.view_state',compact('division','district','state'));
        }




        // Ship State store
        public function StateStore(Request $request){

            $request->validate([
                'division_id' => 'required',
                'district_id' => 'required',
                'state_name' =>'required|alpha',

            ]);


            ShipState::insert([

                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'state_name' => $request->state_name,
                'created_at' => Carbon::now(),

                ]);

                $notification = array(
                    'message' => 'State Create Successfully',
                    'alert-type' => 'success'
                );

                return redirect()->back()->with($notification);

            } // end method


            // State Edit
            public function StateEdit($id){
                $division = ShipDivision::orderBy('division_name','ASC')->get();
                $district = ShipDistrict::orderBy('district_name','ASC')->get();
                $state = ShipState::findOrFail($id);
               return view('backend.ship.state.edit_state',compact('division','district','state'));

            } // end mathod


            // state update
            public function StateUpdate(Request $request,$id){

            $request->validate([
                'division_id' => 'required',
                'district_id' => 'required',
                'state_name' =>'required|alpha',

            ]);

                ShipState::findOrFail($id)->update([

                'division_id' => $request->division_id,
                'district_id' => $request->district_id,
                'state_name' => $request->state_name,
                'created_at' => Carbon::now(),

                ]);

                $notification = array(
                    'message' => 'State Updated Successfully',
                    'alert-type' => 'info'
                );

                return redirect()->route('manage.state')->with($notification);


            } // end mehtod



            // state delete
            public function StateDelete($id){

                ShipState::findOrFail($id)->delete();

                $notification = array(
                    'message' => 'State Deleted Successfully',
                    'alert-type' => 'info'
                );

                return redirect()->back()->with($notification);

            } // end method


















} // main end
