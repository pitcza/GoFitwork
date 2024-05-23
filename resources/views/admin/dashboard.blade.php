<!doctype html>
<html lang="en">
    @include('admin.gofitwork')

    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <body>
        <div class="content">
            <div class="header"></div>

            <div class="body-content">
                <div class="content"> 

                    <div class="cards">
                        <div class="card1">
                            <div class="icon-case1">
                               <!-- <img src="assets/images/GC.png"> -->
                            </div>
                            <div class="box1">
                                <h1>1520</h1>
                                <h3>Joined Members </h3>
                            </div>
                        </div>
                
                        <a class="card1">
                            <div class="icon-case2">
                             <!--- <img src="assets/images/CCS.png"> -->
                            </div>
                            <div class="box1">
                                <h1> 3040</h1>
                                <h3>Monthly Joined </h3>
                            </div>
                        </a>
                        
                        <a class="card1">
                            <div class="icon-case3">
                                <!-- <img src="assets/images/CEAS.png" alt=""> ---> 
                            </div>
                            <div class="box1">
                                <h1> 546 </h1>
                                <h3>Total Enquiries</h3>
                            </div>
                        </a>
                    
                   
            
                    <!------------------- TABLE ---------------->
            
                    <div class="table">
                        
                    </div>
                </div>
                </div>
            </div>

            <div class="sidebar-content">
                @include('admin.sidebar')
            </div>

        </div>

    </body>
</html>
                               