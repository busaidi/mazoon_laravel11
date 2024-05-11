<div class="position-sticky" style="top: 2rem;">
    <div class="p-4 mb-3 bg-body-tertiary rounded">
        <h4 class="fst-italic">About</h4>
        <p class="mb-0">In this blog we will try to achive aluminum system and how its work and how is correct to to joinery aluminum, also we will foucus on related subject such as glass , powder coating, haredware and ect..</p>
    </div>

    <div>
        <h4 class="fst-italic">Recent posts</h4>
        <ul class="list-unstyled">

           @forelse($recentPosts as $post)
            <li>
                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                    <svg class="bd-placeholder-img" width="100%" height="96" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
                    <div class="col-lg-8">
                        {{--<h6 class="mb-0"><a href="">{{$post->title}}</a> </h6>--}}
                        <h6 class="mb-0" onclick="event.stopPropagation(); location.href='{{ url('/post/' . $post->id) }}';">{{$post->title}}</h6>
                        <small class="text-body-secondary">{{ $post->created_at->format('jS M Y') }}</small>
                    </div>
                </a>
            </li>
            @empty
                  <p>No posts yet</p>
            @endforelse
        </ul>
    </div>

    <div class="p-4">
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            <li><a href="#">July 2024</a></li>
            <li><a href="#">June 2024</a></li>
            <li><a href="#">May 2024</a></li>
            <li><a href="#">April 2024</a></li>
            <li><a href="#">March 2024</a></li>
            <li><a href="#">February 2024</a></li>
            <li><a href="#">January 2024</a></li>
            <li><a href="#">December 2023</a></li>
            <li><a href="#">November 2023</a></li>
            <li><a href="#">October 2023</a></li>
            <li><a href="#">September 2023</a></li>
            <li><a href="#">August 2023</a></li>

        </ol>
    </div>

    {{--<div class="p-4">
        <h4 class="fst-italic">Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>--}}
</div>
