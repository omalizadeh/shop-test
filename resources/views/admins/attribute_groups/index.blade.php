@extends('admins.layouts.app')
@section('title')
گروه ترکیبات
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h6 class="m-0">گروه ترکیبات
                <div class="float-right">
                    <a href="{{route('admins.attribute-groups.create')}}" class="btn btn-success">افزودن
                        گروه</a>
                </div>
            </h6>
        </div>
        <table class="table mb-0">
            <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-0">#</th>
                    <th scope="col" class="border-0">نام گروه</th>
                    <th scope="col" class="border-0">موقعیت</th>
                    <th scope="col" class="border-0">دسترسی</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attributeGroups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->getName() }}</td>
                    <td>{{ $group->getPosition() }}</td>
                    <td>
                        <div class="d-inline-flex">
                            <div>
                                <a href="{{route('admins.attribute-groups.show',$group->id)}}"
                                    class="btn btn-outline-success">مشاهده</a>
                            </div>
                            <div>
                                <a href="{{route('admins.attribute-groups.edit',$group->id)}}"
                                    class="btn btn-outline-warning mr-2">ویرایش</a>
                            </div>
                            <div>
                                <form action="{{route('admins.attribute-groups.destroy',$group->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-outline-danger mr-1" type="submit"
                                        onclick="return confirm('آیا از حذف مطمئن هستید؟');">حذف</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection