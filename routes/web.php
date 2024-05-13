<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaController;
use App\Http\Controllers\ppkController;
use App\Http\Controllers\kabidController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mitraController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\bidangController;
use App\Http\Controllers\satuanController;
use App\Http\Controllers\PerihalController;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\SerahterimaController;
use App\Http\Controllers\SimpanbarangController;
use App\Http\Controllers\sub_kegiatanController;
use App\Http\Controllers\Rekening_kegiatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
});

/*Route::get('/coba',function(){
    return view('penyuratan.pembayaran.template');
}); 

/* Route::get('/index', function () {
    return view('data_master.index');
}); */

/* Route::get('/coba-2', function () {
    return view('penyuratan.pemesanan.output_2');
}); */

Route::get('/admin/data_master',[DataMasterController::class,'index'])->middleware('auth');
Route::get('/login',[LoginController::class,'login'])->name('login');  
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

Route::group(['prefix'=>'admin','middleware'=>['auth'],'as' => 'admin.'], function(){
    /* Route::get('/output', function () {
        return view('data_master.penyuratan.pemesanan.output');
    }); */

    Route::get('/output', [TransaksiController::class, 'index'])->name('penyuratan.output');


//Route::resource('/perihal',PerihalController::class);

//Route::resource('/rekening_kegiatan',Rekening_kegiatanController::class);

Route::resource('/sub_kegiatan',sub_kegiatanController::class);
//Route::resource('/kegiatan',kegiatanController::class);

Route::get('/tbh_sub_keg',[KegiatanController::class,'show']); 

// /* Route untuk menampilkan form tambah kegiatan dan menyimpan kegiatan baru
/* Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.store'); */

// Route untuk menampilkan daftar kegiatan
Route::get('/kegiatan/index', [KegiatanController::class, 'index'])->name('kegiatan.index');


Route::get('kegiatan', [KegiatanController::class, 'index']);

//Route::get('/kegiatan/{id}/subkegiatan', [KegiatanController::class, 'getSubKegiatan']);
Route::resource('/tambah_barang',SimpanbarangController::class);

Route::resource('/pekerjaan',PekerjaanController::class);

Route::resource('/kegiatan',kegiatanController::class);

Route::resource('/kabid',kabidController::class);

Route::resource('/mitra',mitraController::class);

Route::resource('/ppk',ppkController::class);

Route::resource('/pa',PaController::class);

Route::resource('/bidang',bidangController::class);

Route::resource('/barang',barangController::class);

Route::resource('/satuan',satuanController::class);


Route::delete('/pemesanan/{id}',[PemeriksaanController::class,'destroy'])->name('pemesanan.destroy');
Route::resource('/pemesanan',TransaksiController::class);
Route::get('/tambah_barang-pemesanan/{id}',[SimpanbarangController::class,'create']);
Route::post('/tambah_barang',[SimpanbarangController::class,'store']);
Route::get('/cetak-pemesanan/{id}', [TransaksiController::class, 'cetak']);

Route::resource('/pemeriksaan',PemeriksaanController::class);
Route::get('/pemeriksaan-create/{id}',[PemeriksaanController::class,'create']);
Route::post('/pemeriksaan-store/{id}',[PemeriksaanController::class,'store']);
Route::get('/cetak-pemeriksaan/{id}', [PemeriksaanController::class, 'cetak']);

Route::resource('/pembayaran',PembayaranController::class);
Route::get('/pembayaran-create/{id}',[PembayaranController::class,'create']);
Route::post('/pembayaran-store/{id}',[PembayaranController::class,'store']);
Route::get('/cetak-pembayaran/{id}', [PembayaranController::class, 'cetak']);

Route::resource('/serah_terima',SerahterimaController::class);
Route::get('/cetak-serah_terima/{id}', [SerahterimaController::class, 'cetak']);

Route::get('/data',[BarangController::class,'data']);

});
