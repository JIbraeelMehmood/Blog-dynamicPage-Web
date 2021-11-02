@if($users->count())
    @foreach($users as $user)
        <div class="col-2 profile-box border p-1 rounded text-center bg-light mr-4 mt-3">
            <img src="" style="height: 50px; width: 50px; border-radius: 50%;" class="img-responsive">
            <h5 class="m-0"><a href=""><strong>{{ $friendsname->name }}</strong></a></h5>
            <p class="mb-2">
                <small>Following: <span class="badge badge-primary">{{ is_countable($user->acceptor) }}</span></small>
                <small>Followers: <span class="badge badge-primary tl-follower">{{ is_countable($user->acceptor) }}</span></small>
            </p>
            <button class="btn btn-danger btn-sm action-unfollow" data-id="{{ $user->acceptor }}">
                <strong>
                    UnFollow
                </strong>
        </button>
        </div>
    @endforeach
@endif 