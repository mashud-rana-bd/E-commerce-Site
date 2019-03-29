<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Order;
use App\Shipping;
use App\Customer;
use App\Pryment;
use App\OrderDetail;

class OrderController extends Controller
{
    public function index(){

    	$orders = DB::table('orders')
    					->join('customers', 'orders.customer_id', '=' , 'customers.id' )
    					->join('pryments', 'orders.id', '=', 'pryments.order_id')
    					->select('orders.*', 'customers.first_name', 'customers.last_name', 'pryments.payment_type','pryments.payment_status')
    					->get();
    	
    	return view('back-end.order.manage-order', ['orders' => $orders]);
    }

    public function viewOrderDetail($id){
    	$order=Order::find($id);
    	$customer = Customer::find($order->customer_id);
    	$shipping =Shipping::find($order->shopping_id);
    	$payment  = Pryment::where('order_id', $order->id)->first();
    	$orderDatelses = OrderDetail::where('order_id', $order->id)->get();
    	
    	return view('back-end.order.orderdetail',[
    		'order'=>$order,
    		'customer'=>$customer,
    		'shipping'=>$shipping,
    		'payment' =>$payment,
    		'orderDatelses' =>$orderDatelses
    	]);
    }


    public function viewOrederInvoice($id){

    	$order=Order::find($id);
    	$customer = Customer::find($order->customer_id);
    	$shipping =Shipping::find($order->shopping_id);
    	//$payment  = Pryment::where('order_id', $order->id)->first();
    	$orderDatelses = OrderDetail::where('order_id', $order->id)->get();
    	
    	return view('back-end.order.OrederInvoice',[
    		'order'=>$order,
    		'customer'=>$customer,
    		'shipping'=>$shipping,
    		//'payment' =>$payment,
    		'orderDatelses' =>$orderDatelses
    	]);
 
    }

    public function downloadpdf($id){

    	$pdf = PDF::loadView('back-end.order.pdfdownload');
		return $pdf->stream('invoice.pdf');
    }
}
