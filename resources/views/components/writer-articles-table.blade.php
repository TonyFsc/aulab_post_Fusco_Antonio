<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sotto titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Tags</th>
            <th scope="col">Creato il </th>
            <th scope="col">Azioni</th>
    </thead>
    <tbody>
        @foreach($articles as $article)
        </tr>
            <th scope="row">{{$article->id}}</th>
            <td>{{$article->title}}</td>
            <td>{{$article->subtitle}}</td>
            <td>{{$article->categoty->name ?? 'Non categorizzato'}}</td>

            <td>
                @foreach($article->tags as $tag)
                    {{$tag->name}}
                @endforeach

            </td>

       
                  <td>  {{$article->created_at->format('d/m/Y')}}</td>
            
            <td>
            <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi l'articolo</a>
            <a href="{{route('article.edit', compact('article'))}}" class="btn btn-warning text-white">Modifica L'articolo</a>

            <form action="{{route('article.destroy', compact('article'))}}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Elimina articolo</button>
            </form> 
        </td>
    </tr>
    @endforeach
</tbody>
</table>
           
           