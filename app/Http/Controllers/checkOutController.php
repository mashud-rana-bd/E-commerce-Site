<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Mail;
use Session;
use App\Shipping;
use App\Order;
use App\Pryment;
use App\OrderDetail;
use Cart;

class checkOutController extends Controller
{
    public function index(){
    	return view('front-end.checkout.checkout');
    }

    public function customerSingeUp(Request $request){

    		$this->validate($request,[
    			'email_address' => 'email|unique:Customers,email_address'
    		]);


	     $this->validate($request, [
	                'first_name'      => 'required',
	                'last_name'       => 'required',
	                'email_address'   => 'required|not_regex:"/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/"',
	                'password'        => 'required',
	                'phone_number'    => 'required',
	                'address'     	  => 'required'
	            ]);

	     	$custmers = new Customer();

	     	$custmers->first_name 		= $request->first_name;
	     	$custmers->last_name 		= $request->last_name;
	     	$custmers->email_address 	= $request->email_address;
	     	$custmers->password 		= bcrypt( $request->password);
	     	$custmers->phone_number 	= $request->phone_number;
	     	$custmers->address 			= $request->address;
	     	$custmers->save();

	     	$customerId = $custmers->id;
	     	Session::put('customerId', $customerId);
	     	Session::put('customerName', $custmers->first_name.' '.$custmers->last_name);

	     	$data = $custmers->toArray();

	     	// Mail::send('front-end.mails.confirmation-mail', $data , function($message) use ($data){
	     	// 		$message->to($data['email_address']);
	     	// 		$message->subject('Confirmation mail');
	     	// });


	     	return redirect('/checkout/shipping');

	}


		public function customerLoginCheck(Request $request){

			$customer = Customer::where('email_address', $request->email_address)->first();
			
			if (password_verify($request->password,$customer->password)) {
				Session::put('customerId', $customer->id);
	     		Session::put('customerName', $customer->first_name.' '.$customer->last_name);

	     		return redirect('/checkout/shipping');
			}else{
				return redirect('/get/product')->with('message', 'Please enter valid password ');
			}
		}

		public function customerLogout(Request $request){

			Session::forget('customerId');
			Session::forget('customerName');
			return redirect('/');
		}

		public function newcustomerLogout(){
			return view('front-end.customer.customer-login');
		}



	public function shippingform(){
		$customer = Customer::find(Session::get('customerId'));

		return view('back-end.checkout.shipping',['customer' => $customer]);
	}

	public function addshipping(Request $request){


		$shipping = new Shipping();
		$shipping->first_name 		= $request->first_name;
		$shipping->email_address 	= $request->email_address;
		$shipping->phone_number 	= $request->phone_number;
		$shipping->address 			= $request->address;
		$shipping->save();
		//return 'success';
		Session::put('customerId', $shipping->id);
		return redirect('/checkout/payment');
	}

	public function prementform(){
		return view('front-end.checkout.payment');
	}

	public function prementStatus(Request $request){

		 $this->validate($request, [
    		'payment_type'      => 'required'
		]);


		$paymentType = $request->payment_type;

		//return $paymentType;

		if ($paymentType=='cash') {
			
			$order = new Order();
			$order->customer_id   	= Session::get('customerId');
			$order->shopping_id   	= Session::get('customerId');
			$order->order_total    	= Session::get('orderTotal');
			$order->save();

			$payment = new Pryment();
			$payment->order_id 		= $order->id;
			$payment->payment_type 	= $paymentType;
			$payment->save();

			$cartproducts =Cart::content();
			foreach ($cartproducts as  $cartproduct) {
				$orderDetail = new OrderDetail();
				$orderDetail->order_id 			= $order->id;
				$orderDetail->product_id 		= $cartproduct->id;
				$orderDetail->product_name 		= $cartproduct->name;
				$orderDetail->product_price 	= $cartproduct->price;
				$orderDetail->product_quentity 	= $cartproduct->qty;
				$orderDetail->save();

			}

			Cart::destroy();
			return redirect('/complet/order');


		} else if ($paymentType=='Paypal') {
			# code...
		}else if ($paymentType=='Bkash') {
			# code...
		}
	} 

	public function completorder(){

		return 'success';
		//return view('');
	}

}