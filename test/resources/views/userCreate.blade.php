@extends('welcome')

@section('content')

    <div class="p-5 text-capitalize">

        <h2 class="text-center p-2">Create User</h2>
        @if ($message)
            <h3 class=" p-3 text-center text-danger"> {{ $message }} </h3>
        @endif
        <div class="card card-body">
            <form action="{{ route('user.store') }}" method="Post" autocomplete="off">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label class="form-label" style="font-size: 1.5rem">Name</label>
                    <input type="text" id="name" name="name" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 1.5rem">UserName</label>
                    <input type="text" id="username" name="username" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 1.5rem">Email address</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="font-size: 1.5rem">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg">
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </form>
        </div>
    </div>

@endsection

<script type="text/javascript">

</script>
