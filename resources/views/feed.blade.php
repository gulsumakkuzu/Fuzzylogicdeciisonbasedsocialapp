<?php use Illuminate\Support\Str;?>
@extends('layout.app',['user',$user])
@section('title', 'Social Network App')
@section('content')
<main role="main" class="container">
    <div class="row">
        <div class="col-lg-8">
             <div class="container">
                 <div class="row">
                        <div class="card-deck">
                                <div class="card shadow-sm">
                                <div class="card-header">
                                    <a href="{{url('profile')}}/{{$user->id}}/{{Str::slug($user->first_name.$user->last_name)}}"><button type="button" class="btn btn-light"><img @if($user->profile_picture=="default.jpg") src="{{asset('assets/images/profile_pictures')}}/{{$user->profile_picture}}" @else src="{{asset('assets/images/profile_pictures/150x150')}}/{{$user->profile_picture}}" @endif  width="62" class="rounded-circle border border-default" alt="">&nbsp; <span class="lead">{{$user->first_name." ".$user->last_name}} | Home <i class="fa fa-angle-down text-info"></i></span></button></a>
                                </div>
                                  <div class="card-body" style="padding: 0.95rem;">        
                                        <p>
                                            <button type="button" class="btn btn-light"><i class="fas fa-pen"></i> &nbsp;<span class="share-text">Make Post</span></button>
                                            <label class="btn btn-light" style="margin-bottom:0;"><i class="fas fa-image text-danger"></i> Photo <input type="file" accept=".png, .jpg, .jpeg" id="post-photo" hidden></label>
                                            <button type="button" id="show_tag_button" class="btn btn-light"><i class="fas fa-user-friends text-info"></i> <span class="share-text">Tag Friends</span></button>
                                        </p>
                                        <input type="hidden" name="post-photo">                                                
                                        <div class="form-group">
                                            <img id="blah" class="post-photo-preview rounded" width="20%" src="#"/>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" cols="100%" rows="3" placeholder="What are you thinking about?"></textarea>
                                        </div>
                                        <div id="tag-friend-container">
                                            <div class="input-group mb-2 alert alert-primary">
                                                <div class="input-group-prepend">
                                                <div class="input-group-text">With</div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Who are you with?" id="search_friends_fortag">
                                            </div>
                                            <ul class="list-group list-group-flush" id="friend_selects"></ul>
                                            <div class="container">
                                                <div class="row" id="tagsdiv"></div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="input-group mb-2 alert alert-warning">
                                                            <div class="input-group-prepend">
                                                            <div class="input-group-text">Confidence Value</div>
                                                            </div>
                                                            <input type="number" class="form-control" name="confidence_value">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <div class="input-group mb-2 alert alert-info">
                                                        <div class="input-group-prepend">
                                                                <label class="input-group-text" for="inputGroupSelect01">Select Confidence</label>
                                                              </div>
                                                              <select class="custom-select" placeholder="Choose" id="inputGroupSelect01">
                                                                <option selected>Choose...</option>
                                                                <option value="1">Me</option>
                                                                <option value="2">Others</option>
                                                              </select>
                                                        </div>
                                                </div>
                                        </div>
                                        <button type="button" class="btn btn-primary"><i class="fas fa-share"></i> Share</button>
                                   </div>  
                                </div>
                        </div>
                 </div>
                 <p class="lead"><strong><i class="fa fa-list-alt text-primary"></i> News Feed</strong></p>
                 <div class="row">
                    @if(count($posts)>0)
                         <div class="card-deck">
                                 <div class="card post-radius shadow-sm">
                                        <button type="button" class="btn btn-light float-right text-right"><i class="fas fa-ellipsis-v"></i></button>
                                   <!--<img class="card-img-top" src="https://scontent.fbtz1-10.fna.fbcdn.net/v/t1.0-9/46664441_481682579006343_1682351471665872896_n.jpg?_nc_cat=110&_nc_ht=scontent.fbtz1-10.fna&oh=30f6c5d9df1bd240f53c7cf282e86a21&oe=5C6BDBC2" alt="Card image cap">-->
                                   <div class="card-body">
                                     <div class="row"><div class="col-lg-1"><img src="https://scontent.fbtz1-4.fna.fbcdn.net/v/t1.0-1/p74x74/29026115_1224351247697714_6349084891925184512_n.jpg?_nc_cat=102&_nc_ht=scontent.fbtz1-4.fna&oh=c1c7dfe640b1687135de0cd182b84b69&oe=5CB4DD2F" width="48" class="rounded-circle border border-secondary" alt=""></div><div class="col-lg-11"><h5 style="margin-top: 27px;" class="card-title">İbrahim Ceyhan <small>is with <a href="#">Simsek Merve.</a></small></h5></div></div>
                                     <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                         This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                     </p>
                                     <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        <button type="button" class="btn btn-outline-primary"><i class="fas fa-thumbs-up"></i> <span class="badge badge-primary">4</span></button>
                                        <button type="button" class="btn btn-outline-info"><i class="fas fa-comments"></i> Comments <span class="badge badge-info">1</span></button>
                                    </div>  
                                    <ul class="list-group">
                                            <li class="list-group-item rounded-0"><img width="30px"src="https://scontent.fbtz1-3.fna.fbcdn.net/v/t1.0-1/c1.0.74.74a/p74x74/14980792_228010550952966_6505702502729897902_n.jpg?_nc_cat=109&_nc_ht=scontent.fbtz1-3.fna&oh=159f7749f5f8a267f009996c30595b30&oe=5CCD4C3A" class="rounded-circle border border-secondary" alt=""> Mustafa Doğaner
                                                <div style="margin-top:10px">
                                                    This is a comment.
                                                </div>
                                                <small class="text-muted">Last updated 3 mins ago</small>
                                                <div class="clearfix"></div>
                                                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-thumbs-up"></i> <span class="badge badge-primary">4</span></button>
                                            </li>
                                    </ul>
                                    <textarea class="form-control w-comment border-0" id="exampleFormControlTextarea1" cols="100%" rows="2" placeholder="Write a comment..."></textarea>
                                 </div>
                         </div>
                         <div class="card-deck">
                                <div class="card post-radius shadow-sm">
                                  <div class="card-body">
                                    <div class="row"><div class="col-lg-1"><img src="https://scontent.fbtz1-3.fna.fbcdn.net/v/t1.0-1/p74x74/37526188_2012953648755950_4830811594852139008_n.jpg?_nc_cat=109&_nc_ht=scontent.fbtz1-3.fna&oh=f3ff5702f9d19bb40a303e2dcb6ed280&oe=5CD73348" class="rounded-circle border border-secondary" width="48" alt=""></div><div class="col-lg-11"><h5 style="margin-top: 27px;" class="card-title">Simsek Merve <small>shared a post.</small></h5></div></div>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                       <button type="button" class="btn btn-outline-primary"><i class="fas fa-thumbs-up"></i> Like <span class="badge badge-primary">4</span></button>
                                       <button type="button" class="btn btn-outline-info"><i class="fas fa-comments"></i> Comments <span class="badge badge-info">2</span></button>
                                   </div> 
                                   <textarea class="form-control border-0 w-comment" id="exampleFormControlTextarea1" cols="100%" rows="2" placeholder="Write a comment"></textarea> 
                                </div>
                        </div>
                        <button type="button" class="btn btn-dark mx-auto" style="margin-bottom: 35px">Load More</button>
                        @else
                        <div class="alert alert-warning w-100"><i class="fa fa-info"></i> There isn't any post yet!</div>
                        @endif
                 </div>
             </div>
        </div>
        <div class="col-lg-4">
            @if(Session::has('message'))
                <div class="alert alert-{{session('color')}} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{session('message')}}
                </div>
            @endif
                <div class="card-deck">
                        <div class="card">
                          <!--<img class="card-img-top" src="https://scontent.fbtz1-10.fna.fbcdn.net/v/t1.0-9/46664441_481682579006343_1682351471665872896_n.jpg?_nc_cat=110&_nc_ht=scontent.fbtz1-10.fna&oh=30f6c5d9df1bd240f53c7cf282e86a21&oe=5C6BDBC2" alt="Card image cap">-->
                          <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-user-friends"></i> Friend Requests</h5>
                            <p class="card-text lead">You haven't any friend request.<br></p>
                            <ul class="list-group">
                               <li class="list-group-item"><img width="23%" src="{{asset('assets/images/profile_pictures/default.jpg')}}" class="rounded-circle border border-secondary" alt=""> Anıl Isın 
                               <div style="margin-top:10px">
                                   <button type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i> Confirm</button> <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                               </div>
                               </li>
                            <li class="list-group-item"><img width="23%" src="{{asset('assets/images/profile_pictures/150x150/6okt6PqeA5hQsfCGvICVN.jpeg')}}" class="rounded-circle border border-secondary" alt=""> Atakan YILDIRIM
                                   <div style="margin-top:10px">
                                       <button type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i> Confirm</button> <button type="button" class="btn btn-outline-danger btn-sm">Delete</button>
                                   </div>
                               </li>
                            </ul>
                           </div>  
                        </div>
                </div>
        </div>
    </div>
 </main>
 @endsection