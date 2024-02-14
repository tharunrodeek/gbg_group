<html lang="en">
<head>
    <title>User List Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
global $conn;
require('config/config.php');

$sql="select id,username,email from tbl_users where status=1";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
?>

<h2>List Users</h2>
<a href="index.php">Back to Home</a>
<table>
    <thead>
            <tr>
                <th>User name</th>
                <th>Email</th>
                <th></th>
            </tr>
    </thead>
    <tbody>
    <?php
    if($rowcount>0):
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
    ?>
         <tr>
             <td><a href="#" class="ShowPopUp" data-id="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></a></td>
             <td><?php echo $row['email']; ?></td>
             <td><button class="btn-delete" onclick="confirmDelete(<?php echo $row['id']; ?>)" >Delete</button></td>

         </tr>
    <?php
        }
    endif;
    ?>

    <?php if($rowcount==0): ?>
     <tr>
         <td colspan="3">NO Data Found</td>
     </tr>
    <?php endif; ?>




    </tbody>


</table>

<div id="popup" class="popup">
        <p id="bindHtml">

        </p>
        <button onclick="closePopup()">Close</button>
    </div>

    <div id="overlay" class="overlay" onclick="closePopup()"></div>

</body>
</html>
<script src="js/jquery.min.js"></script>
<script>
    function confirmDelete(id) {
        var isConfirmed = window.confirm('Are you sure you want to delete this user?');
        if (isConfirmed) {
            deleteUser(id);
        }
    }

    function deleteUser(id) {

                jQuery.ajax({
                    url: 'delete.php',
                    type: 'POST',
                    data:'user_id='+id,
                    async: false,
                    success: function(result) {
                        var json=JSON.parse(result);
                        if(json['STATUS']=='OK')
                        {
                            alert('User Deleted Successfully');
                            location.reload();
                        }
                        else
                        {
                            alert('Error occured while delete user');
                        }
                    }
                });

    }

    $('.ShowPopUp').click(function()
    {
        var id=$(this).data('id');
        openPopup(id);
    });


    function openPopup(id) {


        jQuery.ajax({
            url: 'user_data.php',
            type: 'POST',
            data:'user_id='+id,
            async: false,
            success: function(result) {
                var json=JSON.parse(result);
                if(json['STATUS']=='OK')
                {
                    document.getElementById('popup').style.display = 'block';
                    document.getElementById('overlay').style.display = 'block';
                    $('#bindHtml').html(json['HTML']);
                }

            }
        });
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>