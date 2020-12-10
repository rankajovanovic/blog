<html>
    <head>
        <title>Posts</title>
    </head>

    <body>
        <div>
        <h1>Posts:</h1>
            <ul>
                @foreach ($posts as $post)
                <li>
                <a href="{{ route('posts.single', ['post' => $post->id]) }}">
                {{$post->title}}
                </a> 
                </li>
                
                @endforeach
            </ul>
        
        </div>
    
    </body>
</html>