@extends('layouts.admin.page')

@if (!config('adminlte.enabled_laravel_mix'))
    @php($javaScriptSectionName = 'js')
@else
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section('content')
    <p><a href="{{ route('admin.shop.characteristics.create') }}" class="btn btn-success">{{ trans('adminlte.characteristic.add') }}</a></p>

    <div class="card mb-4">
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::text('name', request('name'), ['class'=>'form-control', 'placeholder' => trans('adminlte.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::select('category_id', $categories, request('category_id'), ['class'=>'form-control', 'id' => 'category_id', 'placeholder' => trans('adminlte.category.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            {!! Form::select('group_id', $groups, request('group_id'), ['class'=>'form-control', 'id' => 'group_id', 'placeholder' => trans('adminlte.characteristic.group_name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('adminlte.search') }}</button>
                            <a href="?" class="btn btn-outline-secondary">{{ trans('adminlte.clear') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{{ trans('adminlte.name') }}</th>
            <th>{{ trans('adminlte.type') }}</th>
            <th>{{ trans('adminlte.characteristic.group_name') }}</th>
            <th>{{ trans('adminlte.category.name') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($characteristics as $characteristic)
            <tr>
                <td><a href="{{ route('admin.shop.characteristics.show', $characteristic) }}">{{ $characteristic->name }}</a></td>
                <td>
                    {{ $characteristic->variants ? 'Select' : $characteristic->typeName() }}
                </td>
                <td><a href="{{ route('admin.shop.characteristic-groups.show', $characteristic->group) }}">{{ $characteristic->group->name }}</a></td>
                <td>
                    @foreach($characteristic->categories as $category)
                        <a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a><br>
                    @endforeach
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $characteristics->links() }}
@endsection

@section($javaScriptSectionName)
    <script>
        $('#category_id').select2();
        $('#group_id').select2();
    </script>
@endsection
