@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="/img/uploads/avatars/{{ $user->avatar }}" alt=""style="width: 150px; height: 150px; border-radius: 50px;" />
            <h2>{{ $user->name }} Profile</h2>


            <form class="" action="/admin/profile" method="post" enctype="multipart/form-data">
                <label for="">Update profile image</label>
                <input type="file" name="avatar" >
                {{ csrf_field() }}

                <button type="submit" class="btn btn-success pull-right" name="button">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
