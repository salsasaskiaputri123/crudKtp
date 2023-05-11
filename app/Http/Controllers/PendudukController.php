<?php

namespace App\Http\Controllers;

use App\Helpers\formatAPI;
use App\Models\Penduduk;
use Exception;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penduduk::all();

        if($data){
            return formatAPI::createAPI(200,'Success',$data);
        }else{
            return formatAPI::createAPI(400,'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $penduduk = Penduduk::create($request->all());

            $data = Penduduk::where('nik','=',$penduduk->nik)->get();

            if($data){
                return formatAPI::createAPI(200, 'Success',$data);
            }else{
                return formatAPI::createAPI(400, 'Failed');
            }
        }catch(Exception $error){
            return formatAPI::createAPI(400, 'Failed',$error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $data = Penduduk::where('id','=',$id)->first();
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
            }else{
                return formatAPI::createAPI(400,'Failed');
            }
        }catch(Exception $error){
            return formatApI::createAPI(400,'Failed',$error);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try{
            $penduduk = Penduduk::findorfail($id);
            $penduduk->update($request->all());

            $data = Penduduk::where('id','=',$penduduk->id)->get();
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
            }else{
                return formatAPI::createAPI(400,'Failed');
            }


        }catch(Exception $error){
            return formatAPI::createAPI(400,'Failed',$error);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $penduduk = Penduduk::findorfail($id);
            $data = $penduduk->delete();
            if($data){
                return formatAPI::createAPI(200,'Success',$data);
            }else{
                return formatAPI::createAPI(400,'Failed');
            }

        }catch(Exception $error){
            return formatAPI::createAPI(400,'Failed',$error);
        }
    }
}
