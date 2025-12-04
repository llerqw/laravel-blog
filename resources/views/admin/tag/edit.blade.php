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
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.tag.index')}}">Теги</a></li>
                            <li class="breadcrumb-item active">Редактирование тега</li>
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
                        <h6 class="mb-2">Редактирование тега "{{$tag->title}}"</h6>
                        <form action="{{route('admin.tag.update', $tag->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Название</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Название тега" value="{{$tag->title}}">
                                    @error('title')
                                    <p class="text-danger">Это поле необходимо заполнить!({{$message}})</p>
                                    @enderror
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
