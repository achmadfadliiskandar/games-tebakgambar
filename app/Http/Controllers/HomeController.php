<?php

namespace App\Http\Controllers;

use App\Models\DetailLevel;
use App\Models\LevelGame;
use App\Models\PlayGame;
use App\Models\RintanganGame;
use App\Models\Saran;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        $this->middleware('auth')->except('tambahsaran','welcome','demo');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // pemain
    public function welcome(){
        $rintangangamesss = RintanganGame::first('id')->paginate(1);
        return view('welcome',compact('rintangangamesss'));
    }
    public function index()
    {
        // pengguna dan admin (kalau admin yang login
        // tersedia button untuk mengembalikan ke 
        // dashboardnya kalau pengguna tetap di home)
        return view('home');
    }
    public function demo(Request $request){
        $request->validate([
            'jawaban' => 'required',
            'waktu_menjawab' => 'required',
            'rintangan_games_id' => 'required'
        ]);
        $playgame = new PlayGame;
        $playgame->rintangan_games_id = $request->rintangan_games_id;
        $playgame->jawaban = $request->jawaban;
        if ($request->jawaban == $playgame->rintangangames->jawaban) {
            $playgame->waktu_menjawab = $request->waktu_menjawab;
            $playgame->user_id = 1;
            return redirect('/login')->with('success','Jawaban Anda Benar');
        }else{
            $playgame->waktu_menjawab = $request->waktu_menjawab;
            $playgame->user_id = 1;
            return redirect()->back()->with('info','Jawaban Anda Salah');
        }
    }
    public function tambahsaran(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            // 'alamat' => 'required',
            'nohp' => 'required',
            'komentar' => 'required',
        ]);
        $saran = new Saran;
        $saran->nama = $request->nama;
        $saran->email = $request->email;
        // $saran->alamat = $request->alamat;
        $saran->nohp = $request->nohp;
        $saran->komentar = $request->komentar;
        $saran->save();
        return redirect('/')->with('success','Saran Berhasil Di Kirim Terima Kasih');
    }
    public function start(){
        $rintangangamess = RintanganGame::all();
        $levelgames = LevelGame::all();
        $data_terakhir = DetailLevel::latest('rintangan_games_id')->first();
        if (empty($data_terakhir)) {
        $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
        return view('pemain.start',compact('rintangangamess','aktifbermain','levelgames'));
        } else {
        $getdataterakhir = $data_terakhir->rintangangames->required + 1;
        $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
        return view('pemain.start',compact('rintangangamess','aktifbermain','getdataterakhir','levelgames'));
        }
        
        $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
        return view('pemain.start',compact('rintangangamess','aktifbermain','getdataterakhir'));
    }
    public function tebak($id){
        $rintangangames = RintanganGame::find($id);
        $rintangangamess = RintanganGame::all();
        $levelgames = LevelGame::with('detailgames')->where('id',$id)->first();
        if ($levelgames == null) {
            return abort(404);
        } else {
        $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
        return view('pemain.tebak-rintangan',compact('rintangangames','aktifbermain','rintangangamess','levelgames'));
        }
    }
    public function tebakjawaban($id){
        $rintangangames = RintanganGame::find($id);
        $rintangangamess = RintanganGame::all();
        if ($rintangangames == null) {
            return abort(404);
        } else {
        $detailrintangan = DetailLevel::where('rintangan_games_id',$rintangangames->id)->exists();
        // dd($detailrintangan);
        if ($detailrintangan == false) {
            return redirect('/pemain/start')->with('info','maaf levelnya tidak terdaftar ya');
        } else {
            $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
            return view('pemain.answer',compact('rintangangames','aktifbermain','rintangangamess'));
        }
        
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
            return redirect('pemain/start')->with('success','Jawaban Anda Benar');
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
            return redirect('pemain/start')->with('success','Jawaban Anda Benar');
        }else{
            $playgame->waktu_menjawab = $request->waktu_menjawab;
            $playgame->user_id = Auth::user()->id;
            return redirect()->back()->with('info','Jawaban Anda Salah');
        }
        // return redirect('pemain/get/result')->with('success','Jawaban Anda Benar');
    }
    public function result(){
        $playgames = PlayGame::with('rintangangames')->orderBy('waktu_menjawab', 'ASC')->paginate();
        $playgamesfast = PlayGame::min('waktu_menjawab');
        $playgamesslow = PlayGame::max('waktu_menjawab');
        $seluruhpemain = PlayGame::count();
        $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
        return view('pemain.result',compact('playgames','seluruhpemain','playgamesfast','playgamesslow','aktifbermain'));
    }
    public function profile(){
        $playerplay = PlayGame::where('user_id',Auth::user()->id)->get();
        $aktifbermain = PlayGame::where('user_id',Auth::user()->id)->count();
        $playgamesfast = PlayGame::where('user_id',Auth::user()->id)->min('waktu_menjawab');
        $playgamesslow = PlayGame::where('user_id',Auth::user()->id)->max('waktu_menjawab');
        $getuserlogin = Auth::user()->id;
        return view('pemain.profile',compact('playerplay','aktifbermain','playgamesfast','playgamesslow','getuserlogin'));
    }
    public function pemainupdate(Request $request){
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
    public function editdd(Request $request,$id){
        // dd("masuk pak eko",$id);
        $playerplay = User::find($id);
        $playerplay->name = $request->name;
        $playerplay->email = $request->email;
        $playerplay->role = $request->role;
        $playerplay->email_verified_at = date("d-M-Y H:i:s");
        $playerplay->save();
        return back()->with('success','data diri berhasil di ubah');
    }
    // end pemain
    // admin
    public function admin(){
        // khusus untuk admin
        // waktu sekarang 
        date_default_timezone_set('Asia/Jakarta');
        // menghitung jumlah user dan saran dan rintangan game
        $users = User::count();
        $sarans = Saran::count();
        $rintangangames = RintanganGame::count();
        $playgamescount = PlayGame::count();
        $playgamess = PlayGame::all();
        $playgamesfast = PlayGame::min('waktu_menjawab');
        $playgamesslow = PlayGame::max('waktu_menjawab');
        $seluruhpemain = PlayGame::count();
        // menghitung jumlah user dan saran dan rintangan game
        $playgames = PlayGame::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $month = PlayGame::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');

        $dataplay = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($month as $key => $month) {
            $dataplay[$month] = $playgames[$key];
        }
        return view('admin.index',compact('users','sarans','rintangangames','playgamesfast','playgamesslow','seluruhpemain','dataplay','playgamescount','playgamess'));
    }
    public function admininformasi(){
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

        return view('admin.informasiumum',compact('data','datasholat','databadminton','users','sarans','rintangangames'));
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
            // 'judul' => 'required',
            // 'level' => 'required',
            'jawaban' => 'required',
            'waktu' => 'required',
            'warna'=> 'required'
        ]);

        $namagambar = $request->images->getClientOriginalName(). '.' .time(). '.' .$request->images->extension();
        $request->images->move(public_path('images'),$namagambar);

        $rintangangame = new RintanganGame;
        // $rintangangame->judul = $request->judul;
        // $rintangangame->level = $request->level;
        $rintangangame->images = $namagambar;
        $rintangangame->jawaban = $request->jawaban;
        $rintangangame->required = $request->required;
        $rintangangame->waktu = $request->waktu;
        $rintangangame->warna = $request->warna;
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
        // $rintangangames->judul = $request->judul;
        // $rintangangames->level = $request->level;
        $rintangangames->jawaban = $request->jawaban;
        $rintangangames->waktu = $request->waktu;
        $rintangangames->warna = $request->warna;
        $rintangangames->required = $request->required;
        $rintangangames->save();
        return redirect('admin/rintangangame')->with('success','Rintangan Berhasil Di Edit');
    }
    public function adminrintanganhapus($id){
        $rintangangames = RintanganGame::find($id);
        $playgames = PlayGame::where('rintangan_games_id',$id);
        $detailevels = DetailLevel::where('rintangan_games_id',$id);
        $tujuanfile = 'images/'.$rintangangames->images;
        if (File::exists($tujuanfile)) {
            File::delete($tujuanfile);
        }
        $rintangangames->delete();
        $detailevels->delete();
        $playgames->delete();
        return redirect('admin/rintangangame')->with('success','Rintangan Berhasil Di Hapus');
    }
    public function adminlevelgame(){
        $levelgames = LevelGame::all();
        return view('admin.level.index',compact('levelgames'));
    }
    public function adminlevelgametambah(){
        return view('admin.level.create');
    }
    public function adminlevelgamestore(Request $request){
        // dd("masuk");
        // dd($request->all());

        $request->validate([
            'judul' => 'required',
            'level' => 'required',
            // 'rintangan_games_id' => 'required',
        ]);

        $levelgame = new LevelGame;
        $levelgame->judul = $request->judul;
        $levelgame->level = $request->level;
        $levelgame->user_id = Auth::user()->id;
        $levelgame->save();

        // $detailgame = new DetailLevel;
        // $detailgame->level_games_id = $levelgame->id;
        // $detailgame->rintangan_games_id = $request->rintangan_games_id;
        // $detailgame->user_id = Auth::user()->id;
        // $detailgame->save();
        return redirect('/admin/levelgame')->with('success','Level Berhasil Ditambah');
    }
    public function adminlevelgameedit($id){
        $levelgames = LevelGame::find($id);
        $rintangangamessss = RintanganGame::all();
        if ($levelgames == null) {
            return abort(404);
        } else{
            return view('admin.level.edit',compact('levelgames','rintangangamessss'));
        }
    }
    public function adminlevelgameupdate(Request $request,$id){
        $request->validate([
            'judul' => 'required',
            'level' => 'required',
            // 'rintangan_games_id' => 'required',
        ]);

        $levelgame = LevelGame::find($id);
        $levelgame->judul = $request->judul;
        $levelgame->level = $request->level;
        $levelgame->user_id = Auth::user()->id;
        $levelgame->save();

        // $detailgame = DetailLevel::find($id);
        // $detailgame->level_games_id = $levelgame->id;
        // $detailgame->rintangan_games_id = $request->rintangan_games_id;
        // $detailgame->user_id = Auth::user()->id;
        // $detailgame->save();
        return redirect('/admin/levelgame')->with('success','Level Berhasil Di Ubah');
    }
    public function adminlevelgamehapus($id){
        $levelgames = LevelGame::find($id);
        $detailevels = DetailLevel::where('level_games_id',$id);
        $levelgames->delete();
        $detailevels->delete();
        return redirect('/admin/levelgame')->with('success','Level Berhasil Di Hapus');
    }
    public function adminlevelgamedetail($id){
        $levelgames = LevelGame::with('detailgames')->where('id',$id)->first();
        if ($levelgames == null) {
            return abort(404);
        } else {
            return view('admin.level.detail',compact('levelgames'));
        }
    }
    public function admingroupgame(){
        $kelompokgames = DetailLevel::with('levelgames')->get();
        // dd($kelompokgames);
        return view('admin.groupgame.index',compact('kelompokgames'));
    }
    public function admingroupgametambah(){
        $rintangangamessss = RintanganGame::all();
        $levelgamesss = LevelGame::all();
        return view('admin.groupgame.create',compact('rintangangamessss','levelgamesss'));
    }
    public function admingroupgamestore(Request $request){
        $request->validate([
            'rintangan_games_id' => 'required',
            'level_games_id' => 'required',
        ]);
        $detaillevel = new DetailLevel;
        $detaillevel->rintangan_games_id = $request->rintangan_games_id;
        $detaillevel->level_games_id = $request->level_games_id;
        $detaillevel->user_id = Auth::user()->id;
        $detaillevel->save();
        return redirect('/admin/groupgame')->with('success','Kelompok Berhasil Dibuat');
    }
    public function admingroupgamesedit($id){
        $detaildata = DetailLevel::find($id);
        $rintangangamessss = RintanganGame::all();
        $levelgamesss = LevelGame::all();
        return view('admin.groupgame.edit',compact('rintangangamessss','levelgamesss','detaildata'));
    }
    public function admingroupgameupdate(Request $request,$id){
        $request->validate([
            'rintangan_games_id' => 'required',
            'level_games_id' => 'required',
        ]);
        $detaillevel = DetailLevel::find($id);
        $detaillevel->rintangan_games_id = $request->rintangan_games_id;
        $detaillevel->level_games_id = $request->level_games_id;
        $detaillevel->user_id = Auth::user()->id;
        $detaillevel->save();
        return redirect('/admin/groupgame')->with('success','Kelompok Berhasil Di Edit');
    }
    public function admingroupgamehapus($id){
        $detaillvlhapus = DetailLevel::find($id);
        $detailtodelete = PlayGame::where('rintangan_games_id',$detaillvlhapus->rintangan_games_id);
        $detaillvlhapus->delete();
        $detailtodelete->delete();
        return redirect('/admin/groupgame')->with('success','Kelompok Berhasil Di Hapus');
    }
    // end admin
}
