    <?php include "handler/header.php"; ?>

    <!--BLOG SECTION-->
    <section class="blog">
        <div class="container">

            <?php

            function readMore($content , $limit){
                $content = substr($content,0,$limit);
                return $content;
            }
        
            if(isset($_GET["page"]))
                $page = $_GET["page"];

            else
                $page = 1;

            if($page == "" || $page == 1){
                $page =  0;

            }
            else
                $page = $page*4 - 4 ;
                

            $sql_query  = "SELECT * FROM blogs";
            $sql = mysqli_query($conn , $sql_query);
            $number_of_pages = mysqli_num_rows($sql);
            $pages = ceil($number_of_pages / 4 ) ;
            

            $sql_query = "SELECT * FROM blogs ORDER BY blog_id DESC LIMIT $page ,4 ";
            $sql = mysqli_query($conn, $sql_query);

            while ($row = mysqli_fetch_assoc($sql)) {
                $blog_id = $row["blog_id"];
                $blog_header = $row["blog_header"];
                $blog_context = $row["blog_context"];
                $blog_context = readMore($blog_context , 400);
                $blog_date = $row["blog_date"];
                $blog_img = $row["blog_img"];
                    ?>

            <div class="card">
                <div class="card-img"><a href="blog.php?blog_id=<?php echo $blog_id;?>"><img src="images/blog.jpg" alt=""></a></div>
                <div class="card-content">
                    <h3 class="card-header"> <?php echo $blog_header; ?></h3>
                    <p class="card-context">
                            <?php echo $blog_context;  ?>
                            <br>
                            <a class="devami" href="blog.php?blog_id=<?php echo $blog_id;?>">Read More</a>                    
                    </p>

                    <span class="date"><?php echo $blog_date; ?></span>
                </div>
            </div>
            <?php } ?>
                
            <div class="pages">
            <?php 
                for($i=1 ; $i<=$pages ; $i++){
                    ?>
                <a href="?page=<?php echo $i; ?>" class="sayfa"><?php echo $i; ?></a>
                <?php } ?>
            
            </div>
            
            
            
        </div>
    </section>


</body>

</html>