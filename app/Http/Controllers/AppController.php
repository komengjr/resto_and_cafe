<?php

namespace App\Http\Controllers;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Session;
use DB;
use PDF;
class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function url_akses($akses)
    {
        $data = DB::table('z_menu_user')->where('menu_code', $akses)->where('access_code', Auth::user()->access_code)->first();
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    // CATEGORY
    public function app_category($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('t_category')->get();
            return view('app.category', ['data' => $data]);
        } else {
            return Redirect::to('dashboard/home');
        }

    }
    public function app_category_add()
    {
        return view('app.category.form-add');
    }
    public function app_category_save(Request $request)
    {
        DB::table('t_category')->insert([
            't_category_code' => mt_rand(1000000, 9999999),
            't_category_name' => $request->name,
            't_category_status' => 1,
            't_category_desc' => $request->desc,
            'created_at' => now(),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function app_category_edit(Request $request)
    {
        $data = DB::table('t_category')->where('t_category_code', $request->code)->first();
        return view('app.category.form-edit', ['data' => $data]);
    }
    public function app_category_update(Request $request)
    {
        DB::table('t_category')->where('t_category_code', $request->code)->update([
            't_category_name' => $request->name,
            't_category_status' => $request->status,
            't_category_desc' => $request->desc,
            'updated_at' => now(),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }

    // PRODUCT
    public function app_product($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('t_product')
                ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')->get();
            return view('app.product', ['data' => $data]);
        } else {
            return Redirect::to('dashboard/home');
        }
    }
    public function app_product_add()
    {
        $option = DB::table('t_category')->get();
        return view('app.product.form-add', ['option' => $option]);
    }
    public function app_product_save(Request $request)
    {
        $file = $request->file('file');
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $file->getClientOriginalName());
        DB::table('t_product')->insert([
            't_product_code' => str::uuid(),
            't_category_code' => $request->category,
            't_product_name' => $request->name,
            't_product_type' => $request->type,
            't_product_price' => $request->price,
            't_product_disc' => $request->disc,
            't_product_status' => 1,
            't_product_desc' => $request->desc,
            't_product_file' => $tujuan_upload . '/' . $file->getClientOriginalName(),
            'created_at' => now()
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function app_product_display(Request $request)
    {
        $data = DB::table('t_product')->where('t_product_code', $request->code)->first();
        return view('app.product.display-product', ['data' => $data]);
    }
    public function app_product_edit(Request $request)
    {
        $option = DB::table('t_category')->get();
        $data = DB::table('t_product')
            ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')
            ->where('t_product.t_product_code', $request->code)->first();
        return view('app.product.form-edit', ['option' => $option, 'data' => $data]);
    }
    public function app_product_update(Request $request)
    {
        $file = $request->file('file');
        $tujuan_upload = 'data_file';
        if ($file == "") {
            DB::table('t_product')->where('t_product_code', $request->code)->update([
                't_product_name' => $request->name,
                't_product_type' => $request->type,
                't_product_status' => 1,
                't_product_desc' => $request->desc,
                'created_at' => now()
            ]);
        } else {
            $random = mt_rand(1000000, 9999999);
            $file->move($tujuan_upload, $random . $file->getClientOriginalName());
            DB::table('t_product')->where('t_product_code', $request->code)->update([
                't_product_name' => $request->name,
                't_product_type' => $request->type,
                't_product_status' => 1,
                't_product_desc' => $request->desc,
                't_product_file' => $tujuan_upload . '/' . $random . $file->getClientOriginalName(),
                'created_at' => now()
            ]);
        }

        return redirect()->back()->withSuccess('Great!');
    }
    public function app_product_detail(Request $request)
    {
        return view('app.product.detail-product');
    }
    // STOK
    public function app_stok($akses)
    {
        if ($this->url_akses($akses) == true) {
            return view('app.stok');
        } else {
            return Redirect::to('dashboard/home');
        }
    }
    public function app_stok_find()
    {
        return view('app.stok.cari-data');
    }
    public function app_stok_find_search(Request $request)
    {
        $data = DB::table('t_product')->where('t_product_name', 'like', '%' . $request->code . '%')->get();
        return view('app.stok.hasil-pencarian', ['data' => $data]);
    }
    public function app_stok_find_detail(Request $request)
    {
        $data = DB::table('t_product')
            ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')
            ->where('t_product.t_product_code', $request->code)->first();
        return view('app.stok.detail-stok', ['data' => $data]);
    }
    public function app_stok_add(Request $request)
    {
        $data = DB::table('t_product')
            ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')
            ->where('t_product.t_product_code', $request->code)->first();
        return view('app.stok.form-add-stok', ['data' => $data]);
    }
    public function app_stok_find_keyword(Request $request)
    {
        $data = DB::table('t_product')->where('t_product_name', 'like', '%' . $request->code . '%')->get();
        return view('app.stok.hasil-keyword', ['data' => $data]);
    }
    public function app_stok_find_keyword_save(Request $request)
    {
        DB::table('t_product_stok')->insert([
            't_product_token' => str::uuid(),
            't_product_code' => $request->code,
            't_stok_qty' => $request->qty,
            'userid' => Auth::user()->userid,
            't_stok_used' => 0,
            'stok_status' => 0,
            'created_at' => now()
        ]);
        $data = DB::table('t_product_stok')->select('t_product_stok.*', 't_product.t_product_name', 't_product.t_product_price')
            ->join('t_product', 't_product.t_product_code', '=', 't_product_stok.t_product_code')
            ->where('t_product_stok.t_product_code', $request->code)->orderBy('t_product_stok.id', 'DESC')->get();
        return view('app.stok.log-stok', ['data' => $data]);
    }
    // Table Management
    public function app_table($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('m_table_master')->get();
            $proses = DB::table('m_table_master')
                ->join('m_order_list', 'm_order_list.m_order_table', '=', 'm_table_master.m_table_master_code')
                ->where('m_order_list.m_order_status', 0)->get();
            return view('app.table-service', ['data' => $data, 'proses' => $proses]);
        } else {
            return Redirect::to('dashboard/home');
        }
    }
    public function app_table_add()
    {
        return view('app.table.form-add');
    }
    public function app_table_save(Request $request)
    {
        DB::table('m_table_master')->insert([
            'm_table_master_code' => str::uuid(),
            'm_table_master_name' => $request->name,
            'm_table_master_cat' => $request->category,
            'm_table_master_type' => $request->type,
            'm_table_master_status' => 1,
            'm_table_master_desc' => $request->desc,
            'created_at' => now(),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function inventaris()
    {
        return view('app.inventaris');
    }

    // MENU ORDER
    public function menu_order($akses)
    {
        if ($this->url_akses($akses) == true) {
            $cabang = DB::table('master_cabang')->where('master_cabang_code',Auth::user()->access_cabang)->first();
            $data = DB::table('t_product')->where('t_product_status', 1)->where('master_cabang_code',Auth::user()->access_cabang)->get();
            $cat = DB::table('t_category')->get();
            return view('app.menu-order', ['data' => $data, 'cat' => $cat,'cabang'=>$cabang]);
        } else {
            return Redirect::to('dashboard/home');
        }

    }
    public function menu_order_create()
    {
        return view('app.menu-order.detail-order');
    }
    public function menu_order_create_table()
    {
        $table = DB::table('m_table_master')
            // ->join('m_order_list','m_order_list.m_order_table','=','m_table_master.m_table_master_code')
            ->get();
        return view('app.menu-order.choose-table', ['table' => $table]);
    }
    public function menu_order_create_table_fix(Request $request)
    {
        $data = DB::table('m_table_master')->where('m_table_master_code', $request->code)->first();
        return $data->m_table_master_name . '<input type="text" name="table" id="table" value="' . $request->code . '" hidden>';
    }
    public function menu_search_category(Request $request)
    {
        if ($request->id == "all") {
            $data = DB::table('t_product')
                ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')->where('t_product.master_cabang_code',Auth::user()->access_cabang)->get();
        } else {
            $data = DB::table('t_product')
                ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')->where('t_product.master_cabang_code',Auth::user()->access_cabang)
                ->where('t_category.t_category_code', $request->id)->get();
        }
        return view('app.menu-order.option-category', ['data' => $data]);
    }
    public function menu_add_cart_product(Request $request)
    {
        $cek = DB::table('log_order_request')->where('no_order', $request->order)->where('t_product_code', $request->code)->first();
        if ($cek) {
            DB::table('log_order_request')->where('no_order', $request->order)->where('t_product_code', $request->code)->update([
                'quantity' => $cek->quantity + 1
            ]);
        } else {
            DB::table('log_order_request')->insert([
                'no_order' => $request->order,
                't_product_code' => $request->code,
                'quantity' => 1
            ]);
        }
        $data = DB::table('log_order_request')->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')->where('no_order', $request->order)->get();
        return view('app.menu-order.list-order', ['data' => $data]);
    }
    public function menu_remove_cart_product(Request $request)
    {
        DB::table('log_order_request')->where('no_order',$request->order)->where('t_product_code',$request->code)->delete();
        $data = DB::table('log_order_request')->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')->where('no_order', $request->order)->get();
        return view('app.menu-order.list-order', ['data' => $data]);
    }
    public function menu_edit_cart_order(Request $request){
        DB::table('log_order_request')->where('no_order',$request->order)->where('t_product_code',$request->code)->update(['quantity'=>$request->qty]);
        $data = DB::table('t_product')->where('t_product_code',$request->code)->first();
        $diskon = $data->t_product_price - ($data->t_product_price*$data->t_product_disc/100);
        $hasil = ($request->qty) * $diskon;
        $total = "Rp. ".number_format($hasil,0,',','.')."";
        return $total;
    }
    public function menu_confrim_order_customer(Request $request)
    {
        $table = DB::table('m_table_master')->where('m_table_master_code', $request->table)->first();
        $data = DB::table('log_order_request')
            ->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')
            ->where('log_order_request.no_order', $request->order)->get();
        return view('app.menu-order.confrim-order', ['data' => $data, 'table' => $table, 'order' => $request->order]);
        // return 123;
    }
    public function menu_order_create_fix(Request $request)
    {
        DB::table('m_order_list')->insert([
            'no_reg_order' => $request->fix_order,
            'm_order_user' => $request->user,
            'm_order_table' => $request->no_table,
            'm_order_status' => 0,
            'm_order_no' => $request->no_hp,
            'm_order_date' => now(),
            'userid' => Auth::user()->userid,
            'created_at' => now(),
        ]);
        $cek = DB::table('log_order_request')
            ->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')
            ->where('log_order_request.no_order', $request->fix_order)->get();
        foreach ($cek as $value) {
            DB::table('m_order_list_detail')->insert([
                'no_reg_order' => $request->fix_order,
                't_product_code' => $value->t_product_code,
                'order_qty' => $value->quantity,
                'order_price' => ($value->t_product_price - ($value->t_product_disc * $value->t_product_price) / 100) * $value->quantity,
                'order_status' => 0,
                'created_at' => now(),
            ]);
        }
        return '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading fw-semi-bold">Order Has Been Created!</h4>
                <p>No Order: ' . $request->fix_order . '</p>
                <hr />
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                </div>';
    }
    public function menu_print_order_fix(Request $request)
    {
        $image = base64_encode(file_get_contents(public_path('resto.png')));
        // $qrcode = base64_encode(QrCode::format('png')->size(500)->errorCorrection('H')->generate('123123'));
        $reg = DB::table('m_order_list')
            ->join('m_table_master', 'm_table_master.m_table_master_code', '=', 'm_order_list.m_order_table')
            ->where('m_order_list.no_reg_order', $request->fix_order)->first();
        $data = DB::table('log_order_request')
            ->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')
            ->where('log_order_request.no_order', $request->fix_order)->get();
        $pdf = PDF::loadview('app.menu-order.report.nota', ['data' => $data, 'reg' => $reg], compact('image'))->setPaper('A5', 'potrait')->setOptions(['defaultFont' => 'Courier']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2, "Multiply");

        $canvas->set_opacity(.1);

        // $canvas->page_text($width/5, $height/2, 'Lunas', '123', 30, array(22,0,0),1,2,0);
        $canvas->page_script('
            $pdf->set_opacity(.1);
            $pdf->image("resto.png", 80, 180, 255, 220);
            ');
        return base64_encode($pdf->stream());
    }

    // LIST ORDER
    public function list_order($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('m_order_list')
                ->join('m_table_master', 'm_table_master.m_table_master_code', '=', 'm_order_list.m_order_table')
                ->orderBy('m_order_list.id', 'DESC')->get();
            return view('app.order-list', ['data' => $data]);
        } else {
            return Redirect::to('dashboard/home');
        }
    }
    public function list_order_prosess(Request $request)
    {
        $data = DB::table('m_order_list')
            ->join('m_table_master', 'm_table_master.m_table_master_code', '=', 'm_order_list.m_order_table')
            ->where('m_order_list.no_reg_order', $request->code)->first();
        return view('app.list-order.proses', ['data' => $data]);
    }
    public function list_order_prosess_payment(Request $request)
    {
        $total = DB::table('m_order_list_detail')->where('no_reg_order', $request->code)->where('order_status', 1)->sum('order_price');
        return view('app.list-order.choose-payment', ['code' => $request->code, 'total' => $total]);
    }
    public function list_order_prosess_payment_save(Request $request)
    {
        DB::table('m_order_list')->where('no_reg_order', $request->code)->update(['m_order_status' => 2, 'updated_at' => now()]);
        return redirect()->back()->withSuccess('Great! Berhasil Melakukan Payment');
    }
    public function list_order_print_invoice(Request $request)
    {
        $image = base64_encode(file_get_contents(public_path('resto.png')));
        // $qrcode = base64_encode(QrCode::format('png')->size(500)->errorCorrection('H')->generate('123123'));
        $reg = DB::table('m_order_list')
            ->join('m_table_master', 'm_table_master.m_table_master_code', '=', 'm_order_list.m_order_table')
            ->where('m_order_list.no_reg_order', $request->code)->first();
        $data = DB::table('log_order_request')
            ->join('t_product', 't_product.t_product_code', '=', 'log_order_request.t_product_code')
            ->where('log_order_request.no_order', $request->code)->get();
        $customPaper = array(0, 0, 420, 640);
        $pdf = PDF::loadview('app.menu-order.report.nota', ['data' => $data, 'reg' => $reg], compact('image'))->setPaper($customPaper, 'potrait')->setOptions(['defaultFont' => 'Courier']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2, "Multiply");

        $canvas->set_opacity(.1);

        // $canvas->page_text($width/5, $height/2, 'Lunas', '123', 30, array(22,0,0),1,2,0);
        $canvas->page_script('
            $pdf->set_opacity(.1);
            $pdf->image("resto.png", 80, 180, 255, 220);
            ');
        return base64_encode($pdf->stream());
    }
    public function list_order_detail(Request $request)
    {
        return view('app.list-order.detail-order');
    }

    // KITCHEN
    public function kitchen_req($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('m_order_list')->where('m_order_status', 0)->get();
            return view('app.kitchen', ['data' => $data]);
        } else {
            return Redirect::to('dashboard/home');
        }
    }
    public function kitchen_req_detail(Request $request)
    {
        $data = DB::table('m_order_list')
            ->join('m_table_master', 'm_table_master.m_table_master_code', '=', 'm_order_list.m_order_table')
            ->where('m_order_list.no_reg_order', $request->code)->first();

        return view('app.kitchen.detail', ['data' => $data]);
    }
    public function kitchen_req_check(Request $request)
    {
        DB::table('m_order_list_detail')->where('id', $request->code)->update(['order_status' => 1]);
        return true;
    }
    public function kitchen_req_finish(Request $request)
    {
        $check = DB::table('m_order_list_detail')->where('no_reg_order', $request->code)->where('order_status', 0)->first();
        if (!$check) {
            DB::table('m_order_list')->where('no_reg_order', $request->code)->update(['m_order_status' => 1]);
        }
        return true;
    }
    // BAHAN BAKU
    public function bahan_baku($akses)
    {
        if ($this->url_akses($akses) == true) {
            $product = DB::table('t_product')->get();
            $data = DB::table('m_bahan_master')->get();
            return view('app.bahan-baku',['data'=>$data,'product'=>$product]);
        } else {
            return Redirect::to('dashboard/home');
        }
    }
    public function bahan_baku_add(Request $request){
        return view('app.bahan-baku.form-add');
    }
    public function bahan_baku_save(Request $request){
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
    // VERIFICATION
    public function verivication($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('t_product_stok')->join('t_product', 't_product.t_product_code', '=', 't_product_stok.t_product_code')
                ->where('t_product_stok.stok_status', 0)->get();
            return view('app.verivication', ['data' => $data]);
        } else {
            return Redirect::to('dashboard/home');
        }
    }
    public function verivication_detail(Request $request)
    {
        $data = DB::table('t_product_stok')
            ->join('t_product', 't_product.t_product_code', '=', 't_product_stok.t_product_code')
            ->join('t_category', 't_category.t_category_code', '=', 't_product.t_category_code')
            ->where('t_product_stok.t_product_token', $request->code)->first();
        return view('app.verification.detail-verification', ['data' => $data]);
    }
    public function verivication_verif(Request $request)
    {
        if ($request->verif == 'Y') {
            $x = 1;
        } elseif ($request->verif == 'T') {
            $x = 2;
        }

        DB::table('t_product_stok')->where('t_product_token', $request->code)->update([
            'stok_status' => $x
        ]);
        return 123;
    }
    // PENGELUARAN / DEFISIT
    public function defisit_money($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('q_inv_data')->get();
            $total = DB::table('q_inv_data')->sum('price_inv');
            $totalterima = DB::table('q_inv_data')->where('status_inv', 1)->sum('price_inv');
            return view('app.pengeluaran', ['data' => $data, 'total' => $total, 'totalterima' => $totalterima]);
        } else {
            return Redirect::to('dashboard/home');
        }
    }
    public function defisit_money_add(Request $request)
    {
        return view('app.pengeluaran.form-add');
    }
    public function defisit_money_tipe(Request $request)
    {
        return 123;
    }
    public function defisit_money_tipe_set(Request $request)
    {
        return view('app.pengeluaran.template-bahan');
    }
    public function defisit_upload_file(Request $request)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if (!$receiver->isUploaded()) {
            // file not uploaded
        }

        $fileReceived = $receiver->receive(); // receive file
        if ($fileReceived->isFinished()) { // file uploading is complete / all chunks are uploaded
            $file = $fileReceived->getFile(); // get file
            $extension = $file->getClientOriginalExtension();
            $fileName = str_replace('.' . $extension, '', $file->getClientOriginalName()); //file name without extenstion
            $fileName .= '_' . md5(time()) . '.' . $extension; // a unique file name

            $disk = Storage::disk(config('filesystems.default'));
            $path = $disk->putFileAs('public/upload-file/' . Auth::user()->userid, $file, $fileName);
            // $path1 = $disk('videos', $file, $fileName);

            // delete chunked file
            unlink($file->getPathname());
            return [
                'path' => asset('public/upload-file/' . Auth::user()->userid . '/' . $fileName),
                'filename' => 'public/upload-file/' . Auth::user()->userid . '/' . $fileName
            ];
        }

        // otherwise return percentage informatoin
        $handler = $fileReceived->handler();
        return [
            'done' => $handler->getPercentageDone(),
            'status' => true
        ];
    }
    public function defisit_money_save(Request $request)
    {
        DB::table('q_inv_data')->insert([
            'no_inv' => $request->nomor,
            'name_inv' => $request->kebutuhan,
            'price_inv' => $request->price,
            'date_inv' => $request->date,
            'status_inv' => 0,
            'file_inv' => $request->link,
            'user_created' => Auth::user()->userid,
            'user_verif' => null,
            'created_at' => now()
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function defisit_detail_file_invoice(Request $request)
    {
        $img = DB::table('q_inv_data')->where('no_inv', $request->code)->first();
        return view('app.pengeluaran.modal-bukti', ['img' => $img]);
    }
    public function defisit_detail_invoice(Request $request)
    {
        $data = DB::table('q_inv_data')->where('no_inv', $request->code)->first();
        return view('app.pengeluaran.modal-detail', ['data' => $data]);

    }
    public function defisit_detail_print_invoice(Request $request)
    {
        $image = base64_encode(file_get_contents(public_path('resto.png')));

        $pdf = PDF::loadview('app.pengeluaran.report.detail-invoice', compact('image'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'Courier']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        $height = $canvas->get_height();
        $width = $canvas->get_width();

        $canvas->set_opacity(.2, "Multiply");

        $canvas->set_opacity(.1);

        // $canvas->page_text($width/5, $height/2, 'Lunas', '123', 30, array(22,0,0),1,2,0);
        $canvas->page_script('
            $pdf->set_opacity(.1);
            $pdf->image("resto.png", 80, 180, 255, 220);
            ');
        return base64_encode($pdf->stream());
    }
    public function defisit_verification_invoice(Request $request)
    {
        return view('app.pengeluaran.modal-verification');
    }
    public function defisit_input_bahan_invoice(Request $request)
    {
        return view('app.pengeluaran.input-bahan');
    }
    // REKAP LAPORAN
    public function rekap_laporan($akses)
    {
        if ($this->url_akses($akses) == true) {
            return view('app.rekap-laporan');
        } else {
            return Redirect::to('dashboard/home');
        }
    }
    public function rekap_laporan_total(Request $request)
    {
        return view('app.report.rekap-total');
    }
    public function rekap_laporan_total_preview(Request $request)
    {
        $image = base64_encode(file_get_contents(public_path('logox.png')));
        // $customPaper = array(0, 0, 420, 640);
        $first = $request->first;
        $end = $request->end;
        $data = DB::table('m_order_list')
            ->join('m_table_master', 'm_table_master.m_table_master_code', '=', 'm_order_list.m_order_table')
            ->orderBy('m_order_list.id', 'DESC')
            ->orWhereBetween('m_order_date', [$first, $end])
            ->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('app.report.preview.report-total', ['data' => $data, 'first' => $first, 'end' => $end], compact('image'))->setPaper('A4', 'landscape')->setOptions(['defaultFont' => 'Courier']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        // $height = $canvas->get_height();
        // $width = $canvas->get_width();

        // $canvas->set_opacity(.2, "Multiply");

        // $canvas->set_opacity(.1);

        // $canvas->page_text($width/5, $height/2, 'Lunas', '123', 30, array(22,0,0),1,2,0);
        // $canvas->page_script('
        //     $pdf->set_opacity(.1);
        //     $pdf->image("resto.png", 80, 180, 255, 220);
        //     ');
        return base64_encode($pdf->stream());
    }
    public function rekap_laporan_pemasukan()
    {
        return view('app.report.rekap-pemasukan');
    }
    public function rekap_laporan_pembelanjaan()
    {
        return view('app.report.rekap-pembelanjaan');
    }
    public function rekap_laporan_pemasukan_preview(Request $request)
    {
        $image = base64_encode(file_get_contents(public_path('logox.png')));
        // $customPaper = array(0, 0, 420, 640);
        $date = now();
        $first = $request->first;
        $end = $request->end;
        $data = DB::table('m_order_list')
            ->join('m_table_master', 'm_table_master.m_table_master_code', '=', 'm_order_list.m_order_table')
            ->orderBy('m_order_list.id', 'DESC')
            ->orWhereBetween('m_order_date', [$first, $end])
            ->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('app.report.preview.report-pemasukan', ['data' => $data, 'first' => $first, 'end' => $end], compact('image'))->setPaper('A4', 'landscape')->setOptions(['defaultFont' => 'Courier']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        // $height = $canvas->get_height();
        // $width = $canvas->get_width();

        // $canvas->set_opacity(.2, "Multiply");

        // $canvas->set_opacity(.1);

        // $canvas->page_text($width/5, $height/2, 'Lunas', '123', 30, array(22,0,0),1,2,0);
        // $canvas->page_script('
        //     $pdf->set_opacity(.1);
        //     $pdf->image("resto.png", 80, 180, 255, 220);
        //     ');
        $dompdf = $pdf->getDomPDF();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
        $dompdf->get_canvas()->page_text(400, 570, "{PAGE_NUM} / {PAGE_COUNT} ", $font, 10, array(0, 0, 0));
        $dompdf->get_canvas()->page_text(33, 570, "$date", $font, 10, array(0, 0, 0));
        return base64_encode($pdf->stream());
    }
    public function rekap_laporan_pembelanjaan_preview(Request $request)
    {
        $image = base64_encode(file_get_contents(public_path('logox.png')));
        // $customPaper = array(0, 0, 420, 640);
        $first = $request->first;
        $end = $request->end;
        $data = DB::table('m_order_list')
            ->join('m_table_master', 'm_table_master.m_table_master_code', '=', 'm_order_list.m_order_table')
            ->orderBy('m_order_list.id', 'DESC')
            ->orWhereBetween('m_order_date', [$first, $end])
            ->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('app.report.preview.report-pembelanjaan', ['data' => $data, 'first' => $first, 'end' => $end], compact('image'))->setPaper('A4', 'landscape')->setOptions(['defaultFont' => 'Courier']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();

        // $height = $canvas->get_height();
        // $width = $canvas->get_width();

        // $canvas->set_opacity(.2, "Multiply");

        // $canvas->set_opacity(.1);

        // $canvas->page_text($width/5, $height/2, 'Lunas', '123', 30, array(22,0,0),1,2,0);
        // $canvas->page_script('
        //     $pdf->set_opacity(.1);
        //     $pdf->image("resto.png", 80, 180, 255, 220);
        //     ');
        $dompdf = $pdf->getDomPDF();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
        $dompdf->get_canvas()->page_text(400, 570, "{PAGE_NUM} / {PAGE_COUNT} ", $font, 10, array(0, 0, 0));
        $dompdf->get_canvas()->page_text(33, 570, "Copyright", $font, 10, array(0, 0, 0));
        return base64_encode($pdf->stream());
    }
}
