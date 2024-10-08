@extends('users.layout')
@section('content')

<div class="alumni-header bg-el-blue text-light text-center w-100">
    <h1 class="">Members Search and connect with friends,<br> batchmates and other alumni</h1>
</div>
{{-- {{dd(request()->batch)}} --}}
<div class="alumni-students-section mb-5">
    <div class="alumni-filter text-end {{auth()->user()->role=='member'? 'd-none':''}}">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle bg-el-blue text-light mb-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{request()->batch == '' ? 'Year' : request()->batch}}
            </button>
            <ul class="dropdown-menu overflow-auto">
                @for ($i = date("Y"); $i > 2000; $i--)
                <li>
                    <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['batch' => $i]) }}">
                        {{$i}}
                    </a>
                </li>
                 @endfor
            </ul>
          </div>
    </div>
    <div class="alumni-students d-flex flex-wrap scrolling-pagination">
        @foreach ($data as $item)
        <div class="col-6 col-sm-4 col-md-3 px-2 pb-3">
            <div class="card">
                <div class="text-center bg-transparent">
                    <img src="/storage/images/profile/{{$item->alumniDetails->image}}" class="object-fit-contain w-100">
                </div>
                <div class="card-body text-secondary">
                    <h6 class="card-title">{{ $item->name }}</h6>
                    {{-- <span class="">{{ $item->alumniCouncil->designation }}</span> --}}
                    <div class="card-text d-flex flex-wrap justify-content-between align-items-center small">
                        <span>Batch : {{ $item->alumniDetails->batch }}</span>
                        <span>From : {{ $item->alumniDetails->from }}</span> 
                        <span>To : {{ $item->alumniDetails->to }}</span> 
                        <a href="{{route('users.profile',$item->id)}}" class="text-secondary"><i class="bi bi-arrow-right-circle fs-6"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $data->appends(request()->query())->links() }}
    </div>
    
    <div class="text-end">
        <div class="">
            <a href="{{route('user.alumnicouncil.show')}}"  class="border-0 bg-el-blue text-white small rounded py-2 px-4 text-decoration-none">Alumni Council</a>
        </div>
    </div>
</div>
    
@endsection