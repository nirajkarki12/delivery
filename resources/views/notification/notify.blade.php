<div class="col-md-12 px-0">
@if(Session::has('flash_errors'))
   @if(is_array(Session::get('flash_errors')))
      <div class="alert alert-danger alert-dismissible fade show">
         <ul>
             @foreach(Session::get('flash_errors') as $errors)
               @if(is_array($errors))
                  @foreach($errors as $error)
                      <li> {{$error}} </li>
                      <button type="button" class="close" data-dismiss="alert">×</button>
                  @endforeach
               @else
                  <li> {{$errors}} </li>
                  <button type="button" class="close" data-dismiss="alert">×</button>
               @endif
             @endforeach
         </ul>
      </div>
   @else
     <div class="alert alert-danger alert-dismissible fade show">
         {{Session::get('flash_errors')}}
         <button type="button" class="close" data-dismiss="alert">×</button>
     </div>
   @endif
@endif

@if(Session::has('flash_error'))
   <div class="alert alert-danger alert-dismissible fade show">
     {{Session::get('flash_error')}}
     <button type="button" class="close" data-dismiss="alert">×</button>
   </div>
@endif

@if(Session::has('flash_success'))
   <div class="alert alert-success alert-dismissible fade show">
     {{Session::get('flash_success')}}
     <button type="button" class="close" data-dismiss="alert">×</button>
   </div>
@endif
</div>

@if ($errors->any())
    <div class="col-md-12 px-0">
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4 class="alert-heading">Oops! Looks like Something is Wrong</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

