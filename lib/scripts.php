  <!-- Bootstrap core JavaScript-->
  <script src="../_template/vendor/jquery/jquery.min.js"></script>
  <script src="../_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../_template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../_template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../_template/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../_template/js/demo/chart-area-demo.js"></script>
  <script src="../_template/js/demo/chart-pie-demo.js"></script>
<script src="../_template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../_template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../_template/js/demo/datatables-demo.js"></script>

  <?php


$connection = mysqli_connect("localhost","fastnesi_zura","fastnesi_zura","fastnesi_zura");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];

    if($password === $confirm_password)
    {
        $query = "INSERT INTO register (username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            echo "done";
            $_SESSION['success'] =  "Admin is Added Successfully";
            header('Location: register.php');
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "Admin is Not Added";
            header('Location: register.php');
        }
    }
    else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('Location: register.php');
    }

}

?>