@extends('welcome')
@section('content')
    <div class="p-5 text-capitalize">
        @if ($usuario)
            <h2 class="text-center p-2">Update User Password</h2>
            @if ($message)
                <h3 class=" p-3 text-center text-danger"> {{ $message }} </h3>
            @endif
            <div class="card card-body">
                <form action="{{ route('user.updateUserPassword', $usuario->id) }}" method="Post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label " style="font-size: 1.5rem">Old Password</label>
                        <input type="password" id="oldPassword" name="oldPassword" class="form-control form-control-lg ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size: 1.5rem">New Password</label>
                        <input type="password" id="newPassword" name="newPassword" class="form-control form-control-lg">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size: 1.5rem">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword"
                            class="form-control form-control-lg">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </form>
            </div>
        @endif

    </div>
@endsection
