@if($errors->any())<div class="error"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<label>Username<input name="username" value="{{ old('username',$user->username ?? '') }}" required></label>
<label>Full name<input name="full_name" value="{{ old('full_name',$user->full_name ?? '') }}" required></label>
<label>Email<input type="email" name="email" value="{{ old('email',$user->email ?? '') }}" required></label>
<label>Role<select name="role">@foreach(['admin','manager','cashier'] as $role)<option value="{{ $role }}" @selected(old('role',$user->role ?? 'cashier')===$role)>{{ ucfirst($role) }}</option>@endforeach</select></label>
@if(!isset($user))<label>Initial password<input type="password" name="password" required minlength="8"></label>@else<label>New password (leave blank to keep current)<input type="password" name="password" minlength="8"></label><label>Profile picture (JPG, PNG, WebP; max 2 MB)<input type="file" name="avatar" accept="image/*"></label>@endif
<button class="button">Save user</button>
