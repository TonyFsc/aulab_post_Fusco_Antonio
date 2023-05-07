<x-layout>

    

<div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
             Tutti gli articoli per: {{$query}}
            </h1>
        </div>
    </div>



    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)
            <div class="col-12 col-md-3 my-2">
                <div class="card">
                    <img src="{{Storage::url($article->image)}}" class= " card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class=" card-title">{{$article->title}}</h5>
                        <p class=" card-text">{{$article->subtitle}}></p>
                        <a href="{{route('article.byCategory',['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                        <p class="small fst-italic text-capitalize">
                    @foreach($article->tags as $tag)
                     #{{$tag->name}}
                      @endforeach
                 </p>
                      
                    </div>


                         <div class="card-footer taxt-muted d-flex justify-content-between-items-center">
                        <a href="{{route('article.byUser', ['user' => $article->user->id])}}">Redatto il {{$article->create_at->format('d/m/Y')}} da {{$article->user->name}}</a>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi</a>
                        </div>
           
                         
                         <span class="small text-muted" fst-italic>- tempo di lettura {{$article->readDuration()}} min</span>
                         <hr>
                        
                      
                        
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>

</x-layout>