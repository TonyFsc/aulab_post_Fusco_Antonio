<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-black">
        <div class="row justify-content-center">
            <h1 class="display-2">
                The Aulab Post 
            </h1>
        </div>
    </div>

           

    <form class="card p-5 shadow" action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        @if(session('message'))
        <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
        @endif

       

    </form>
    
  

    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach($articles as $article)
            <div class="col-12 col-md-3">
                <div class="card">
               
                 
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        
                        <p class="small text-muted fst-italic text-capitalize"{{$article->category->name}}></p>
                        <p class="small fst-italic text-capitalize">
                   @foreach($article->tags as $tag)
                     #{{$tag->name}}
                      @endforeach
                 </p>
                        @if($article->category)
                        <a href="{{route('article.byCategory',['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                        @else
                        <p class="small text-muted fst-italic text-capitalize">
                            Non categorizzato
                        </p>
                         @endif

                         <span class="small text-muted" fst-italic>- tempo di lettura {{$article->readDuration()}} min</span>
                         <hr>

                         
                      
                    </div>
                  <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                  redatto il {{$article->created_at->format('d/m/Y')}} da <a href="{{route('article.byUser', ['user'=>$article->user->id])}}" class="px-2 small text-muted fst-italic ">{{$article->user->name}}</a>
                    <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi</a>
                    
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>