<?php
namespace Database\Seeders;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
 public function run():void
 {
  User::create(['name'=>'Earl Admin','username'=>'admin','full_name'=>'Earl Christian Velasquez','email'=>'admin@example.test','password'=>bcrypt('password'),'role'=>'admin']);
  foreach ([['Yuji Itadori','itadori@jujutsuhigh.com','09171234567'],['Yuta Okkotsu','okkotsu@jujutsuhigh.com','09181234567'],['Megumi Fushiguro','fushiguro@jujutsuhigh.com','09191234567'],['Nobara Kugisaki','kugisaki@jujutsuhigh.com','09201234567'],['Maki Zenin','maki@jujutsuhigh.com','09211234567']] as [$name,$email,$phone]) Customer::create(['full_name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>'Tokyo, Japan','country'=>'Japan','status'=>'active']);
 }
}
