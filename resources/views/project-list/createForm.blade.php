
<form method='POST' action ='/project-list'>
    @csrf
           
         <div>
            <label 
             class='form-label'>
            Name</label>
            <input type="text" class='form-control' id=name name='name' />
            @error('name')
                <p class=text-danger >{{$message}}</p>
            @enderror
         </div>   
        <div class= 'text-center'><button class='btn btn-outline-info'>Save</button>
            <!--<button class ='btn btn-secondary'>Reset</button> -->
        </div> 
</form>