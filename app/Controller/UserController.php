<?php 
 namespace App\Controller; 
 use App\Controller\BaseController;
use App\Models\User;
use \System\Http\Request\Request; 

 class UserController extends BaseController 
 { 
 		/**
		* Display a listing of the resource.
		* @return \System\Http\Response\Response
		*/
		public function index()
		{
			$context = [
				'title' => 'DASHBOARD',
				'users' => User::all()
			];
	
			return render('admin.super.users', $context);

 		}

		/**
		* Show the form for creating a new resource.
		* @return \System\Http\Response\Response
		*/
		public function create()
		{
			$context = [
				'title' => 'DASHBOARD | ADD USER'
			];
	
			return render('admin.super.add_users', $context);
 		}

		/**
		* Store a newly created resource in storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function store(Request $request)
		{
			$user = new User();
			$user->email = $request->body->email;
			$user->fname = $request->body->fname;
			$user->lname = $request->body->lname;
			$user->phone = $request->body->phone;
			$password = trim(strtolower(substr($request->body->lname, 0, 1)) . strtolower($request->body->fname));
			$user->password = password()->hash($password);
			$user->account = 'super';
			if(!empty($request->body->roles)){

				$user->roles = implode(',', $request->body->roles);
			}
			if($user::find($request->body->email, 'email')->exists())
			{
				$message = alert()->danger('Email:' . $request->body->email . ' is aleredy in use!');
				return response()->send(202, $message);
			}
			if($user::find($request->body->phone, 'phone')->exists())
			{
				$message = alert()->danger('Phone number: ' . $request->body->phone . 'is aleredy taken!');
				return response()->send(202, $message);
			}
			if(!$user->save())
			{
				$message = alert()->danger('Account not created! please try gain later.');
				return response()->send(202, $message);
			}
	
			$message = alert()->success("Account created successfully! <br> Account Password: $password");
			return response()->send(200, $message);
 		}

		/**
		* Display the specified resource.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function show($id)
		{
			// 

 		}

		/**
		* Show the form for editing the specified resource.
		* @param int|string $id
		* @return \System\Http\Response\Response
		*/
		public function edit($id)
		{
			// 

 		}

		/**
		* Update the specified resource in storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function update(Request $request)
		{
			// 

 		}

		/**
		* Remove the specified resource from storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function destroy(Request $request)
		{
			// 

 		}

} 