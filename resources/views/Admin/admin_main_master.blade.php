@php
$route = Route::current()->getName();
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    
    @include('admin.body.css')
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <header>
      <h1>Admin Dashboard</h1>
    </header>

   

    <aside>
      <ul>
        <li class="{{($route == '/admin/dashboard')? 'active' : ''}}"><a   href="#">Dashboard</a></li>
        <li class="{{($route == 'university.manage')? 'active' : ''}}"><a  href="{{route('university.manage')}}">Manage University</a></li>
        <li class="{{($route == 'subcampus.manage')? 'active' : ''}}"><a  href="{{route('subcampus.manage')}}">Manage SubCampus</a></li>
        <li class="{{($route == 'test.manage')? 'active' : ''}}"><a  href="{{route('test.manage')}}">Manage Test</a></li>
       
        {{-- <li><a href="#">Customers</a></li> --}}
      </ul>
    </aside>
    
    <main>
      @yield('content')
    </main>

    <footer>
      <p>&copy; 2023 Admin Dashboard</p>
    </footer>
   
  

    <script>
      const sidebarItems = document.querySelectorAll("aside li");

      sidebarItems.forEach((item) => {
        item.addEventListener("click", () => {
          sidebarItems.forEach((item) => {
            item.classList.remove("active");
          });
          item.classList.add("active");
        });
      });

    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="campus_id"]').on('change', function(){
        var campus_id = $(this).val();
        if(campus_id) {
            $.ajax({
                url: "{{  url('/campus/sub_campus/ajax') }}/"+campus_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="sub_campus_id"]').empty();
                      $.each(data, function(key, value){
                          $('select[name="sub_campus_id"]').append('<option value="'+ value.id +'">' + value.subcamus_name + '</option>');
                      });
                },
            });
        } else {
            alert('danger');
        }
    });
});
</script>

  </body>
</html>