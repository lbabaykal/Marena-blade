@extends('layouts.admin')
@section('content')
<div class="modal_window_content">
    <div class="window_heading">
        <div class="window_title">Редактирование типа</div>
        <div class="window_close">❌</div>
    </div>
    <div class="window_content">
        <form id="book_add" action="{{route('admin.types.update', $type->id)}}" method="POST">
            @csrf
            @method('Patch')
            <label for="title">Название: @error('title') {{$message}} @enderror
                <input id="title" type="text" name="title" value="{{old('title') ?? $type->title}}"/>
            </label>

            <div class="window_buttons">
                <button class="window_button button_save" type="submit">Редактировать</button>
                <a href="{{route('admin.types.index')}}">
                    <button class="window_button button_close" type="button">Отмена</button>
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
