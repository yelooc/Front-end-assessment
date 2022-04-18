<?php 
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Web App Go Rest API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body style="background-color:#0f2537">

    <div class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="page-header text-center text-white">
                <h1>API Console</h1>
            </div>
            <div style="background-color:#000000" class='m-5'>
            <div class='p-5'>
                <div class='row g-0'>
                    <div class='col me-5'>
                        <h6 class='text-white'>Request Type</h6>
                        <select name="option" class='form-control form-select'>
                            <?php 
                            $get = $_POST['option'] == 'get' ? "selected" : "";
                            $post = $_POST['option'] == 'post' ? "selected" : "";
                            $put = $_POST['option'] == 'put' ? "selected" : "";
                            $delete = $_POST['option'] == 'delete' ? "selected" : "";
                            echo "<option value='get'$get>GET</option>";
                            echo "<option value='post'$post>POST</option>";
                            echo "<option value='put'$put>PUT</option>";
                            echo "<option value='delete'$delete>DELETE</option>";
                            ?>
                        </select>
                    </div>
                    <div class='col'>
                        <h6 class='text-white'>URL</h6>
                        <input type="text" class='form-control' name='url' placeholder="API URL" value="<?php 
                        if ($_POST){
                            echo $_POST['url'];
                        }
                        ?>"/>
                    </div>
                </div>

                <div class='row g-0'>
                    <div class='col me-5'>
                        <h6 class='text-white'>Header Name</h6>
                        <input type="text" class='form-control' name='header_name' placeholder="Header Name" value="<?php 
                        if ($_POST){
                            echo $_POST['header_name'];
                        }
                        ?>"/>
                    </div>
                    <div class='col'>
                        <h6 class='text-white'>Header Value</h6>
                        <input type="text" name='header_value' class='form-control' placeholder="Header Value" value="<?php 
                        if ($_POST){
                            echo $_POST['header_value'];
                        }
                        ?>"/>
                    </div>
                </div>

                <h6 class='text-white'>ID</h6>
                <input type="text" name='id' class='form-control' placeholder="id" value="<?php 
                        if ($_POST){
                            echo $_POST['id'];
                        }
                        ?>"/>

                <div>
                    <h6 class='text-white'>Request Body</h6>
                    <textarea rows="5" name='body' class="form-control" placeholder="Request body in json string format" ><?php 
                        if ($_POST){
                            echo $_POST['body'];
                        }
                        ?></textarea>
                </div>
                <div class='text-end my-3'>
                    <input type="submit" name="send" value="Send Request" />
                </div>
                
                <div>
                <textarea rows="5" class="form-control" readonly><?php
                if ($_POST) {
                    $option = $_POST['option'];
                    $url = $_POST['url'];
                    $body = $_POST['body'];
                    // $header = array('Authentication: 317fd679cc0bfa343be14b543cbfe2352f2d631ea1bf7ea0a74cfb3f82d44f93');
                    if (!empty($_POST['id'])){
                        if ($option == 'get') {
                            $search_id = $_POST['id'];
                                include 'CRUD/get_single.php';
                            }
                    }else{
                            if ($option == 'get') {     
                                include 'CRUD/get_all.php';    
                            }
                        }
                             if ($option == 'post') {     
                                include 'CRUD/post.php';  
                            }
                            if ($option == 'put') {     
                                include 'CRUD/put.php';  
                            }
                        }
                ?></textarea>
                    <div class='d-flex justify-content-center mt-3'>
                        <button type='button' class='me-3' name='back'>Back</button>
                        <button type='button' name='next'>Next</button>
                    </div>
                </div>
            </div>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> 
</body>
</html>