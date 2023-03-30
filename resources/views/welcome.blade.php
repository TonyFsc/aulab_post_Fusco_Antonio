<x-layout>
    <div class="container-fluid p-3 bg-info text-center text-black">
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

</x-layout>