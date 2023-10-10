@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar imagen</div>
                <div class="card-body0">
                    <form action="{{ route('image.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image_id" value="{{$image->id}}">

                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label textmd-right">Imagen</label>
                            <div class="col-md-7">
                                <img src="{{ route('image.file',['filename'=>$image->image_path])}}" style="height: 60px">
                                <input type="file" name="image_path" id="image_path" class="form-control"  >
                            </div>
                             <!-- En laravel hay una variable de error por si falla el formulario  -->
                            @error('image_path')
                                <span class="alert alert-succes" style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                           <!--  @if($errors->has('image_path'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image_path')}}</strong>
                            </span>
                            @endif -->
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label textmd-right">Descripción:</label>
                            <div class="col-md-7">
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10">
                                    {{$image->description}}
                                </textarea>
                            </div>

                           <!--  En laravel hay una variable de error por si falla el formulario -->
                            @error('description')
                                <span class="alert alert-succes" style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!-- @if($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description')}}</strong>
                            </span>
                            @endif -->
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" value="Actualizar Imagen" class="btn btn-primary">
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection