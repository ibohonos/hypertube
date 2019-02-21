@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						@if (Auth::user())
							<video-details imdb_id="{{ $video['imdb_id'] }}" user_token="{{ Auth::user()->api_token }}"></video-details>
						@else
							<video-details imdb_id="{{ $video['imdb_id'] }}" user_token="Null"></video-details>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
