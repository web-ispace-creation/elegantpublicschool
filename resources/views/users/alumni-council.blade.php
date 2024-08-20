@extends('users.layout')
@section('content')

<div class="alumni-header bg-el-blue text-light text-center w-100">
    <h1 class="">Alumni Council</h1>
</div>
{{-- {{dd(request()->batch)}} --}}
<div class="alumni-students-section mb-5">
    <div class="alumni-students d-flex flex-wrap scrolling-pagination">
        @foreach ($data as $item)
        <div class="col-6 col-sm-4 col-md-3 px-2 pb-5">
            <div class="card">
                <div class="text-center">
                    <img src="/storage/images/profile/{{$item->users->alumniDetails->image}}" class="card-img-top">
                </div>
                <div class="card-body text-secondary">
                    <h6 class="card-title">{{ $item->name }}</h6>
                    {{-- <span class="">{{ $item->alumniCouncil->designation }}</span> --}}
                    <div class="card-text d-flex flex-wrap justify-content-between align-items-center small">
                        <span>Designation : {{ $item->designation }}</span>
                        <span>Batch : {{ $item->users->alumniDetails->batch }}</span>
                        <a href="{{route('users.profile',$item->alumni_id)}}" class="text-secondary"><i class="bi bi-arrow-right-circle fs-6"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    
@endsection