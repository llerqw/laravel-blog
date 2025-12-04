@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Комментарии</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Комментарии</li>
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
                <div class="row mt-2">
                    <div class="col-10">
                        <h6 class="mb-2">Редактирование комментария</h6>
                        <form action="{{route('personal.comment.update', $comment->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Комментарий</label>
                                    <textarea class="form-control" name="message" cols="30" rows="10">{{$comment->message}}</textarea>

                                    @error('message')
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
