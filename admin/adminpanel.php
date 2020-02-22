<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>




    <!--<form action="" method="post">
        <input type="text" name="blog_header" placeholder="Header">
        <input type="text" name="blog_context" placeholder="Context">
        <input type="submit" name="submit" value="Add">
    </form>-->

    <style>
        * {
            padding: 0;
            margin: 0;
            border: 0;
        }

        html,
        body {
            background-color: #ecf0f1;
            height: 100%;
            width: 100%;
            display: flex;
        }

        .leftside {
            display: inline-block;
            position: relative;
            width: 20%;
            height: 100%;
            background-color: #2c3e50;
        }

        .leftside ul {
            position: absolute;
            top: 40%;
            width: 100%;
        }

        .leftside ul li {
            list-style: none;
            padding: 10px;
            margin-bottom: 5px;
            background-color: #ecf0f1;
        }

        .leftside ul li a {
            letter-spacing: 1px;
            font-size: 24px;
            text-decoration: none;
            color: #7f8c8d;
        }

        .leftside ul li a:hover {
            color: #bdc3c7;
        }

        #content {
            display: inline-block;
            width: 80%;
            height: 100%;
            background-color: white;
            text-align: center;
        }

        #content ul {
            position: relative;
            top: 30%;
        }

        #content ul li {
            list-style: none;
            padding: 10px;
            margin: 20px;
        }



        #content ul button {
            font-size: 24px;
            background-color: #3498db;
            border-radius: 5px;
            width: 300px;
            color: #ecf0f1;
        }

        #modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0%;
            top: 0%;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        #modal form{
            position: absolute;
            left: 50%;
            top: 30%;
        }
        #modal form input{
            margin-top : 20px;
            display: block;
            height: 30px;
            width: 300px
        }

        #modal form textarea{
            height: 150px;
            width: 300px;
            margin-top: 20px;
            display: block;
        }

        #modal form input:nth-last-child(1){
        }
    </style>

    <div class="leftside">
        <ul>
            <li><a href="">Anasayfa</a></li>
            <li><a href="">İçerik Düzenleme</a></li>
            <li><a href="">Çıkış</a></li>
        </ul>

    </div>

    <div id="content">
        <ul>
            <li>
                <button onclick="add()">Add</button>
            </li>
            <li>
                <button>Delete</button>
            </li>
            <li>
                <button>Edit</button>
            </li>
        </ul>
    </div>

    <div id="modal">
        <div class="close" onclick="close()">Kapat</div>
        <form action="" method="post">
            <input type="text" name="header">
            <textarea name="context"> </textarea>
            <input type="submit" name="add" value="Add">
        </form>
    </div>


    <script>
        function add() {
            var add = document.getElementById("modal");
            add.style.display = "block";
        }

        function close(){
            var add = document.getElementById("modal");
            add.style.display = "none";
        }
    </script>

    <?php
    include "db.php";

    if (isset($_POST['submit'])) {
        $blog_header = $_POST["blog_header"];
        $blog_context = $_POST["blog_context"];


        $sql_query = "INSERT INTO blogs(blog_header , blog_context) VALUES('$blog_header' , '$blog_context')";
        $sql  = mysqli_query($conn, $sql_query);

        if ($sql) {
            header("Location : www.google.com");
            exit;
        }
    }
    ?>


</body>

</html>