<section class="mb-5">
    <div class="card bg-light">
        <div class="card-body">
            @if(Auth::check())
                <!-- Comment form-->
                <form class="mb-4" method="POST" action="{{ route('register') }}">
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Textarea</label>
                        <textarea class="form-control @error('name') is-invalid @enderror" rows="3"
                                  id="validationTextarea"
                                  placeholder="Join the discussion and leave a comment!"
                                  required></textarea>
                        @error('name')
                        <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>


                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror" name="name"
                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>


                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>


                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm"
                               class="form-label">{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required autocomplete="new-password">

                    </div>

                    <div class="mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    {{--                                <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>--}}
                </form>
            @else
{{--                Sign-up for leave comment!--}}
            @endif
            <!-- Comment with nested comments-->
                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
            @foreach($post->comments as $comment)
                <div class="d-flex mb-4">
                    <!-- Parent comment-->
                    <div class="flex-shrink-0">
                        <img class="rounded-circle"
                             src="{{ $comment->user->avatar }}"
                             alt="..."/></div>
                    <div class="ms-3">
                        <div class="fw-bold">{{ $comment->user->name }}</div>
                        {{ $comment->comment }}
                        @unless(!$comment->replies)
                            <!-- Child comment -->
                            @foreach($comment->replies as $reply)
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-circle"
                                             src="{{ $reply->user->avatar }}"
                                             alt="..."/></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">{{ $reply->user->name }}</div>
                                        {{ $reply->comment }}
                                    </div>
                                </div>
                            @endforeach
                        @endunless

                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
