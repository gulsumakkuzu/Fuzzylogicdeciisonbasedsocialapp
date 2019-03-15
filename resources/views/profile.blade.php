@extends('layout.app',['user',$user])
@section('title',$user->first_name." ".$user->last_name)
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
                                      <img id="profile_lightbox" class="w-100" @if($user->profile_picture=="default.jpg") src="{{asset('assets/images/profile_pictures')}}/{{$user->profile_picture}}" @else src="{{asset('assets/images/profile_pictures/original')}}/{{$user->profile_picture}}" @endif>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="card-deck">
                                    <div class="card">
                                    <div class="card-header">
                                            <button data-toggle="modal" data-target="#profile_picture_show" type="button" class="btn btn-light float-left"><img id="profile_picture" @if($user->profile_picture=="default.jpg") src="{{asset('assets/images/profile_pictures')}}/{{$user->profile_picture}}" @else src="{{asset('assets/images/profile_pictures/150x150')}}/{{$user->profile_picture}}" @endif width="62" class="rounded-circle border border-default">&nbsp; <span class="lead">{{$user->first_name." ".$user->last_name}} | Profile <i class="fa fa-angle-down text-info"></i></span></button>
                                            <div class="float-right spinner_profile" style="padding-top: 18px;display:none">
                                              <div class="spinner-border text-warning float-right" role="status">
                                                <span class="sr-only">Loading...</span>
                                              </div>
                                            </div>
                                            <label class="btn btn-light float-right" style="min-height: 56px;line-height: 56px;cursor:pointer"><i class="fas fa-camera"></i> Edit Photo <input type="file" accept=".png, .jpg, .jpeg" id="profile_photo_upload" hidden=""></label>
                                            <div class="modal fade" id="edit_profile_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" style="max-width: 600px" role="document">
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
                                                          <button type="button" class="btn btn-info" id="rotate_picture"><i class="fa fa-redo"></i> Rotate</button>
                                                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                          <button type="button" class="btn btn-primary" id="crop"><i class="fa fa-check"></i> Crop</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                            <div class="clearfix"></div>
                                        </div>
                                      <div class="card-body" style="padding: 0.55rem;">
                                          <div class="card border-0 mr-0 ml-0">
                                              <div class="card-header border-0" style="background-color: #fff;
                                              padding: 0.25rem;">
                                                   <button type="button" class="btn btn-light"><i class="fas fa-pen"></i> &nbsp;<span class="share-text">Make Post</span></button>
                                                   <button type="button" class="btn btn-light"><i class="fas fa-image text-danger"></i> <span class="share-text">Photo</span></button>
                                                   <button type="button" class="btn btn-light"><i class="fas fa-user-friends text-info"></i> <span class="share-text">Tag Friends</span></button>
                                                  </div>
                                                <div class="card-body" style="padding: 0.45rem;">
                                                      <div class="form-group">
                                                              <textarea class="form-control" id="exampleFormControlTextarea1" cols="100%" rows="3" placeholder="What are you thinking about?"></textarea>
                                                      </div>
                                                     <button type="button" class="btn btn-primary"><i class="fas fa-share"></i> Share</button>
                                                 </div>  
                                              </div>
                            </div>
                     </div>
                 </div>
                 <p class="lead"><strong>&nbsp; My Posts</strong></p>
                 @if(count($posts)>0)
                    <div class="card-deck">
                        <div class="card post-radius border-1">
                            <button type="button" class="btn btn-light float-right text-right"><i class="fas fa-ellipsis-v"></i></button>
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
                <div class="alert alert-info w-100"><i class="fa fa-info"></i> You have no post yet!</div>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="alert alert-success alert-dismissable profile-update-show" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Your profile picture has been updated.
                </div>
                <div class="alert alert-danger alert-dismissable profile-update-not" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    The picture must be smaller than 1MB
                </div>
                    <div class="card-deck">
                            <div class="card">
                              <!--<img class="card-img-top" src="https://scontent.fbtz1-10.fna.fbcdn.net/v/t1.0-9/46664441_481682579006343_1682351471665872896_n.jpg?_nc_cat=110&_nc_ht=scontent.fbtz1-10.fna&oh=30f6c5d9df1bd240f53c7cf282e86a21&oe=5C6BDBC2" alt="Card image cap">-->
                              <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-info-circle"></i> About Me</h5>
                                <ul style="margin-top:25px" class="list-group">
                                <li class="list-group-item"> 
                                <i class="fa fa-star"></i> Reputation: <span class="badge badge-secondary">{{$user->reputation}}</span>
                                </li>
                                <li class="list-group-item"><i class="fa fa-user-friends"></i> Friends: <span class="badge badge-secondary">{{$friendCount}}</span></li>
                                <li class="list-group-item"><i class="fa fa-comment"></i> {{$user->intro}} <a href="#"  onclick="return false;" class="badge badge-success">Add intro</a></li>
                                </ul>
                               </div>  
                            </div>
                    </div>
            </div>
        </div>
        
     </main>
@endsection