@include('includes.header');

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>All users info go here</h3>
                        </div>
                        <div class="card-body">
                            @if($message = Session::get('message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{$message}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table class="table table-bordered table-hover text-center">
                                <thread>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User name</th>
                                        <th scope="col">User email</th>
                                        <th scope="col">User mobile</th>
                                        <th scope="col">User image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thread>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->mobile}}</td>
                                            <td><img src="{{asset($user->image)}}" alt="image" height="100" width="100" /></td>
                                            <td>
                                                <a href="{{route('edit', ['id' => $user->id])}}" class="btn btn-warning">Edit</a>
                                                <a href="{{route('delete', ['id' => $user->id])}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('includes.footer');
