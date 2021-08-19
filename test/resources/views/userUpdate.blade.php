@extends('welcome')
@section('content')


    <div class="p-5 text-capitalize">
        @if ($usuario)
            <h2 class="text-center p-2">Update User</h2>

            @if ($message)
                <h3 class=" p-3 text-center text-danger"> {{ $message }} </h3>
            @endif

            <div class="card card-body">
                <form action="{{ route('user.update', $usuario->id) }}" method="Post" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" style="font-size: 1.5rem">Name</label>
                        <input type="text" id="name" name="name" class="form-control form-control-lg" value="{{ $usuario->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size: 1.5rem">UserName</label>
                        <input type="text" id="username" name="username" class="form-control form-control-lg"
                            value="{{ $usuario->username }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="font-size: 1.5rem">Email address</label>
                        <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{ $usuario->email }}">
                    </div>

                    <button type="submit" class="btn-lg btn btn-primary">Submit</button>
                </form>
            </div>
        @endif
    </div>
@endsection
