 <?php  
   
extract($_REQUEST);
$pageTitle = 'Update Status';

include 'init.php'; 
   
$status = isset($_GET['status']) ? $_GET['status'] : 'Pending';

if(!isset($_SESSION['admin']))
{
	header("location:login.php");
	
}
else
{
    if($status == 'Pending')
    {
        $orderid = isset($_GET['orderid']) && is_numeric($_GET['orderid']) ? intval($_GET['orderid']) : 0;
	
        $stmt = $conn->prepare("UPDATE tbl_order SET status_admin='In Process' WHERE order_id=$orderid");
        $stmt->execute();
 
       header("location:dashboard.php");
    }
    
    elseif($status == 'In Process')
    {
        $orderid = isset($_GET['orderid']) && is_numeric($_GET['orderid']) ? intval($_GET['orderid']) : 0;
	
        $stmt = $conn->prepare("UPDATE tbl_order SET status_admin='Delivered' WHERE order_id=$orderid");
        $stmt->execute();
 
       header("location:dashboard.php");
    }
}


?>