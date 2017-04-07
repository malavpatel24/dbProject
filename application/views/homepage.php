

        <div style="margin-top:20px;" class="container">
            <br>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                    <li data-target="#myCarousel" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="<?php echo site_url()?>image/first.jpg" alt="First slide" width="460" height="345">
                    </div>

                    <div class="item">
                        <img src="<?php echo site_url()?>image/second.jpg" alt="Second slide" width="460" height="345">
                    </div>

                    <div class="item">
                        <img src="<?php echo site_url()?>image/third.jpg" alt="Third slide" width="460" height="345">
                    </div>

                    <div class="item">
                        <img src="<?php echo site_url()?>image/fourth.jpg" alt="Fourth slide" width="460" height="345">
                    </div>

                    <div class="item">
                        <img src="<?php echo site_url()?>image/fifth.jpg" alt="Fifth slide" width="460" height="345">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>


            </div>
        </div>
