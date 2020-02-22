<?php include "handler/header.php"; ?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Exo&display=swap'); 
    .blog-img{
        /*width: 300px;
        height: 150px;
        margin: 0 auto;*/
        text-align: center;
    }

    .blog-header{
        text-align: center;
        margin-top: 10px;
        font-size: 36px;
    }

    .blog-context{
        text-align: center;
        margin-top: 10px;
        margin-bottom : 300px;
        line-height: 24px;
        
    }
    
    .comments{
        width: 100%;
    }
    form{
        margin-top: 100px;
        text-align: center;
        width: 100%;
        height: 100%;
    }
    form input:nth-child(1){
        font-size: 18px;
    }
    textarea{
        background: white;
        width: 80%;
        border: 1px solid gray;
        border-radius: 2px;
        font-size: 18px;
        padding: 0 10px 0 10px;
    }
    textarea:focus{
        background-color: white;
    }
    
    .button{
        text-align: center;
        background-color: #e6e6e6;
        height: 40px;
        width: 80%;
        border-radius: 5px;
        font-size: 18px;
        font-weight: bold;
        margin : 10px 0;
        transition: background .3s ease;
    }

    .button:hover{
        background-color: #f1f1f1;
    }

    .commentname{
        width: 80%;
        display: block;
        margin: 0 auto;
        border: 1px solid gray;
        padding-left: 5px;
        margin-bottom: 10px;
        border-radius: 2px;
    }

    .comment{
        width: 80%;
        margin: 0 auto;
        border: 1px solid #e6e6e6;
        border-radius: 2px;
        margin-bottom: 30px;
        padding : 15px ; 
    }
    .comment-date{
        display: block;
        color: gray;
    }
    .comment-context{
        text-align: left;
        padding: 10px 10px 10px 10px;
    }


    @media screen and (max-width : 600px){
        .blog-header{
            font-size: 24px;
            padding-top: 10px;
        }
        .blog-context{
            padding  : 0 5%;
            font-size: 14px;
        }
        textarea{
            width: 70%;
            margin: 0 auto;
        }
        .commentname{
            width: 70%;
            margin: 0 auto;
        }
    }


</style>

    <div class="container">
        
        <?php 
            $blog = $_GET["blog_id"];
            $sql_query = "SELECT * FROM blogs WHERE blog_id =$blog";
            $sql = mysqli_query($conn , $sql_query);

            while($row = mysqli_fetch_assoc($sql)){
                $blog_header = $row["blog_header"];
                $blog_context = $row["blog_context"];
                $blog_img = $row["blog_img"];
                $blog_date = $row["blog_date"];

            
        ?>
        <div class="blog-date"><?php echo $blog_date; ?></div>
        <h1 class="blog-header"><?php echo $blog_header;?></h1>
        <p class="blog-context"><?php echo $blog_context;?></p>
        

            <?php } ?>
    </div>

    <div class="comments">
        <form action="" method="post">
            <div class="comment-form">
                <input type="text" name="commentName" placeholder="Name" class="commentname">
                <textarea name="commentContext" id="" cols="20" rows="5" placeholder="Context"></textarea> <br>
                <input class="button" type="submit" name="commentsubmit" value="Submit">
            </div>
        </form>
        <hr>
    
                
        <?php 
        
        if(isset($_POST["commentsubmit"])){
            $name = $_POST["commentName"];
            $context = $_POST["commentContext"];
            $sql_query = "INSERT INTO comments(comment_name,comment_context,blog_id) VALUES('$name','$context','$blog' )";
            $sql = mysqli_query($conn , $sql_query);
        }
        ?>
    
    
        <div class="comments">
            <?php 
                $sql_query = "SELECT * FROM comments WHERE blog_id =$blog";
                $sql = mysqli_query($conn , $sql_query);
                
                while($row = mysqli_fetch_assoc($sql)){
                    $comment_name = $row["comment_name"];
                    $comment_date = $row["comment_date"];
                    $comment_context = $row["comment_context"];
                
            ?>
            <div class="comment">
                <span class="comment-date"><?php echo $comment_date ;?></span>
                <span class="comment-username"><strong><?php echo $comment_name ;?></strong></span>
                <p class="comment-context"><?php echo $comment_context ;?></p>
                
            </div>
        </div>         
    </div>
    
                <?php } ?>

</body>
</html>