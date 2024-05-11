@extends('layouts.app')
@section('content')

                   {{-- @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach--}}




                   {{--<div class="container">
                       <header class="border-bottom lh-1 py-3">
                           <div class="row flex-nowrap justify-content-between align-items-center">
                               <div class="col-4 pt-1">
                                   <a class="link-secondary" href="#">Subscribe</a>
                               </div>
                               <div class="col-4 text-center">
                                   <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">Large</a>
                               </div>
                               <div class="col-4 d-flex justify-content-end align-items-center">
                                   <a class="link-secondary" href="#" aria-label="Search">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                                   </a>
                                   <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
                               </div>
                           </div>
                       </header>

                   <div class="nav-scroller py-0 mb-3 border-bottom">
                       <nav class="nav nav-underline justify-content-between">
                           <a class="nav-item nav-link link-body-emphasis" href="#">Mazoon Aluminum</a>
                           <a class="nav-item nav-link link-body-emphasis " href="#">Mazoon System</a>
                           <a class="nav-item nav-link link-body-emphasis active" href="#">Aluminum</a>
                           <a class="nav-item nav-link link-body-emphasis" href="#">Glass</a>
                           <a class="nav-item nav-link link-body-emphasis" href="#">Fabricator</a>
                           <a class="nav-item nav-link link-body-emphasis" href="#">Design</a>
                           <a class="nav-item nav-link link-body-emphasis" href="#">Construction</a>
                           <a class="nav-item nav-link link-body-emphasis" href="#">Business</a>

                       </nav>
                   </div>
                   </div>--}}

                   <main class="container">
                       @foreach($featuredPosts as $post)

                       <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                           <div class="col-lg-6 px-0">
                               <h1 class="display-4 fst-italic">{{ $post->title }}</h1>
                               <div>{!! preg_match('/<p[^>]*>(.*?)<\/p>/is', $post->body, $matches) ? $matches[0] : $post->body !!}</div>
                               <p class="lead mb-0"><a href="{{route('post.show',$post->id)}}" class="text-body-emphasis fw-bold">Continue reading...</a></p>
                           </div>
                       </div>
                       @endforeach

                       <div class="row mb-2">
                           @foreach($pagePosts as $post)
                           <div class="col-md-6">
                               <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                   <div class="col p-4 d-flex flex-column position-static">
                                       <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                                       <h3 class="mb-0">{{ $post->title }}</h3>
                                       <div class="mb-1 text-body-secondary">{{ $post->created_at->format('jS M Y') }}</div>
                                       {!! $post->body !!}
                                       <a href="{{route('post.show',$post->id)}}" class="icon-link gap-1 icon-link-hover stretched-link">
                                           Continue reading
                                           <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                                       </a>
                                   </div>
                                   <div class="col-auto d-none d-lg-block">
                                       <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                   </div>
                               </div>
                           </div>
                           @endforeach
                       </div>

                       <div class="row g-5">
                           <div class="col-md-8">
                               <h3 class="pb-4 mb-4 fst-italic border-bottom">
                                   From the Firehose
                               </h3>

                               @foreach($regularPosts as $post)
                               <article class="blog-post">
                                   <h2 class="display-5 link-body-emphasis mb-1"><a  class="text-decoration-none text-dark" href="{{route('post.show',$post->id)}}">{{ $post->title }}</a> </h2>
                                   <p class="blog-post-meta">Created at: {{ $post->created_at->format('jS M Y') }} by <a href="#">{{ optional($post->user)->name }} </a> Updated at: {{ $post->updated_at->format('jS M Y') }}</p>
                                   {!! $post->body !!}
                               </article>
                               @endforeach

                               <nav class="blog-pagination" aria-label="Pagination">
                                   <a class="btn btn-outline-primary rounded-pill" href="#">Older</a>
                                   <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer</a>
                               </nav>

                           </div>

                           <div class="col-md-4">
                               <!-- Sidebar widgets -->
                               @include('blog.sidebar')
                           </div>
                       </div>

                   </main>
    <br><br>

@endsection
