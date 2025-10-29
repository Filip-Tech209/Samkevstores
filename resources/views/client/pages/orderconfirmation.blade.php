<!DOCTYPE html>
<html lang="en">
@include('backend.widgets.head')
<body>
  <div class="container-scroller">  
        <div class="content-wrapper">
          <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Placed Successfully! </h4>
                    <div class="media">
                      <div class="media-body">
                        <p class="card-text">Order Id <span style="font-size:24px, font-weight:bold; color:red">{{$order}}</span> . Click <a href="{{'/shop'}}"><i class=""></i>here</a>  to continue shopping</p>
                      </div>
                          
                    </div>
                        
                  </div>
                </div>
              </div>
          </div>
        </div>
  </div>
  <style>
    .content-wrapper{
      margin-top:100px;
      display: flex;
      flex-direction: row;
      justify-content: center;
      background-color: white;
    }
  </style>

  @include('backend/widgets.js')
</body>

</html>

