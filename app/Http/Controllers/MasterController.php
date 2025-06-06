<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use DB;
use Illuminate\Support\Str;
use App\Models\UserMain;
class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function url_akses($user, $akses)
    {
        if ($user == Auth::user()->kd_akses) {
            $data = DB::table('user_mains')->where('kd_akses', $user)->where('kd_menu', $akses)->first();
            if ($data) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function master_bahan(Request $request){
        $data = DB::table('m_bahan_master')->get();
        return view('master.bahan',['data'=>$data]);
    }
    public function master_bahan_add(Request $request){
        return view('master.bahan.form-add');
    }
    public function master_bahan_save(Request $request){
        DB::table('m_bahan_master')->insert([
            'm_bahan_code'=>Str::uuid(),
            'm_bahan_name'=>$request->name,
            'm_bahan_type'=>$request->type,
            'm_bahan_satuan'=>$request->satuan,
            'm_bahan_status'=>1,
            'created_at'=>now(),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function master_cabang(){
        $data = DB::table('master_cabang')->get();
        return view('master.cabang',['data'=>$data]);
    }
    public function master_cabang_add(){
        return view('master.cabang.form-add');
    }
    public function master_cabang_save(Request $request){
        DB::table('master_cabang')->insert([
            'master_cabang_code' => $request->code,
            'master_cabang_name' => $request->name,
            'master_cabang_type' => $request->type,
            'master_cabang_location' => $request->location,
            'master_cabang_status' => 1,
            'created_at' => now(),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function master_cabang_add_staff(Request $request){
        $data = DB::table('master_cabang')->where('master_cabang_code',$request->code)->first();
        $jobs = DB::table('master_jobs')->where('master_jobs_cabang',$request->code)->get();
        $staff = DB::table('master_staff')->where('master_staff_cab',$request->code)->get();
        return view('master.cabang.form-add-staff',['data'=>$data,'staff'=>$staff,'jobs'=>$jobs]);
    }
    public function master_cabang_add_staff_form(Request $request){
        $data = DB::table('master_cabang')->where('master_cabang_code',$request->code)->first();
        $jobs = DB::table('master_jobs')->where('master_jobs_cabang',$request->code)->get();
        return view('master.cabang.form-staff',['data'=>$data,'jobs'=>$jobs]);
    }
    public function master_cabang_save_staff(Request $request){
        $file = $request->file('file');
        $tujuan_upload = 'data_karyawan';
        $file->move($tujuan_upload, $file->getClientOriginalName());
        DB::table('master_staff')->insert([
            'userid'=>'UID-' . Str::random(4),
            'master_staff_nik'=>$request->nik,
            'master_staff_nip'=>$request->nip,
            'master_staff_name'=>$request->name,
            'master_staff_ttl'=>$request->ttl,
            'master_staff_bod'=>$request->bod,
            'master_staff_sex'=>$request->sex,
            'master_staff_agama'=>$request->agama,
            'master_staff_hp'=>$request->no_hp,
            'master_staff_job'=>$request->job,
            'master_staff_cab'=>$request->cabang,
            'master_staff_alamat'=>$request->alamat,
            'master_staff_file'=>$tujuan_upload . '/' . $file->getClientOriginalName(),
            'created_at' => now()
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function master_job(){
        $jobs = DB::table('master_jobs')->join('master_cabang','master_cabang.master_cabang_code','=','master_jobs.master_jobs_cabang')->get();
        return view('master.jobs',['jobs'=>$jobs]);
    }
    public function master_jobs_add(Request $request){
        $cabang = DB::table('master_cabang')->get();
        return view('master.jobs.form-add',['cabang'=>$cabang]);
    }
    public function master_jobs_save(Request $request){
        DB::table('master_jobs')->insert([
            'master_jobs_code'=>$request->code,
            'master_jobs_name'=>$request->name,
            'master_jobs_cabang'=>$request->cabang,
            'master_jobs_status'=>0,
            'created_at'=>now()
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function master_user(){
        $data = DB::table('user_mains')->get();
        return view('master.user',['data'=>$data]);
    }
    public function master_user_add(){
        $cabang = DB::table('master_cabang')->get();
        return view('master.user.form-add',['cabang'=>$cabang]);
    }
    public function master_user_save(Request $request){
        UserMain::create([
            'userid' => 'UID-' . Str::random(4),
            'fullname' => $request['fullname'],
            'username' => $request['username'],
            'number_handphone' => $request['no_hp'],
            'email' => $request['email'],
            'access_code' => $request['akses'],
            'access_cabang' => $request['cabang'],
            'access_status' => '1',
            'remember_token' => Str::random(10),
            'password' => Hash::make($request['password']),

        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    // MENU
    public function master_menu(){
        $data = DB::table('z_menu')->get();
        return view('master.menu',['data'=>$data]);
    }
    public function master_menu_add(Request $request){
        return view('master.menu.form-add');
    }
    public function master_menu_save(Request $request){
        DB::table('z_menu')->insert([
            'menu_code'=>str::uuid(),
            'menu_name'=>$request->menu,
            'menu_link'=>$request->link,
            'menu_status'=>1,
            'created_at'=>now(),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    // AKSES MENU
    public function master_akses_menu(){
        $akses = DB::table('z_access')->get();
        return view('master.menu-akses',['akses'=>$akses]);
    }
    public function master_akses_menu_detail(Request $request){
        $data = DB::table('user_mains')->where('access_code',$request->id)->get();
        return view('master.menu-akses.detail-akses',['data'=>$data,'id'=>$request->id]);
    }
    public function master_akses_setup_menu(Request $request){
        $data = DB::table('z_menu')->get();
        return view('master.menu-akses.setup-menu',['code'=>$request->code,'data'=>$data]);
    }
    public function master_akses_setup_menu_verif(Request $request){
        $cek = DB::table('z_menu_user')->where('menu_code',$request->code)->where('access_code',$request->id)->first();
        if ($cek) {
            DB::table('z_menu_user')->where('menu_code',$request->code)->where('access_code',$request->id)->delete();
            return 'Non Aktif';
        } else {
            DB::table('z_menu_user')->insert([
                'menu_code'=>$request->code,
                'access_code'=>$request->id,
            ]);
            return 'Aktif';
        }
    }
    // SETTING
    public function master_setting(){
        return view('master.setting');
    }
}
