<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Department_salary;
use Illuminate\Support\Facades\DB;
use PDF;
use DateTime;
use App\Models\Order;
use App\Models\Expense;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use Carbon\Carbon;


class ReportController extends Controller
{
    // ReportView
    public function ReportView()
    {
        return view('backend.report.report_view');
    } // end mathod

    // search by date
    public function ReportByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formatDate = $date->format('Y-m-d');
        $orders = Order::whereDate('order_date', $formatDate)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    } // end mehtod

    // search by Month
    public function ReportByMonth(Request $request)
    {
        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    } // end mehtod

    // search by Year
    public function ReportByYear(Request $request)
    {

        $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('backend.report.report_show', compact('orders'));
    } // end mehtod



    //sallary report view
    public function SalaryReportView()
    {

        return view('backend.report.salary_report');
    }

    //get salary report
    public function SalaryReport(Request $request)

    {
        $dateValue = $request->all();

        //check by date
        if (array_key_exists('date', $dateValue)) {
            // dd($dateValue['date']);

            //get date from database
            $first_date = Carbon::create($dateValue['date'])->startOfMonth();
            $end_date = Carbon::create($dateValue['date'])->endOfMonth();

            $paidEmployes = DB::table('employees')
                ->join('department_salaries', 'employees.id', '=', 'department_salaries.employee_id')
                ->whereBetween('department_salaries.salary_date', [$first_date, $end_date])
                ->select('employees.*', 'department_salaries.paid_salary', 'department_salaries.due_salary', 'department_salaries.bonus', 'department_salaries.advance_salary', 'department_salaries.total_salary', 'department_salaries.salary_date', 'department_salaries.added_by')
                ->get();
            // dd($paidEmployes);

            return view('backend.DepartmentSalary.paidSalary', compact('paidEmployes'));
        }

        //check by month
        if (array_key_exists('month', $dateValue) && array_key_exists("year_name", $dateValue)) {

            $paidEmployes = DB::table('employees')
                ->join('department_salaries', 'employees.id', '=', 'department_salaries.employee_id')->whereMonth('department_salaries.salary_date', $dateValue['month'])
                ->whereYear('department_salaries.salary_date', $dateValue['year_name'])
                ->select('employees.*', 'department_salaries.paid_salary', 'department_salaries.due_salary', 'department_salaries.bonus', 'department_salaries.advance_salary', 'department_salaries.total_salary', 'department_salaries.salary_date', 'department_salaries.added_by')
                ->groupBy('employees.department_id')
                ->get();

            if (count($paidEmployes) != 0) {
                //dd($paidEmployes);
                return view('backend.DepartmentSalary.paidSalary', compact('paidEmployes'));
            } else {

                return Redirect()->back()->withErrors(['month' => 'No data Found']);
            }
        }

        //check by only year

        if (array_key_exists('year', $dateValue)) {

            $paidEmployes = DB::table('employees')
                ->join('department_salaries', 'employees.id', '=', 'department_salaries.employee_id')
                ->whereYear('department_salaries.salary_date', $dateValue['year'])

                ->select(
                    'employees.*',
                    'department_salaries.paid_salary',
                    'department_salaries.due_salary',
                    'department_salaries.bonus',
                    'department_salaries.advance_salary',
                    'department_salaries.total_salary',
                    'department_salaries.salary_date',
                    'department_salaries.added_by'
                )
                ->get();

            if (count($paidEmployes) != 0) {
                return view('backend.DepartmentSalary.paidSalary', compact('paidEmployes'));
            } else {

                return Redirect()->back()->withErrors(['year' => 'No data Found']);
            }
        }

        //end check by year
    }

    //end sallary report

    //return report view
    public function returnReportView()
    {

        return view('backend.report.return_product_report');
    }

    //get return report
    public function returnReport(Request $request)
    {

        //dd($request->all());


        $dateValue = $request->all();

        //check by date
        if (array_key_exists('date', $dateValue)) {
            // dd($dateValue['date']);

            //get date from database
            $orders = Order::where('return_order', 2)->where('return_date', $dateValue['date'])->get();

            if (count($orders) != 0) {

                //dd($paidEmployes);
                return view('backend.return_order.all_return_request', compact('orders'));
            } else {

                return Redirect()->back()->withErrors(['date' => 'No data Found']);
            }
        }



        //check by month

        if (array_key_exists('month', $dateValue) && array_key_exists("year_name", $dateValue)) {

            $orders = Order::where('return_order', 2)->whereMonth('return_date', $dateValue['month'])
                ->whereYear('return_date', $dateValue['year_name'])->get();

            if (count($orders) != 0) {

                //dd($paidEmployes);
                return view('backend.return_order.all_return_request', compact('orders'));
            } else {

                return Redirect()->back()->withErrors(['month' => 'No data Found']);
            }
        }

        //check by only year

        if (array_key_exists('year', $dateValue)) {

            $orders = Order::where('return_order', 2)
                ->whereYear('return_date', $dateValue['year'])->get();

            if (count($orders) != 0) {

                //dd($paidEmployes);
                return view('backend.return_order.all_return_request', compact('orders'));
            } else {

                return Redirect()->back()->withErrors(['year' => 'No data Found']);
            }
        }
    }
    //end return report


    //end method
    //user report view
    public function UserActivityReportView()
    {

        return view('backend.report.active_user');
    }
    //end methood

    //get user activity report
    public function  UserActivityReport(Request $request)
    {

        dd($request->all());
    }

    //end method

    // ProfitReportView
    public function ProfitReportView()
    {

        return view('backend.report.profit_report');
    } // end mathod

    // search ProfitReportDay
    public function ProfitReportDay(Request $request)
    {

        $date = new DateTime($request->date);

        $formatDate = $date->format('Y-m-d');

        // return $formatDate;
        $totalincome = Order::whereDate('order_date', $formatDate)->where('status', '=', 'delivered')->sum('amount');
        $returnamount = Order::whereDate('updated_at', $formatDate)->where('return_order', '=', '2')->sum('amount');
        $salarypay = Department_salary::whereDate('salary_date', $formatDate)->sum('paid_salary');
        $expancepay = Expense::whereDate('expense_date', $formatDate)->sum('expense_amount');
        $profit = $totalincome - $salarypay;
        // $pdf=PDF::loadView('backend.report.profit_report_pdf',compact('totalincome','salarypay','expancepay','profit'))->setPaper(array(0,0,204,600));
        // return $pdf->stream('backend.report.profit_report_pdf') ;
        $profit = $totalincome - ($salarypay + $expancepay + $returnamount);
        return view('backend.report.profit_report_pdf', compact('totalincome', 'salarypay', 'expancepay', 'profit', 'returnamount'));
    } // end mehtod
    // search ProfitReportDay
    public function ProfitReportMonth(Request $request)
    {

        $date = Carbon::createFromDate($request->year_name, $request->month);

        $startOfTheMonth = $date->startOfMonth();
        $startOfTheMonth = $startOfTheMonth->toDateString();
        $endOfTheMonth = $date->endOfMonth();
        $endOfTheMonth = $endOfTheMonth->toDateString();

        // return $formatDate;
        $totalincome = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->where('status', '=', 'delivered')->sum('amount');
        $returnamount = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->where('return_order', '=', '2')->sum('amount');
        $salarypay = Department_salary::whereBetween('salary_date', [$startOfTheMonth, $endOfTheMonth])->sum('paid_salary');
        $expancepay = Expense::whereBetween('expense_date', [$startOfTheMonth, $endOfTheMonth])->sum('expense_amount');


        $profit = $totalincome - ($salarypay + $expancepay + $returnamount);

        // $pdf=PDF::loadView('backend.report.profit_report_pdf',compact('totalincome','salarypay','expancepay','profit'))->setPaper(array(0,0,204,600));
        // return $pdf->stream('backend.report.profit_report_pdf') ;
        return view('backend.report.profit_report_pdf', compact('totalincome', 'salarypay', 'expancepay', 'profit', 'returnamount'));
    } // end mehtod
    // search ProfitReportyear
    public function ProfitReportYear(Request $request)
    {

        $date = Carbon::createFromDate($request->year_name);

        $formatDate = $date->format('Y');

        // return $formatDate;
        $totalincome = Order::where('order_year', $request->year)->where('status', '=', 'delivered')->sum('amount');
        $returnamount = Order::where('order_year', $request->year)->where('return_order', '=', '2')->sum('amount');
        // dd($request->year_name);
        $salarypay = Department_salary::whereYear('salary_date', $formatDate)->sum('paid_salary');

        $expancepay = Expense::whereYear('expense_date', $formatDate)->sum('expense_amount');
        $profit = $totalincome - ($salarypay + $expancepay + $returnamount);

        // $pdf=PDF::loadView('backend.report.profit_report_pdf',compact('totalincome','salarypay','expancepay','profit'))->setPaper(array(0,0,400,200));
        // return $pdf->stream('backend.report.profit_report_pdf') ;
        return view('backend.report.profit_report_pdf', compact('totalincome', 'salarypay', 'expancepay', 'profit', 'returnamount'));
    } // end mehtod

    public function PurchaseReportView()
    {
        $purchases = DB::table('purchases')
            ->join('suppliers', 'suppliers.id', '=', 'purchases.supplier_id')
            ->select('supplier_id', 'supplyer_name', 'payment_method', 'due_amount')
            ->distinct('supplyer_name')
            ->get();

        // $getpurchase = Purchase::get();
        return view('backend.report.purchase_report', compact('purchases'));
    }
    public function PurchaseReportStore(Request $request)
    {
        // dd($request);
        if ($request->has('date')) {
            $report = Purchase::whereDate('purchase_date', $request->date)->get();
        } else if ($request->has('month') && $request->has('year_name')) {
            $report = Purchase::whereMonth('purchase_date', $request->month)->whereYear('purchase_date', $request->year_name)->get();
        } else if ($request->has('year')) {
            $report = Purchase::whereYear('purchase_date', $request->year)->get();
        }

        return view('backend.report.view_purchase_report', compact('report'));
    }
    public function PurchaseReportViews()
    {
        return view('backend.report.view_purchase_report');
    }
    public function SaleReportView()
    {
        return view('backend.report.sales_report');
    }


    // for salary
    // search by date
    public function SaleReportByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formatDate = $date->format('Y-m-d');
        $orders = DB::table('orders')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->distinct()
            ->whereDate('order_date', $formatDate)
            ->get();
        // dd($orders);

        // $orders = Order::whereDate('order_date', $formatDate)->latest()->get();
        return view('backend.report.view_sales_report', compact('orders'));
    } // end mehtod

    // search by Month
    public function SaleReportByMonth(Request $request)
    {
        $month = $request->input('month');
        $year_name = $request->input('year_name');
        $orders = DB::table('orders')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('order_month', $month)
            ->where('order_year', $year_name)
            ->get();
        // dd($orders);
        // $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();
        return view('backend.report.view_sales_report', compact('orders'));
    } // end mehtod

    // search by Year
    public function SaleReportByYear(Request $request)
    {
        $year_name = $request->input('year');
        $orders = DB::table('orders')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->where('order_year', $year_name)
            ->get();
        // $orders = Order::where('order_year', $request->year)->latest()->get();
        return view('backend.report.view_sales_report', compact('orders'));
    } // end mehtod


 //........Category Wise Product Reports ...........//

 public function CatWiseProReportView(){
    return view('backend.report.cat_wise_pro_report');
}


public function getCatWiseProReport(Request $request){
    //dd($request->all());
    $year = $request->year;
    $monthwithyear = $request->year_name;
    $month = $request->month;
    $date = $request->date;

    if($request->has('date')){
        $catwiseproduct = DB::table('categories')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->join('order_items', 'order_items.product_id', '=', 'products.id')
        ->join('orders', 'orders.id', '=', 'order_items.order_id')
        ->select('products.*',DB::raw('SUM(order_items.qty) AS sum_of_product'))
        ->where('orders.status','=','Delivered')
        ->whereDate('orders.created_at','=',$date)
        ->groupBy('products.id')
        ->get();



    }else if ($request->has('month') && $request->has('year_name')){
        $catwiseproduct = DB::table('categories')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->join('order_items', 'order_items.product_id', '=', 'products.id')
        ->join('orders', 'orders.id', '=', 'order_items.order_id')
        ->select('products.*',DB::raw('SUM(order_items.qty) AS sum_of_product'))
        ->where('orders.status','=','Delivered')
        ->whereMonth('orders.created_at','=',$month)
        ->whereYear('orders.created_at','=',$monthwithyear)
        ->groupBy('products.id')
        ->get();


    } else if ($request->has('year')){
        $catwiseproduct = DB::table('categories')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->join('order_items', 'order_items.product_id', '=', 'products.id')
        ->join('orders', 'orders.id', '=', 'order_items.order_id')
        ->select('products.*','categories.category_name',DB::raw('COUNT(products.product_qty) AS product_counts'),DB::raw('SUM(order_items.qty) AS sum_of_product'))
        ->where('orders.status','=','Delivered')
        ->whereYear('orders.created_at','=',$year)
        ->groupBy('products.id')
        ->get();

    }

    // All report view according to search
    return view('backend.report.cat_wise_pro_view',compact('catwiseproduct'));
}

// Product stock report start
public function productstockreport(){

    return view('backend.report.product_stock_report');
}

public function getproductstock(Request $request){
    $year = $request->year;
    $monthwithyear = $request->year_name;
    $month = $request->month;
    $date = $request->date;

    if($request->has('year')){
        $productstock = Product::join('order_items','order_items.product_id','=','products.id')->join('orders','orders.id','=','order_items.order_id')
                        ->where('orders.status','=','Delivered')
                        ->whereYear('orders.created_at','=',$year)
                        ->select('product_name','product_qty',DB::raw('SUM(order_items.qty) AS orderQty'))
                        ->get();
                        //dd($productstock);
    }else if($request->has('month') && $request->has('year_name')){
        $productstock = Product::join('order_items','order_items.product_id','=','products.id')->join('orders','orders.id','=','order_items.order_id')
                        ->where('orders.status','=','Delivered')
                        ->whereMonth('orders.created_at','=',$month)
                        ->whereYear('orders.created_at','=',$monthwithyear)
                        ->select('product_name','product_qty',DB::raw('SUM(order_items.qty) AS orderQty'))
                        ->get();
                        //dd($productstock);
    }else if($request->has('date')){
        $productstock = Product::join('order_items','order_items.product_id','=','products.id')->join('orders','orders.id','=','order_items.order_id')
                        ->where('orders.status','=','Delivered')
                        ->whereDate('orders.created_at','=',$date)
                        ->select('product_name','product_qty',DB::raw('SUM(order_items.qty) AS orderQty'))
                        ->get();
                        //dd($productstock);
    }
    // All report view according to search
    return view('backend.report.product_stock_report_view' , compact('productstock'));

}


}// end main method
