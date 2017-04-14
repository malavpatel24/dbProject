
    <div style="margin-top:100px;" class="container">
        <br>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach($pictures as $key => $value): ?>
                  <li data-target="#myCarousel" data-slide-to="<?php echo $key?>" <?php if($key == 0) echo "class='active'" ?>></li>
                <?php endforeach; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php foreach ($pictures as $picture): ?>
                    <div class="item active">
                        <img src="<?php echo base_url('uploaded_images/' . $picture->pic_location)?>" alt="First slide" width="460" height="345">
                    </div>
                <?php endforeach; ?>


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

    <div style="margin-top:80px;" class="container">
        <div class="container">

            <p>Name: <?php echo $location->name; ?></p>
            <p>Type ID: <?php echo $location->type_id; ?></p>
            <p>Description: <?php echo $location->description; ?></p>
            <p>Cost : <?php echo $location->cost; ?></p>
        </div>
    </div>
