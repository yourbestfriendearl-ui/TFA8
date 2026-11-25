<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Laravel\Facades\Image;
class UserController extends Controller
{
 public function index(): View { return view('users.index',['users'=>User::orderBy('username')->get()]); }
 public function create(): View { return view('users.create'); }
 public function store(Request $request): RedirectResponse
 {
  $data=$request->validate(['username'=>['required','string','min:3','max:40','unique:users,username'],'full_name'=>['required','string','min:2','max:120'],'email'=>['required','email','max:255','unique:users,email'],'role'=>['required','in:admin,manager,cashier'],'password'=>['required','string','min:8']]);
  $data['password']=bcrypt($data['password']); User::create($data);
  return redirect()->route('users.index')->with('success','User created.');
 }
 public function edit(User $user): View { return view('users.edit',compact('user')); }
 public function show(User $user): View { return view('users.show',compact('user')); }
 public function update(Request $request, User $user): RedirectResponse
 {
  $data=$request->validate(['username'=>['required','string','min:3','max:40','unique:users,username,'.$user->id],'full_name'=>['required','string','min:2','max:120'],'email'=>['required','email','max:255','unique:users,email,'.$user->id],'role'=>['required','in:admin,manager,cashier'],'password'=>['nullable','string','min:8'],'avatar'=>['nullable','image','max:2048']]);
  unset($data['avatar']); if (!$request->filled('password')) unset($data['password']); else $data['password']=bcrypt($data['password']);
  if ($request->hasFile('avatar')) {
   $image=Image::read($request->file('avatar'))->cover(256,256);
   $path='avatars/'.Str::uuid().'.jpg'; Storage::disk('public')->put($path,(string)$image->toJpeg(85));
   if ($user->avatar) Storage::disk('public')->delete($user->avatar);
   $data['avatar']=$path;
  }
  $user->update($data); return redirect()->route('users.index')->with('success','User updated.');
 }
 public function destroy(User $user): RedirectResponse
 {
  if ($user->avatar) Storage::disk('public')->delete($user->avatar);
  $user->delete();
  return redirect()->route('users.index')->with('success','User deleted.');
 }
}
