@extends('dashboard.layouts.main',[
                                'page_header'       => ' ',
                                'page_description'  => ''
                                ])

@section('content')
    <div class="ibox">
        <div class="ibox-title">
            <h5>courses </h5>
        </div>

        <div class="ibox-content">
            <div class="col-sm-3">
                <a href="{{url(route('create.course'))}}" class="btn btn-primary pull-right"> add course </a>
            </div>
            <div class="clearfix"></div>
            <hr>

            <br>
            @include('flash::message')
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>description</th>
                        <th>max</th>
                        {{--<th class="text-center">تعديل</th>--}}
                        <th class="text-center">edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($courses as $item)
                        <tr id="removable{{$item->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}
                            </td>
                            <td>{{$item->description}}
                            </td>
                            <td>{{$item->max}}
                            </td>


                            {{--<td class="text-center">--}}
                            {{--<a href="{{url(route('categories.edit',$category->id))}}"--}}
                            {{--class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>--}}
                            {{--</td>--}}
                            <td class="text-center">
                                <a href="{{route('edit.course' , $item->id )}}"> <i
                                            class="fa fa-edit"></i></a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-danger">
                                    <h3 class="text-center">لا يوجد بيانات</h3>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{$courses->links()}}
            </div>
        </div>
    </div>
@endsection