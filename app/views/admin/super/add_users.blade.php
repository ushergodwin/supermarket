@extends('partials.admin.base')
@section('content')
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-main">
                        <h4 class="text-capitalize breadcrumb-title">Add Users / Co - Admin</h4>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <div class="form-group mb-0">
                                </div>
                            </div>
                            <div class="action-btn">
                                <a href="{{ url('users/create') }}" class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> Add New User (co - admin)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-horizontal card-default card-md mb-4">
                        <div class="card-body py-md-30">
                            <form action="{{ url('users/store') }}" method="post" id="addUserForm">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <i class="fas fa-envelope text-success"></i> 
                                    <input type="email" name="email" class="form-control" placeholder="enter your email or phone number" autocomplete="off" required/>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="fname">First Name</label>
                                            <input type="text" name="fname" class="form-control" placeholder="enter your first name " autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="lname">Last Name</label>
                                            <input type="text" name="lname" class="form-control" placeholder="enter your last name " autocomplete="off" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="number" name="phone" class="form-control" placeholder="enter your phone number" autocomplete="off" required/>
                                </div>
                                <div class="form-group">
                                    <label for="password">Roles <input type="checkbox" class="custom-checkbox" onclick="$('.checkbox').not(this).prop('checked', this.checked)"/> All</label>
                                    <h6><input type="checkbox" class="custom-checkbox checkbox" onclick="$('.user-role').not(this).prop('checked', this.checked)"/> Users</h5>
                                    <div class="d-flex">
                                        <div class="ml-3"><input type="checkbox" name="roles[]" class="custom-checkbox user-role checkbox" value="view-users"/> View Users</div>
                                        <div class="ml-3"><input type="checkbox" name="roles[]" class="custom-checkbox user-role checkbox" value="add-users"/> Add Users</div>
                                        <div class="ml-3"><input type="checkbox" name="roles[]" class="custom-checkbox user-role checkbox" value="edit-users"/> Edit Users</div>
                                        <div class="ml-3"><input type="checkbox" name="roles[]" class="custom-checkbox user-role checkbox" value="delete-users"/> Delete Users</div>
                                    </div>
                                    <h6 class="mt-3"><input type="checkbox" class="custom-checkbox checkbox" onclick="$('.sup-role').not(this).prop('checked', this.checked)"/> Supermarkets</h6>
                                    <div class="d-flex">
                                        <div class="ml-3"><input type="checkbox" name="roles[]" class="custom-checkbox sup-role checkbox" value="add-supermarket"/> Add Supermarkets</div>
                                        <div class="ml-3"><input type="checkbox" name="roles[]" class="custom-checkbox sup-role checkbox" value="view-supermaket"/> View Supermarkets</div>
                                        <div class="ml-3"><input type="checkbox" name="roles[]" class="custom-checkbox sup-role checkbox" value="edit-supermarkets"/> Edit Supermarkets</div>
                                        <div class="ml-3"><input type="checkbox" name="roles[]" class="custom-checkbox sup-role checkbox" value="delete-supermarkets"/> Delete Supermarkets</div>
                                    </div>
                                    <h6 class="mt-3">Dasboard Charts</h6>
                                    <div class="ml-3"><input type="checkbox" name="roles[]" class="custom-checkbox checkbox" value="view-charts"/> View Charts</div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" id="add-user-btn" class="btn btn-success">CREATE CO-ADMIN ACCOUNT</button><br/>
                                </div>
                                <div class="response" id="response"></div>
                            </form>
                        </div>
                    </div>
                    <!-- ends: .card -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        sendRequest({form: 'addUserForm', btn: 'add-user-btn'});
    </script>
@endsection
