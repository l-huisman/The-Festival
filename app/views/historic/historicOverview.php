<?php
require_once __DIR__ . '/../../views/elements/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historic</title>
    <style>

body{margin-top:20px;}
.events_area {
    padding: 130px 0 100px;
    ;
}
@media (max-width: 991px) {
    .events_area {
        padding: 70px 0;
    }
}
.events_area .event-link {
    color: #fdc632;
    font-size: 13px;
    text-transform: uppercase;
}
.events_area .event-link img {
    margin-left: 5px;
    display: inline-block;
}

.single_event {
    margin-bottom: 30px;
}
.single_event .event_thumb {
    overflow: hidden;
}
.single_event .event_thumb img {
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
}
.single_event .event_details {
    background: rgba(0, 35, 71, 0.5);
    position: absolute;
    top: 0px;
    right: 0px;
    width: 275px;
    padding: 30px 25px;
    color: #ffffff;
}
.single_event .event_details .date {
    color: #ffffff;
    padding-right: 15px;
    border-right: 2px solid #fff;
    font-family: "Rubik", sans-serif;
    font-size: 14px;
}
.single_event .event_details .date span {
    display: block;
    color: #fdc632;
    font-size: 28px;
    font-weight: 500;
}
.single_event .event_details .time-location {
    padding-left: 15px;
    font-size: 14px;
}
.single_event .event_details .time-location p {
    margin-bottom: 0px;
}
.single_event .event_details .time-location p span {
    color: #ffffff;
    font-size: 13px;
    font-weight: 500;
}
.single_event:hover img {
    transform: scale(1.1);
}
.single_event:hover h4 a {
    color: #fdc632;
}


        </style>
</head>
<body>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
    <div class="col-md-6 p-lg-5 mx-auto my-5">
      <h1 class="display-3 fw-bold">Historic events in Haarlem</h1>
      <h3 class="fw-normal text-muted mb-3">Geniet een dag van de culturele en prachtige geschiedenis van Haarlem </h3>
      <div class="d-flex gap-3 justify-content-center lead fw-normal">
        <a class="icon-link" href="#">
          Learn more
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
        <a class="icon-link" href="#">
          Buy
          <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
        </a>
      </div>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>
<div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom" style="text-align:center;">Meest populaire evenementen</h2>


  </div>

  <div class="events_area">
    <div class="container">
    <div class="row">
<? foreach($historic as $h){
   
echo'

      
            <div class="col-lg-6 col-md-6">
                <div class="single_event position-relative">
                    <div class="event_thumb">
                        <img src="https://www.awanderlustforlife.com/wp-content/uploads/2015/12/Haarlem_Title.jpg" alt="" />
                    </div>
                    <div class="event_details">
                        <div class="d-flex mb-4">
                            <div class="date"><span>15/18</span> Jun</div>
                            <div class="time-location">
                                <p><span class="ti-time mr-2"></span>' . $h['eventDate'] . ' </p>
                                <p><span class="ti-location-pin mr-2">' . $h['location'] . '</span> </p>
                            </div>
                        </div>
                        <p>
                        ' . $h['description'] . ' 
                        </p>
                        <a href="/historic/detail?id=' . $h['id'] . '" class="btn btn-primary rounded-0 mt-3">View Details</a>
                    </div>
                </div>
            </div>
           
           
        
  
';
}
?>
    </div>
</div>
</div>
</body>
</html>

<?php
require_once __DIR__ . '/../../views/elements/footer.php';
?>