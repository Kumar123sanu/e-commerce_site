<h3 class="text-center text-success mt-4">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <?php 
        $get_payment="SELECT * FROM `user_payments`";
        $run_payment=mysqli_query($con,$get_payment);
        $count_payment=mysqli_num_rows($run_payment);
        echo "  <tr class='text-center'>
        <th>Sl No</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Payment Mode</th>     
        <th>Payment Date</th>
        <th>Delete</th>
        </tr>
        </thead>
        <tbody>";
        
        if($count_payment==0){
            echo "<h2 class='text-danger text-center mt-5'>No Payment received yet</h2>";
        }else{
            $number=0;
            while($row_data=mysqli_fetch_assoc($run_payment)){
                
                $order_id=$row_data['order_id'];
                $payment_id=$row_data['payment_id'];
                $amount=$row_data['amount'];
                $invoice_number=$row_data['invoice_number'];
                $payment_mode=$row_data['payment_mode'];
                $date=$row_data['date'];
                $number++;

                echo "<tr class='text-center'>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                ";
                ?>
                <td><a href='index.php?delete_payment=<?php echo $order_id ?>'type="button" class="text-dark" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash text-dark'></i></a></td>
            </tr>
            <?php 
            }

        }
        
    ?>
      
        
    </tbody>

</table>
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
      <div class="modal-body">
        <h5>Are you sure you want to delete this?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_payment" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_payment=<?php echo $payment_id?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>