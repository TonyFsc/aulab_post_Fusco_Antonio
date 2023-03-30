<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Accedi
            </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

            @if ($errors->all())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
           <form  class="card p-5 shadow" action="{{route('login')}}" method="post" >
            @csrf

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            <div class="mt-2">
                <button class="small mt-2">Accedi</button>
                <p class="small mt-2">Non sei registrato? <a href="{{route('register')}}">clicca qui</a></p>
            </div>
           </form>

            
            

            </div>
        </div>
    </div>
</x-layout>