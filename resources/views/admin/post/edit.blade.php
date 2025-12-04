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
                            <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active">Редактирование поста</li>
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
                        <h6 class="mb-2">Редактирование поста "{{$post->title}}"</h6>
                        <form action="{{route('admin.post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Название</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Название поста" value="{{ $post->title }}">
                                    @error('title')
                                    <p class="text-danger">({{$message}})</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="summernote" name="content">{{$post->content}}</textarea>
                                    @error('content')
                                    <p class="text-danger">({{$message}})</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Обновить превью</label>
                                    <div class="w-25 mb-2">
                                        <img src="{{asset('storage/'. $post->preview_image)}}" alt="{{$post->title}}" class="w-50">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="preview_image">
                                            <label class="custom-file-label">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    @error('preview_image')
                                    <p class="text-danger">({{$message}})</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Обновить главное изображение</label>
                                    <div class="w-25 mb-2">
                                        <img src="{{asset('storage/'. $post->main_image)}}" alt="{{$post->title}}" class="w-50">
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image">
                                            <label class="custom-file-label">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузить</span>
                                        </div>
                                    </div>
                                    @error('main_image')
                                    <p class="text-danger">({{$message}})</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Обновить категорию</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{$category->id == $post->category_id ? ' selected' : ''}}>
                                                {{$category->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">({{$message}})</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Теги</label>
                                    <select class="select2" multiple="multiple" data-placeholder="Обновите теги"
                                            style="width: 100%;" name="tag_ids[]">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}"
                                                {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}}
                                            >{{$tag->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('tag_ids')
                                    <p class="text-danger">({{$message}})</p>
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
