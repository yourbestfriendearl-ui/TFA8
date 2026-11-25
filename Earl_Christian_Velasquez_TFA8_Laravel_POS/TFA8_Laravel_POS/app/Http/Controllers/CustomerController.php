<?php
namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class CustomerController extends Controller
{
 public function index(): View { return view('customers.index',['customers'=>Customer::orderBy('full_name')->get()]); }
 public function create(): View { return view('customers.create'); }
 public function store(Request $request): RedirectResponse { Customer::create($request->validate($this->rules())); return redirect()->route('customers.index')->with('success','Customer created.'); }
 public function edit(Customer $customer): View { return view('customers.edit',compact('customer')); }
 public function show(Customer $customer): View { return view('customers.show',compact('customer')); }
 public function update(Request $request, Customer $customer): RedirectResponse { $customer->update($request->validate($this->rules())); return redirect()->route('customers.index')->with('success','Customer updated.'); }
 public function destroy(Customer $customer): RedirectResponse { $customer->delete(); return redirect()->route('customers.index')->with('success','Customer deleted.'); }
 private function rules(): array { return ['full_name'=>['required','string','min:2','max:120'],'email'=>['required','email','max:255'],'phone'=>['nullable','string','max:30'],'address'=>['nullable','string','max:500'],'country'=>['nullable','string','max:100'],'status'=>['required','in:active,inactive']]; }
}
