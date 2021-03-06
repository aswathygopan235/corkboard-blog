@props(['post'=>$post])
<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <div class="mb-4 ">
            <a href="{{route('users.posts',$post->user)}}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>
            <p class="mg-2">{{$post->body}}</p>
                <div class="flex items-center">
                @auth 
                @if(!$post->likedBy(auth()->user()))
                    <form action="{{route('posts.likes',$post)}}" method="post" class="mr-1">
                    @csrf
                        <button type="submit" class="text-blue-500">Like</button>
                    </form>
                @else
               
                    <form action="{{route('posts.likes',$post)}}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="text-blue-500">Unlike</button>
                    </form> 
                @endif
                    
                    
                    @can('delete',$post)
                    <form action="{{ route('posts.destroy',$post)}}" method="post" class="mr-1">
                    @csrf
                   
               
                @method('DELETE')
                        <button type="submit" class="text-red-500">Delete post</button>
                    </form> 
                @endcan
                @endauth
                    {{$post->likes->count()}} {{Str::plural('like',$post->likes->count())}}
               
                </div>

            </div>
</div>