<?php

require  '../config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Event App">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Event Home </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="../dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About The Project</h4>
          <p class="text-muted">Event App - List of Event's happening in dublin and dorset college!</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Event App</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>


<!-- Modal for create/ edit -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="event_form" enctype="multipart/form-data" action="event_create.php">
        <div class="modal-body">        
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Event Title:</label>
              <input type="text" name="event_title" id="event_title" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Event Description:</label>
              <textarea class="form-control" name="event_desc" id="event_desc" ></textarea>
            </div>
            <div class="mb-3">
              <label for="message-text" class="col-form-label">Event Date:</label>
              <input type="date" class="form-control" name="datetime-local" id="datetime-local" required>
            </div>
            <!-- <div class="mb-3">
              <label for="message-text" class="col-form-label">Event Date:</label>
              <input type="datetime-local" class="form-control" name="datetime-local" id="datetime-local" required>
            </div> -->
          
            <div class="mb-3">
              <label for="formFileSm" class="form-label">Event Banner:</label>
              <input class="form-control form-control-sm" name="formFileSm" id="formFileSm" type="file">
            </div>
            <div class="mb-3">
              <input class="form-control form-control-sm" name="event_id" id="event_id" value="0" type="hidden">
            </div>         
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="submit_btn" class="btn btn-primary">Submit <b>Event</b></button>
      </div>
    </form>
    </div>
  </div>
</div>


   <!--Delete  Modal -->
   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Event</h5>

        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        Are You Sure You Want to Delete This Event?
      </div>
      <div class="modal-footer">
      <form  method="POST" id="delete_form" action="event_delete.php">
          <div class="mb-3">
            <input class="form-control form-control-sm" name="event_ids" id="event_ids" value="0" type="hidden">
          </div>        
        <button type="button"   class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit"  name="yes" id="yes" class="btn btn-danger"  >Yes Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Event App</h1>
        <p class="lead text-muted">Please , Use those buttons to Create your new event around your <b>City</b>.</p>
        <p>
          <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Create: New Event</button>

          <!-- <a href="#" class="btn btn-secondary my-2">Secondary action</a> -->
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php 

            $sql = "SELECT * FROM events";        
            $result = mysqli_query($conn, $sql);
            $count  = mysqli_num_rows($result);
            if ($count > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="col">
                <div class="card shadow-sm">';
                if(!empty($row['event_banner'])){
                  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  $validURL = str_replace("index.php", "", $actual_link);
                  echo '<img src="'.$validURL,$row['event_banner'].'"style="width:175px; height:175px; " />';

                }else{
                  echo '<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"/>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                  </svg>';
                }
                echo '<div class="card-body">
                    <h5 class="card-title">'.$row['event_name'].'</h5>
                    <p class="card-text">'.$row['event_desc'].'</p>
                    <p class="card-text">'.$row['event_date'].'</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-warning edit_button" id="'.$row['id'].'" name="edit_button" >Edit</button>
                        <button type="button" class="btn btn-sm btn-outline-danger delete_button" id="'.$row['id'].'" name="delete_button" style="margin-left: 20px;">Delete</button>
                      </div>
                      <small class="text-muted">9 mins</small>
                    </div>
                  </div>
                </div>
              </div>';
            }
            } else{
                echo '0 Events!';
            }
            $conn->close();
          ?>
        
      </div>
    </div>
  </div>

</main>

<script>
 
  $(document).on('click', '.edit_button', function(){            
    var event_id = $(this).attr("id");
        $.ajax({
            type: "POST",
            url: 'event_create.php',
            data: $(this).serialize(),
            method:"POST",            
            data: {"get_event_data": event_id},
            dataType:"json",
            success:function(data){
            //  console.log(data.event_name);
                $("#event_id").val(data.id);
                $("#event_title").val(data.event_name);
                $('#event_desc').val(data.event_desc);             
                $("#datetime-local").val(data.event_date);
                $("#datetime-formFileSm").val(data.event_banner);
                $("#submit_btn").prop('value', 'Update Event'); 
                $("#submit_btn").prop('class', 'btn btn-warning'); 
             

                $('#exampleModal').modal('show');
              }
            });
            
        });

        $(document).on('click', '.delete_button', function(){
            var event_id = $(this).attr("id");    
            // console.log('event_id ' +event_id)      
            $("#event_ids").val(event_id);
            $('#deleteModal').modal('show');

        });
       
        
      
</script>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Event App is &copy; Bootstrap</p>
  </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    <script src="../dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
