@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					{{--<div class="card-header">--}}
						{{--<span>Video {{ $video['title'] }}</span>--}}
					{{--</div>--}}
					<div class="card-body">
						{{--{{ dd($video) }}--}}
						{{--<video-details imdb_id="{{ $video->imdb_id }}"></video-details>--}}
						<video-details imdb_id="{{ $video['imdb_id'] }}" video_id="{{ $video['id'] }}" user_token="{{ Auth::user()->api_token }}"></video-details>
						{{--<div>--}}
							{{--<img src="{{ $video['large_cover_image'] }}">--}}
							{{--<video controls>--}}
								{{--<source src="/play/videos/{{ $video->video }}" type="video/mp4">--}}
							{{--</video>--}}
							{{--<p>{{ $video['description_full'] }}</p>--}}
						{{--</div>--}}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
