@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="">
            <p class='text-center text-danger'>{{$error}}</p>
        </div>
    @endforeach 
@endif

@if(session('success'))
     <div class=''>
        <p class="text-center text-success text-success">{{session('success')}}</p>
    </div>
@endif

@if(session('error'))
     <div class='bg-danger'>
        <p class="text-center text-danger text-success">{{session('error')}}</p>
    </div>
@endif

{{-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, possimus veniam porro maxime, ipsam quia dolores omnis mollitia quasi illum dolor eos veritatis cumque incidunt delectus vel consequuntur nesciunt aliquid. --}}