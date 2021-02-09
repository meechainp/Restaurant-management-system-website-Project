<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'condb.php' ?>
  <?php include 'bar.php' ?>

  <!-- query ข้อมูล จากตาราง tables -->
  <?php $query = "SELECT * FROM tables WHERE tableStatus = 1 ORDER BY tableId asc" or die("Error:" . mysqli_error());
  $result = mysqli_query($con, $query);
  ?>
</head>

<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">


      <form name="tables" action="booking_table_db.php" method="POST" enctype="multipart/form-data" id="tables" class="form-horizontal">
        <div class="form-group">
          *หมายเหตุ
          ถ้าคุณจะสั่งอาหารในตอนนี้ โปรดทำการเลือกโต๊ะด้วยครับ
        <div class="card text-center">

          <div class="card-header">
            จองโต๊ะ
          </div>
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <p> เลือกโต๊ะ </p>
                <select name="tableId" class="form-control" required>
                  <option value="tableId">หมายเลข</option>
                  <?php foreach ($result as $results) { ?>
                    <option value="<?php echo $results["tableId"]; ?>">
                      <?php echo $results["tableName"]; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group col-md-6">
                <p> จำนวน </p>
                <input name="custCount" type="number" required class="form-control" id="custCount" placeholder="จำนวน" />
              </div>

              <td colspan="5" align="center">
                <div class="form-group">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
                  </div>
                </div>
              </td>

      </form>

    </div>
  </div>
</div>
<!-- /.container -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>