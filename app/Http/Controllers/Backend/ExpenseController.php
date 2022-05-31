<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense_type;
use App\Models\Expense;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use PDF;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    //mthod start
    public function ExpenseView()
    {
        $expense_type = Expense_type::all();


        return view('backend.expense.add_expense', compact('expense_type'));
    }

    //method end

    public function ExpenseList()
    {
        $expens = Expense::with(['expense_type_name'])->orderBy('id', 'DESC')->get();
        // dd($expens);
        return view('backend.expense.expense_list', compact('expens'));
    }

    //mthod start
    public function ExpenseStore(Request $request)
    {

        $request->validate([

            'date' => 'required',
            'expence_type' => 'required',
            'amount' => 'required',
            'payment_type' => 'required',
            'expense_short_descp' => 'required',

        ]);


        $expenseData = [

            'expense_date' => $request->date,
            'expense_type' => $request->expence_type,
            'expense_amount' => $request->amount,
            'expense_payment_type' => $request->payment_type,
            'description' => $request->expense_short_descp,
        ];

        if ($request->hasFile('expense_image')) {
            $expenseData['expense_img'] = $this->uploadImageSize('expense', $request->expense_image, 'expense', 917, 1000);
        }

        Expense::insert($expenseData);

        $notification = array(
            'message' => 'Product Add Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('role.expense.list', config('fortify.guard'))->with($notification);
    }

    //mthod start
    public function ExpenseEdit()
    {
    }
    //mthod start

    public function ExpenseUpdate()
    {
    }

    public function AddecpenseType(Request $request)
    {
        $expense_name = $request->input('add_expense_type');

        $expens = Expense_type::insert(['expense_type' => $expense_name]);
        return response()->json($expens);
    }

    public function GetExpenseType()
    {
        $expense_type = Expense_type::orderBy('id', 'DESC')->first();
        return response()->json(['expense_name' =>  $expense_type,]);
    }


    public function GanerateReport()
    {

        $expens = Expense::with(['expense_type_name'])->where('expense_date', Carbon::today()->toDateString())->orderBy('id', 'DESC')->get();
        // dd($expens);

        // return view('backend.report.expense_report',compact('expens'));

        // return view('frontend.user.order.order_invoice',compact('expens'));
        $pdf = PDF::loadView('backend.report.expense_report', compact('expens'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('expense.pdf');
    }
}
