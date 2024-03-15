    <!-- role description page--> 
<form method='POST' action ='/roles/store'>
    @csrf
           
         <div>
            <label 
             class='form-label'>
            Description</label>
            <input type="text" class='form-control' id=description name='description' />
            @error('description')
                <p class=text-danger >{{$message}}</p>
            @enderror
         </div>   
        <div class= 'text-center'><button class='btn btn-primary'>Save</button>
            <!--<button class ='btn btn-secondary'>Reset</button> -->
        </div> 
         </form>