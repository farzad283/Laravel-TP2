<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return Hash::make($request->password);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',//unique:users baraye vaghti ke duplicate mishavad email
            'password' => 'min:6|max:20'
        ]);

        //if vrai redirect()->back()->withErrors()->withInputs()

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        //courriel
        // $to_name = $request->name;
        // $to_email = $request->email;
        // $body = "<a href='#'>Cliquer ici</a>";

        // Mail::send('email.mail',['name'=>$to_name,
        //                 'body'=>$body],
        //             function($message) use ($to_name, $to_email){
        //                 $message->to($to_email, $to_name)->subject('Courriel de test laravel');
        //             });
        return redirect(route('login'))->withSuccess('Utilisateur enregistré');
        // return redirect(route('login'))->withSuccess(trans('lang.text_success-user'));
    }


    public function authentication(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        // return $request;

        $credentials = $request->only('email', 'password');

        if(!Auth::validate($credentials)){
            return redirect()->back()->withErrors(trans('auth.password'));//'failed' ya 'password' az config / app avardim
        }

        $user = Auth::getProvider()->retrieveByCredentials ($credentials);

        Auth::login($user);

        return redirect()->intended( route('list.index'));//intended :har che dar url ghabl login bezanim baade login dar haman safhe khahim raft. masalan localhost:80000/blog-create
    }


    public function logout(){
        Auth::logout();
        return redirect((route('login')));
    }



    public function userList(){
        $users = User::select('id', 'name', 'email')
                ->orderby('name')
                ->paginate(5);
        //return $users;
        
        return view('auth.user-list', ['users' => $users]);
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
    }
}
