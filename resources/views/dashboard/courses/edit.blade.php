@extends('dashboard.layouts.main',[
                                'page_header'       => ' ',
                                'page_description'  => '  '
                                ])

@section('content')
    <div class="ibox">
        <div class="ibox-title">
            <h5>add course </h5>
        </div>
        <div class="ibox-content">
            @include('dashboard.layouts.partials.validation-errors')
            @include('flash::message')
            {{-- laravel collective --}}
            {!! Form::model($item,[
                'method' => 'post',
                'url' => url(route('update.course' ,$item->id )),
                //'files' => true
            ]) !!}
            @include('dashboard.courses.form')
            {!! Form::submit('edit',[
                'class' => 'btn btn-primary'
            ]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection