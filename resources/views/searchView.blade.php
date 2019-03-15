@extends('layout.app',['user',$user])
@section('title',"Socail Network Search")
@section('content')
<main role="main" class="container">
        <div class="row">
            <div class="col-lg-8">
              <div class="card-deck">
                <div class="card">
                  <div class="card-header">People</div>
                    <div class="card-body">
                      @if(count($data)>0)
                      @foreach ($data as $SearchUser)
                      <div class="float-left m-1 mb-3">
                          <a href="{{url('profile')}}/{{$SearchUser->id}}/{{Str::slug($SearchUser->first_name.$SearchUser->last_name)}}" class="text-decoration-none"><img @if($SearchUser->profile_picture=="default.jpg") src="{{asset('assets/images/profile_pictures')}}/{{$SearchUser->profile_picture}}" @else src="{{asset('assets/images/profile_pictures/150x150')}}/{{$SearchUser->profile_picture}}" @endif  width="62" class="rounded-circle border border-default" alt="">&nbsp; <span class="lead text-secondary">{{$SearchUser->first_name." ".$SearchUser->last_name}}</span></a>
                      </div>
                      <div class="float-right">
                        @php
                            $checkFriend = $friend::where('friend_id',$SearchUser->id)->count();
                            $checkNotification = $notification::where('thing_id',$SearchUser->id)->where('type','add_friend')->count();
                        @endphp
                         @if($checkNotification>0 && $checkFriend==0) <a href="#" class="btn btn-info mt-3"><i class="fa fa-check"></i> Confirm</a> <a href="#" class="btn btn-warning mt-3"><i class="fa fa-times"></i> Delete Request</a> @elseif($SearchUser->id!=$user->id && $checkFriend==0)<button type="button" class="btn btn-success float-right mt-3"><i class="fa fa-user"></i> <i class="fa fa-plus" style="font-size: 13px;"></i> Add Friend</button> @elseif($SearchUser->id!=$user->id) <button type="button" class="btn btn-danger float-right mt-3"><i class="fa fa-times"></i> Unfriend</button> @endif
                      </div>
                      <div class="clearfix"></div>
                      @endforeach
                      @else
                      <div class="alert alert-warning w-100"><i class="fa fa-info"></i> We couldn't find anything :(</div>
                      @endif               
                    </div>
                </div>
              </div>
              {{ $data->appends(request()->except('page'))->links() }}
            </div>
        </div>
     </main>
@endsection