<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(2);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images', 'public');
            $customer->image = $path;
        }
        $customer->save();
        Session::flash('message', 'Tạo thành công');
        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.update', compact('customer'));
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->save();
        Session::flash('message', 'Chỉnh sửa thành công');
        return redirect()->route('customers.index');
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.delete', compact('customer'));
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        Session::flash('message', 'Xóa thành công');
        return redirect()->route('customers.index');
    }

    public function show(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->show('images', 'public');
            $customer->image = $path;

        }
        return view('customers.show', compact('customer'));

    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $customers = Customer::where('name', 'like', "%$keyword%")->paginate(5);
        if (count($customers) == 0) {
            Session::flash('message', 'Không có khách hàng');
            return view('customers.index', compact('customers'));
        } else {
            Session::flash('message', 'Đã tìm thấy');
            return view('customers.index', compact('customers'));
        }
    }
}
