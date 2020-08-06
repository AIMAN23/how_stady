<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Supervisor\ReqDataSupervisor;
use App\Http\Requests\Supervisor\ReqAddressSupervisor;
use App\Http\Requests\Supervisor\ReqPasswordSupervisor;

class SupervisorController extends Controller
{
        /**
     * تقوم بحفظ وتحديث بيانات وعنوان مسؤل النظام الخاص بلمدرسة معينة 
     *
     * @param integer $id
     * @param ReqDataSupervisor $request
     * @param Supervisor $Supervisor
     */
    public function store(int $id, Supervisor $Supervisor, Request $req)
    {
        //  $req=new Request;
        $m = $req->method();
        if ($m == "POST") {
            $Supervisor = $Supervisor->find($id);
            # code...
            $req->merge([
                'zip' => $req->country_code,
                'mobile' => $req->phone_no
            ]);


            $updateData_Supervisor = $this->updateDataSupervisor($Supervisor, 'store', $req);
            $new_address = $this->updateAddressSupervisor($Supervisor, 'store',$req);

            if ($Supervisor->status == 0) {
                // $updateData_Supervisor->update(['address_id' => $new_address->id, 'status' => '1']);
            }

            return redirect()->route('supervisor.home')->with(['success' => __('lang.update.success'),'tab_pane_3'=>'active']);

        } elseif ($m == 'GET') {
            return redirect()->route('supervisor.home')->with(['success' => ' method is get']);
        }


        // return response()->json($a);
    }
    ##################################
    //
    ##################################









    /**
     * تحديث بيانات الادمن
     *
     * @param Supervisor $Supervisor
     * @param ReqDataSupervisor $Data
     * @param string $action
     */
    public function updateDataSupervisor(Supervisor $Supervisor, $action = 'update', $Data)
    {
        $reqData = new ReqDataSupervisor;
        $validator = Validator::make($Data->all(), $reqData->rules());
         $validator->validated();
        if ($validator->fails()) {
            // return redirect()->route('supervisor.home')->withErrors($validator)->withInput();
        } else {
            // # code...

            $data = $Data->only(["name", "f_name", "p_name", "l_name", "gender", "nationality", "birthdate", "email", "mobile"]);
            // $a->update($request->all());
            $new_data = $Supervisor->update($data);
            if ($action == 'store') {
                # code...
                // return $new_data;
            } else {
                // return redirect()->route('supervisor.home')->with(['success'=>__('lang.'.$action.'.success')]);
            }
        }
    }











    /**
     * تحديث عنوان الادمن
     *
     * @param Supervisor $Supervisor
     * @param ReqAddressSupervisor $Address
     * @param string $action
     * 
     */
    public function updateAddressSupervisor(Supervisor $Supervisor, $action = 'update',$Address)
    {
        $reqAddress = new ReqAddressSupervisor;
            // $reqAddress->validated();
            $validator = Validator::make($Address->all(), $reqAddress->rules());
             $validator->validated();
            if ($validator->fails()) {
            } else {
                # code...
                $address = $Address->only(['cite', 'country', 'street', 'zip']);
                if ($Supervisor->address_id == 0) {
                    $new_address = $Supervisor->address()->create($address);
                    $Supervisor->address_id =$new_address->id;
                    $Supervisor->save();

                } else {
                    $new_address = $Supervisor->address()->update($address);
                }
                $action = $action;
                if ($action == 'store') {
                    // return $new_address;
                } else {
                    // return redirect()->route('supervisor.home')->with(['success'=>__('lang.'.$action.'.success')]);
                }
                // $a->update($request->all());
            }
    }










    /**
     * تقوم بتحديث كلمت مرور الادمن
     *
     * @param integer $id
     * @param ReqPasswordSupervisor $request
     * @param Supervisor $Supervisor
     * 
     */
    public function passwordUpdate(int $id, ReqPasswordSupervisor $request, Supervisor $Supervisor)
    {
        $Supervisor = $Supervisor->find($id);
        $Supervisor->update(['password' => Hash::make($request->password)]);

        if ($Supervisor->status < 2) $Supervisor->update(['status' => 2]);


        return redirect()->route('supervisor.home')->with(['success' => __('lang.update.success')]);
    }























}