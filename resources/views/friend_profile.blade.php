@extends('layout.app',['user',$user])
@section('title', $friend->first_name." ".$friend->last_name)
@section('content')
<main role="main" class="container">
        <div class="row">
            <div class="col-lg-8">
              <!-- Modal -->
                          <div class="modal fade" id="profile_picture_show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" style="max-width: 650px" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <button style="position: absolute;right: 0;top: 0px;" type="button" class="btn btn-danger btn-lg rounded-0" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                      <img id="profile_lightbox" class="w-100" @if($friend->profile_picture=="default.jpg") src="{{asset('assets/images/profile_pictures')}}/{{$friend->profile_picture}}" @else src="{{asset('assets/images/profile_pictures/original')}}/{{$friend->profile_picture}}" @endif>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card-deck">
                                    <div class="card">
                                    <div class="card-header">
                                            <button data-toggle="modal" data-target="#profile_picture_show" type="button" class="btn btn-light float-left"><img id="profile_picture" @if($friend->profile_picture=="default.jpg") src="{{asset('assets/images/profile_pictures')}}/{{$friend->profile_picture}}" @else src="{{asset('assets/images/profile_pictures/150x150')}}/{{$friend->profile_picture}}" @endif width="62" class="rounded-circle border border-default">&nbsp; <span class="lead">{{$friend->first_name." ".$friend->last_name}} | Profile <i class="fa fa-angle-down"></i> </span></button>
                                            @if($checkNotification>0 && $checkFriend==0) <a href="#" class="btn btn-warning mt-3 ml-1 float-right"><i class="fa fa-times"></i> Delete Request</a><a href="#" class="btn btn-info mt-3 float-right"> <i class="fa fa-check"></i> Confirm</a> @elseif($checkFriend==0)<button type="button" class="btn btn-success float-right mt-3"><i class="fa fa-user"></i> <i class="fa fa-plus" style="font-size: 13px;"></i> Add Friend</button> @else <button type="button" class="btn btn-danger float-right mt-3"><i class="fa fa-times"></i> Unfriend</button> @endif
                                            <div class="float-right spinner_profile" style="padding-top: 18px;display:none">
                                              <div class="spinner-border text-warning float-right" role="status">
                                                <span class="sr-only">Loading...</span>
                                              </div>
                                            </div>
                                            <div class="modal fade" id="edit_profile_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Crop your profile picture</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="img-container">
                                                          <img style="max-width: 100% !important" src="" id="profile_picture_crop">
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="button" class="btn btn-primary" id="crop"><i class="fa fa-check"></i> Crop</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                            <div class="clearfix"></div>
                                        </div>
                     </div>
                 </div>
                 <p class="lead"><strong>&nbsp; {{$friend->first_name}}'s Posts</strong></p>
                 @if($checkFriend!=0)
                    <div class="card-deck">
                        <div class="card post-radius border-1">
                          <!--<img class="card-img-top" src="https://scontent.fbtz1-10.fna.fbcdn.net/v/t1.0-9/46664441_481682579006343_1682351471665872896_n.jpg?_nc_cat=110&_nc_ht=scontent.fbtz1-10.fna&oh=30f6c5d9df1bd240f53c7cf282e86a21&oe=5C6BDBC2" alt="Card image cap">-->
                          <div class="card-body">                                                            
                            <div class="row"><div class="col-lg-1"><img src="https://scontent.fbtz1-1.fna.fbcdn.net/v/t1.0-1/p112x112/42518654_738047489867186_3826981878401859584_n.jpg?_nc_cat=107&_nc_ht=scontent.fbtz1-1.fna&oh=7e051eee30a3baf061c41e193b6da0ad&oe=5CC56BA4" width="48" class="rounded-circle border border-secondary" alt=""></div><div class="col-lg-11"><h5 style="margin-top: 27px;" class="card-title"> Akkuzu Gülsüm</h5></div></div>
                            <p class="card-text">“In the end, we will remember not the words of our enemies, but the silence of our friends.”
                                    -Martin Luther King Jr.
                            </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                               <button type="button" class="btn btn-outline-primary"><i class="fas fa-thumbs-up"></i> Like <span class="badge badge-primary">9</span></button>
                               <button type="button" class="btn btn-outline-info"><i class="fas fa-comments"></i> Comments <span class="badge badge-info">0</span></button>
                           </div>  
                           <textarea class="form-control w-comment" id="exampleFormControlTextarea1" cols="100%" rows="2" placeholder="Write a comment"></textarea>
                        </div>
                </div>
                @else
                <div class="alert alert-warning">To see that shares, send a friend request.</div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="alert alert-warning alert-dismissable profile-update-show" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Your profile picture has been updated.
                </div>
                    <div class="card-deck">
                            <div class="card">
                              <!--<img class="card-img-top" src="https://scontent.fbtz1-10.fna.fbcdn.net/v/t1.0-9/46664441_481682579006343_1682351471665872896_n.jpg?_nc_cat=110&_nc_ht=scontent.fbtz1-10.fna&oh=30f6c5d9df1bd240f53c7cf282e86a21&oe=5C6BDBC2" alt="Card image cap">-->
                              <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-info-circle"></i> About</h5>
                                <ul style="margin-top:25px" class="list-group">
                                <li class="list-group-item"> 
                                <i class="fa fa-star"></i> Reputation: <span class="badge badge-secondary">{{$friend->reputation}}</span>
                                </li>
                                <li class="list-group-item"><i class="fa fa-user-friends"></i> Friends: <span class="badge badge-secondary">{{$friendCount}}</span></li>
                                <li class="list-group-item"><i class="fa fa-comment"></i> {{$friend->intro}} <a href="#"  onclick="return false;" class="badge badge-success">Add İntro</a></li>
                                </ul>
                               </div>  
                            </div>
                    </div>
            </div>
        </div>
        
     </main>
@endsection