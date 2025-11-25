@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-10">
                        <h6 class="mb-2">Редактирование пользователя "{{$user->name}}"</h6>
                        <form action="{{route('admin.user.update', $user->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Имя</label>
                                    <input type="text" class="form-control" name="name"
                                           placeholder="Название категории" value="{{$user->name}}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email"
                                           placeholder="Email пользователя" value="{{$user->email}}">
                                    @error('email')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Редактировать роль</label>
                                    <select name="role" class="form-control">
                                        @foreach($roles as $id => $role)
                                            <option value="{{$id}}"
                                                {{$id == $user->role ? ' selected' : ''}}>
                                                {{$role}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <p class="text-danger">({{$message}})</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                </div>

                                <button type="submit" class="btn btn-primary">Редактировать</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.row -->


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
