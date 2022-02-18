<?php 
 namespace App\Controller; 
 use App\Controller\BaseController;
use App\Models\Supermarket;
use App\Models\User;
use \System\Http\Request\Request; 

 class UserController extends BaseController 
 { 

		public function __construct()
		{
			if(!$this->session()->contains('user'))
			{
				return redirect();
			}
			
		}
 		/**
		* Display a listing of the resource.
		* @return \System\Http\Response\Response
		*/
		public function index()
		{
			$context = [
				'title' => 'DASHBOARD',
				'users' => User::where('account', 'customer')->get()
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
			$account = $request->post('account_type');
			$user->email = $request->body->email;
			$user->fname = $request->body->fname;
			$user->lname = $request->body->lname;
			$user->phone = $request->body->phone;
			$password = $request->body->phone;
			$user->password = password()->hash($password);
			$user->account = $account;

			if($account == 'admin')
			{
				$supermarket_id = Supermarket::where('db_name', session('user')->supermarket)->value('id');
				$user->has_supermarket = $supermarket_id;
			}

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
			$context = [
				'title' => "DASHBOARD | EDIT USER ",
				'collection' => User::find($id)->get()
			];

			return render('admin/super/edit_user', $context);
 		}

		/**
		* Update the specified resource in storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function update(Request $request)
		{
			// 
			$id = $request->post('id');
			$updateData = $request->except([crsf(), 'id', 'password', 'password2', 'roles']);
			$roles = implode(',', $_POST['roles']);
			$updateData['roles'] = $roles;

			//password
			$password = $request->post('password');
			$password2 = $request->post('password2');

			if(!empty($password))
			{
				if($password2 !== $password)
				{
					return response()->send(202, alert()->danger("The new passwords do not match!"));
				}
				session_unset();
				session_destroy();
				
				$updateData['password'] = password()->hash($password);
			}


			if(!User::find($id)->update($updateData))
			{
				return response()->send(202, alert()->danger("User details not updated. Please try again later!"));
			}
			
			return response()->send(200, alert()->success("User details updated successfully."));
 		}

		/**
		* Remove the specified resource from storage.
		* @param \System\Http\Request\Request $request
		* @return \System\Http\Response\Response
		*/
		public function destroy(Request $request)
		{
			$id = $request->post('id');

			if(!User::find($id)->delete())
			{
				return response()->json(202, "User not deleted!");
			}

			return response()->json(200, "User deleted successfully");

 		}

		 public function coAdminUsers()
		 {
			 $users = User::where('account', 'super')->get();
			
			 if(session('user')->account_type == 'admin')
			 {
				 $supermarket_id = Supermarket::where('db_name', session('user')->supermarket)->value('id');
				 $users = User::where('account', 'admin')->where('has_supermarket', $supermarket_id)->get();
			 }
			$context = [
				'title' => 'DASHBOARD | CO ADMIN USERS',
				'users' => $users
			];
	
			return render('admin.super.co_admin', $context);
		 }


		 public function supermarketAdmins()
		 {
			$context = [
				'title' => 'DASHBOARD | SUPERMARKET ADMIN',
				'users' => User::where('account', 'admin')->get()
			];
	
			return render('admin.super.sup_admin', $context);
		 }

} 