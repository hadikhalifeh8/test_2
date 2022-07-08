

<!DOCTYPE html>
<html>
<head>
  <title>Responsive Table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('assets/css/style_for_table.css')}}"/>
</head>


 <center><h3> {{$user->name}}  </h3></center>


 <table class="table">
     <thead>
     	<tr>
         <th>#</th>
     	 <th>Task Name</th>
          <th>Task Department</th>
        
     	 
     	 
     	</tr>
     </thead>
     <tbody>
     <?php $i=0; ?>
     @foreach($get_tasks as $V_get_tasks)
     	  
     	  <tr>     
                  <tr>
                    <?php $i++; ?>
                <td data-label="Numbr">{{ $i }}</td>  
                <td data-label="Name">{{$V_get_tasks->name}}</td>
                <td data-label="Name">{{$V_get_tasks->dep_rltn->name}}</td>
                
                
     	  	  
     	  	 
     	  
     	  </tr>
  @endforeach

     </tbody>
   </table>
   </body>
</html>





