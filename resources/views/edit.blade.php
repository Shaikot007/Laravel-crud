@include('includes.header');

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Please fill the all information</h3>
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
                            <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}" />
                                <div class="form-group row">
                                    <label for="name" class="col-form-label col-md-3">
                                        User name
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" placeholder="Enter your name" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-form-label col-md-3">
                                        User email
                                    </label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control" placeholder="Enter your email" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-form-label col-md-3">
                                        User password
                                    </label>
                                    <div class="col-md-9">
                                        <input type="password" name="password" id="password" value="{{$user->password}}" class="form-control" placeholder="Enter your password" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-form-label col-md-3">
                                        User mobile
                                    </label>
                                    <div class="col-md-9">
                                        <input type="number" name="mobile" id="mobile" value="{{$user->mobile}}" class="form-control" placeholder="Enter your mobile number" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-form-label col-md-3">
                                        User image
                                    </label>
                                    <div class="col-md-9">
                                        <img src="{{asset($user->image)}}" alt="Image" height="100" width="100" />
                                        <input type="file" name="image" id="image" class="form-control-file" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-form-label col-md-3">
                                    </label>
                                    <div class="col-md-9">
                                        <input type="submit" name="button" value="Update info" class="btn btn-outline-success btn-block" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('includes.footer');
