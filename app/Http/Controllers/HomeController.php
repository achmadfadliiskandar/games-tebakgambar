<?php

namespace App\Http\Controllers;

use App\Models\PlayGame;
use App\Models\RintanganGame;
use App\Models\Saran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('tambahsaran');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // pemain
    public function index()
    {
        // pengguna dan admin (kalau admin yang login
        // tersedia button untuk mengembalikan ke 
        // dashboardnya kalau pengguna tetap di home)
        return view('home');
    }
    public function tambahsaran(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'komentar' => 'required',
        ]);
        $saran = new Saran;
        $saran->nama = $request->nama;
        $saran->email = $request->email;
        $saran->alamat = $request->alamat;
        $saran->nohp = $request->nohp;
        $saran->komentar = $request->komentar;
        $saran->save();
        return redirect('/')->with('success','Saran Berhasil Di Kirim Terima Kasih');
    }
    public function start(){
        $rintangangamess = RintanganGame::all();
        $data_terakhir = RintanganGame::latest('id')->first();
        $getdataterakhir = $data_terakhir->id - 1;
        $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
        return view('pemain.start',compact('rintangangamess','aktifbermain','getdataterakhir'));
    }
    public function tebak($id){
        $rintangangames = RintanganGame::find($id);
        if ($rintangangames == null) {
            return abort(404);
        } else {
        $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
        return view('pemain.tebak-rintangan',compact('rintangangames','aktifbermain'));
        }
    }
    public function jawab(Request $request){
        $request->validate([
            'jawaban' => 'required',
            'waktu_menjawab' => 'required',
            'rintangan_games_id' => 'required'
        ]);
        // dd("masuk pak eko");
        $playgame = new PlayGame;
        $playgame->rintangan_games_id = $request->rintangan_games_id;
        $playgame->jawaban = $request->jawaban;
        if ($request->jawaban == $playgame->rintangangames->jawaban) {
            $playgame->waktu_menjawab = $request->waktu_menjawab;
            $playgame->user_id = Auth::user()->id;
            $playgame->save();
            return redirect('pemain/get/result')->with('success','Jawaban Anda Benar');
            // dd("jawaban benar");
        }else{
            $playgame->waktu_menjawab = $request->waktu_menjawab;
            $playgame->user_id = Auth::user()->id;
            return redirect()->back()->with('info','Jawaban Anda Salah');
            // $playgame->save();
        }
        // return redirect('pemain/get/result')->with('success','Jawaban Anda Benar');
    }
    public function jawablagi(Request $request){
        $request->validate([
            'jawaban' => 'required',
            'waktu_menjawab' => 'required',
            'rintangan_games_id' => 'required'
        ]);
        // dd("masuk pak eko");
        $playgame = new PlayGame;
        $playgame->rintangan_games_id = $request->rintangan_games_id;
        $playgame->jawaban = $request->jawaban;
        if ($request->jawaban == $playgame->rintangangames->jawaban) {
            $playgame->waktu_menjawab = $request->waktu_menjawab;
            $playgame->user_id = Auth::user()->id;
            return redirect('pemain/get/result')->with('success','Jawaban Anda Benar');
        }else{
            $playgame->waktu_menjawab = $request->waktu_menjawab;
            $playgame->user_id = Auth::user()->id;
            return redirect()->back()->with('info','Jawaban Anda Salah');
        }
        // return redirect('pemain/get/result')->with('success','Jawaban Anda Benar');
    }
    public function result(){
        $playgames = PlayGame::with('rintangangames')->get();
        $playgamesfast = PlayGame::min('waktu_menjawab');
        $playgamesslow = PlayGame::max('waktu_menjawab');
        $seluruhpemain = PlayGame::count();
        $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
        return view('pemain.result',compact('playgames','seluruhpemain','playgamesfast','playgamesslow','aktifbermain'));
    }
    // end pemain
    // admin
    public function admin(){
        // khusus untuk admin

        // data kopit
        $response = Http::get('https://data.covid19.go.id/public/api/prov.json');
        $data = $response->json();
        // data kopit

        // data jam sholat
        $waktusekarang = date("Y-m-d");
        $jasolat = Http::get('https://api.banghasan.com/sholat/format/json/jadwal/kota/703/tanggal/'.$waktusekarang);
        $datasholat = $jasolat->json()['jadwal']['data'];
        // data jam sholat

        // data badminton
        $rangkingbadminton = Http::get('https://www.bwfshuttleapi.com/rankings/api/MS');
        $databadminton = $rangkingbadminton->json();
        // dd($databadminton);
        // data badminton

        // waktu sekarang 
        date_default_timezone_set('Asia/Jakarta');

        // menghitung jumlah user dan saran dan rintangan game
        $users = User::count();
        $sarans = Saran::count();
        $rintangangames = RintanganGame::count();
        // menghitung jumlah user dan saran dan rintangan game

        return view('admin.index',compact('data','datasholat','databadminton','users','sarans','rintangangames'));
    }
    public function adminsaran(){
        $sarans = Saran::all();
        return view('admin.saran.index',compact('sarans'));
    }
    public function adminhapussaran($id){
        $saranss = Saran::find($id);
        $saranss->delete();
        return redirect('/admin/saran')->with('success','Saran Berhasil Di Hapus');
    }
    public function adminusers(){
        $users = User::whereNotIn('name',['admin'])->get();
        return view('admin.user.index',compact('users'));
    }
    public function admintambahusers(){
        return view('admin.auth.createuser');
    }
    public function adminresetpassword(){
        return view('admin.auth.resetpassword');
    }
    protected function admintambahuser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required'
        ]);
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->email_verified_at = date("Y-m-d");
        $users->role = $request->role;
        $users->password = Hash::make($request->password);
        $users->save();
        return redirect('admin/users')->with('success','data user berhasil ditambahkan');
    }
    public function adminhapususer($id){
        $users = User::find($id);
        $users->delete();
        return redirect('admin/users')->with('success','data user berhasil dihapus');
    }
    public function adminupdatepassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required'
        ]);

        // menyamakan password yang lama dengan yang baru
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with('error','password tidak sama');
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with('success','password berhasil di ubah');
    }
    public function adminrintangan(){
        $rintangangames = RintanganGame::all();
        return view('admin.rintangangame.index',compact('rintangangames'));
    }
    public function adminrintangantambah(){
        $rintangangamesjmlh = RintanganGame::count();
        return view('admin.rintangangame.create',compact('rintangangamesjmlh'));
    }
    public function adminrintanganstore(Request $request){
        $request->validate([
            'images' => 'required|mimes:png,jpg,jpeg',
            'judul' => 'required',
            'level' => 'required',
            'jawaban' => 'required',
            'waktu' => 'required',
        ]);

        $namagambar = $request->images->getClientOriginalName(). '.' .time(). '.' .$request->images->extension();
        $request->images->move(public_path('images'),$namagambar);

        $rintangangame = new RintanganGame;
        $rintangangame->judul = $request->judul;
        $rintangangame->level = $request->level;
        $rintangangame->images = $namagambar;
        $rintangangame->jawaban = $request->jawaban;
        $rintangangame->required = $request->required;
        $rintangangame->waktu = $request->waktu;
        $rintangangame->user_id = Auth::user()->id;
        $rintangangame->save();
        return redirect('/admin/rintangangame')->with('success','Rintangan Game Berhasil Ditambah');
    }
    public function adminrintangandetail($id){
        $rintangangames = RintanganGame::find($id);
        if ($rintangangames == null) {
            return abort(404);
        } else {
            return view('admin.rintangangame.show',compact('rintangangames'));
        }
        
    }
    public function adminrintanganedit($id){
        $rintangangames = RintanganGame::find($id);
        if ($rintangangames == null) {
            return abort(404);
        } else{
            return view('admin.rintangangame.edit',compact('rintangangames'));
        }
    }
    public function adminrintanganupdate(Request $request ,$id){
        $rintangangames = RintanganGame::find($id);
        if ($request->hasFile('images')) {
            $tujuan = 'images/'.$rintangangames->images;
            if (File::exists($tujuan)) {
                File::delete($tujuan);
            }
            $file = $request->file('images');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('images/',$filename);
            $rintangangames->images = $filename;
        }
        $rintangangames->judul = $request->judul;
        $rintangangames->level = $request->level;
        $rintangangames->jawaban = $request->jawaban;
        $rintangangames->waktu = $request->waktu;
        $rintangangames->required = $request->required;
        $rintangangames->save();
        return redirect('admin/rintangangame')->with('success','Rintangan Berhasil Di Edit');
    }
    public function adminrintanganhapus($id){
        $rintangangames = RintanganGame::find($id);
        $playgames = PlayGame::where('rintangan_games_id',$id);
        $tujuanfile = 'images/'.$rintangangames->images;
        if (File::exists($tujuanfile)) {
            File::delete($tujuanfile);
        }
        $rintangangames->delete();
        $playgames->delete();
        return redirect('admin/rintangangame')->with('success','Rintangan Berhasil Di Hapus');
    }
    // end admin
}
