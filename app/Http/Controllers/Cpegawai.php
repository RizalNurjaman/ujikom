<?php

namespace App\Http\Controllers;

use App\mpegawai;
use App\User;
use App\Mgolongan;
use App\Mjabatan;
use Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Request;



class pegawaiController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
         $pegawaw=mpegawai::paginate(5);
        return view('pegawai.index',compact('pegawaw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       $user=User::all();
            $jabatin=Mjabatan::all();
            $golongin=Mgolongan::all();
        return view('pegawai.create',compact('pegawaw','golongin','jabatin'));
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
        $rules = array('email' => 'required|unique:users',
                        'password' => 'required|min:6|confirmed',
                        'name' => 'required',
                        'permision' =>'required',
                        'nip' => 'required|min:11|numeric|unique:pegawai',
                        'jabatan_id' =>'required',
                        'golongan_id' => 'required',
                        'foto' => 'required',
                         );

        $message =array('email.unique' =>'Gunakan Email Lain' ,
                        'name.required' =>'Wajib Isi',
                        'email.required' =>'Wajib Isi',
                        'password.unique' =>'wajib isi',
                        'permision.confirmed' =>'Masukan Password Yang Benar',
                        'permision.required' =>'Wajib isi',
                        'nip.unique' =>'Gunakan Nip Lain',
                        'nip.required' =>'Wajib isi',
                        'nip.min' =>'Min 11',
                        'nip.numeric' =>'Input Dengan Angka',
                        'jabatan_id.required' =>'Wajib isi',
                        'golongan_id.required' =>'Wajib isi');


        $val=validator::make(Input::all(),$rules,$message);
        if($val->fails())
        {
            return redirect('pegawai/create')
            ->withErrors($val)
            ->withInput();

        }



           $akun=new User ;
         $akun->name=Input::get('name');
         $akun->email=Input::get('email');
         $akun->password=bcrypt(Input::get('password'));
         $akun->permision=Input::get('permision');
         $akun->save();

         $pegawaw=new mpegawai ;
         $pegawaw->nip=Input::get('nip');
         $pegawaw->foto=Input::get('foto');
         $pegawaw->jabatan_id=Input::get('jabatan_id');
         $pegawaw->golongan_id=Input::get('golongan_id');
         $pegawaw->user_id=$akun->id;
         $pegawaw->save();
         return redirect('pegawai');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        // dd($id);
        $jabatin=Mjabatan::all();
        $golongin=Mgolongan::all();
         $pegawaw=mpegawai::find($id);
         // $user=User::where('id',$pegawaw->user_id)->first();
         dd($pegawaw);
        return view('pegawai.edit',compact('pegawaw','jabatan','golongan','user'));
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
        //
        $cariid=mpegawai::find($id);
        if ($cariid->nip != Request('nip')) {
            $rules = array('email' => 'required|unique:users',
                        'password' => 'required|min:6|confirmed',
                        'name' => 'required',
                        'permision' =>'required',
                        'nip' => 'required|min:11|numeric|unique:pegawai',
                        'jabatan_id' =>'required',
                        'golongan_id' => 'required',
                        'foto' => 'required',
                         );
        }
        else{

            $rules = array('email' => 'required',
                            'password' => 'required|min:6|confirmed',
                            'name' => 'required',
                            'permision' =>'required',
                            'nip' => 'required|min:11|numeric',
                            'jabatan_id' =>'required',
                            'golongan_id' => 'required',
                            'foto' => 'required',
                             );
        }

        $message =array('email.unique' =>'Gunakan Email Lain' ,
                        'name.required' =>'Wajib Isi',
                        'email.required' =>'Wajib Isi',
                        'password.unique' =>'wajib isi',
                        'permision.confirmed' =>'Masukan Password Yang Benar',
                        'permision.required' =>'Wajib isi',
                        'nip.unique' =>'Gunakan Nip Lain',
                        'nip.required' =>'Wajib isi',
                        'nip.min' =>'Min 11',
                        'nip.numeric' =>'Input Dengan Angka',
                        'jabatan_id.required' =>'Wajib isi',
                        'golongan_id.required' =>'Wajib isi');

        $val=validator::make(Input::all(),$rules,$message);
        if($val->fails())
        {
            return redirect('pegawai/'.$cariid->id.'/edit')
            ->withErrors($val)
            ->withInput();

        }
        $update=Request::all();
        $pegawaw=User::find($id);
        // // $user=User::where('id',$pegawaw->user_id) ;
        // // dd($user);
        // // $user=User::find($pegawaw->user_id);
        // $user->update($update);
        $pegawaw->update($update);
        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         mpegawai::find($id)->delete();
        return redirect('pegawai');
    }
}
