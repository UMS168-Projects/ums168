<?php
    ob_start();
    require_once '../../../config/config.php';
    require_once '../../../connection/db.php';
    $title = "School Fee ";
    
?>
<h4 class="fw-bold mb-2 d-flex justify-content-between align-items-center">
    <?php echo $translations['controlling'] . " " . $translations['schoolfee'] ?>
</h4>
<div class="card mb-2">
    <div class="card-body">
        <?php
            if (isset($_SESSION['Message'])) {
            ?>
            <div class="alert alert-primary text-center alert-dismissible" role="alert">
                <!-- Action completed successfully! -->
                <?php echo $_SESSION['Message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['Message']);
            }
        ?>
        <form action="actionSchoolFee.php" method="POST">
            <!-- Select Category -->
            <div class="row">
                <div class="col-sm-2 form-label form-label">Student StatusID: </div>
                <div class="col-sm-2">
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-sm" name="StudentStatusID" id="live_search_student">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-2">
                        <span class="form-label">Student Name: </span>
                        <span id="NameInLatin"></span>
                    </div>
                </div>
                <?php
                    $studentStatusID = isset($_GET['StudentStatusID']) ? $_GET['StudentStatusID'] : '';
                    $CurrentDate     = date("d-m-Y");
                ?>
                <div class="col-sm-2">
                    <div class="mb-2">
                        <span class="form-label">Date: </span>                                                               <?php echo $CurrentDate ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-2">
                        <span class="form-label">Academic Program: </span>
                        <span id="AcademicProgram"></span>
                        <!-- ឆ្នាំ​ទី ១/ ឆមាសទី ១/ ព្រឹក/ បរិញ្ញាបត្រ/ 2023-2024/ វិស្វកម្មសហ្វវែរ/ ជំនាន់ទី​​ ៥/ សាខា​ទី ១/ 2024-01-10/ 2024-04-28/ 2024-07-01 -->
                    </div>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-1">
                    <div>Year:</div>
                    <div id="the-basics">
                        <?php
                            $rows = mysqli_query($conn, "SELECT * FROM tblyear");
                        ?>
                        <select class="form-control form-control-sm" id="Year" name="YearID">
                            <option value"" hidden selected>-----------------</option>
                            <?php
                                foreach ($rows as $row) {
                                ?>
                                <option value="<?php echo $row['YearID'] ?>"><?php echo $row['YearNameKH'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div>Semester:</div>
                    <div id="the-basics">
                        <select class="form-control form-control-sm" id="Semester" name="Semester">
                            <option value"" hidden selected>-----------------</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="1st+2nd">1st+2nd</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="label">School Fee($):</div>
                    <input class="form-control form-control-sm" type="text" id="SchoolFee" name="SchoolFee" />
                </div>
                <div class="col">
                    <div>Discount(%):</div>
                    <input class="form-control form-control-sm" id="Discount" name="Discount" type="text"
                        placeholder="" />
                </div>
                <div class="col">
                    <div>Amount($):</div>
                    <div id="bloodhound">
                        <input readonly class="form-control form-control-sm" id="Amount" name="Amount" type="text"
                            placeholder="">
                    </div>
                </div>
                <div class="col">
                    <div>Paid($):</div>
                    <div id="bloodhound">
                        <input readonly class="form-control form-control-sm" id="Paid" name="Paid" type="text"
                            placeholder="">
                    </div>
                </div>
                <div class="col">
                    <div>Amount Lack($):</div>
                    <div id="bloodhound">
                        <input class="form-control form-control-sm" value="<?php echo 0 ?>" id="AmountLack" name="AmountLack" type="text"
                            placeholder="">
                    </div>
                </div>
                <div class="col">
                    <div>Return Date:</div>
                    <div id="bloodhound">
                        <input class="form-control form-control-sm" name="ReturnDate" type="date" placeholder="">
                    </div>
                </div>
                <div class="col-sm-8" style="margin-top: 5px">
                    <div>Description:</div>
                    <div id="bloodhound">
                        <input class="form-control form-control-sm" name="Description" type="text" placeholder="">
                    </div>
                </div>
                <div class="col-sm-4" style="margin-top: 5px">
                    <div>Remark:</div>
                    <div id="bloodhound">
                        <input class="form-control form-control-sm" name="Remark" type="text" placeholder="">
                    </div>
                </div>
            </div>
            <?php
                $Date = date("Y-m-d");
            ?>
            <input class="form-control form-control-sm" hidden value="<?php echo $Date ?>" name="PaidDate"
                type="date" placeholder="">
            <input class="form-control form-control-sm" hidden name="SchoolFeeID" type="text" placeholder="">
            <br />
            <div class="text-center mb">
                <button type="submit" name="btnPaid" class="btn btn-primary btn-sm">Save</button>
                <button type="reset" name="btnPaid" class="btn btn-secondary btn-sm">Reset</button>
            </div>

        </form>
    </div>
</div>
<!-- List SchoolFee -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <div style="margin-top: 5px">
                <h5 class="float-start">បញ្ជី បង់ថ្លៃសាលា</h5>
            </div>
            <table class="table table-sm table-striped table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>
                            No
                        </th>
                        <th>
                            Year
                        </th>
                        <th>
                            Semester
                        </th>
                        <th>
                            Fees
                        </th>
                        <th>
                            Discount
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                            Paid
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            AmountLack
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody id="DataTable">
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    $content = ob_get_clean();
    include BASE_PATH . 'views/admin/master.php';
?>
<!-- Modal Confirm Delete -->
<div class="mt-3">
    <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <hr />
            <div class="modal-body">Are you sure you want to delete this record?
                This action can't be undone.</div>
            <hr />
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <a id="confirmDelete" class="btn btn-sm btn-danger" href="#">Confirm</a>
                <!-- <button type="submit" ></button> -->
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Modal Confirm Delete -->

  <!-- Receipt Modal -->
  <div class="modal fade" id="largeModal" tabindex="-1" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel3">Receipt Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                            <div class="modal-body">
            <h4 class="title text-center"> Invoice</h4>
            <!-- Receipt details will be populated dynamically here -->
            <table class="table table-sm table-bordered">
              <thead class="text-centerv table-secondary">
                <tr>
                  <th>No</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Paid</th>
                  <th>Date</th>

                </tr>
              </thead>
              <tbody id="receiptTableBody">
                <!-- <tr>
                  <td>1</td>
                  <td> Software Engineering - [Bachelor]-[Batch V]-[Y1]-[S1]-[Afternoon]-[Campus 1]
                  </td>
                  <td>1</td>
                  <td>$</td>
                  <td>$</td>
                </tr> -->

              </tbody>
            </table>
            <br /><br />
            <div class="signature-container">
              <div class="left-signature">
                 -----------------------------------------
                <p>Customer's Signature & Name</p>
                <!-- Add the customer's signature element here if needed -->
              </div>
              <div class="right-signature">
                ------------------------------------
                <p>
                  Seller's Signature & Name
                </p>
                <!-- Add the seller's signature element here if needed -->
              </div>
            </div>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <h4 class="title text-center"> Invoice</h4>

            <table class="table table-sm table-bordered">
              <thead class="text-center table-secondary">
                <tr>
                  <th>No</th>
                  <th>Description</th>
                  <th>Amount</th>
                  <th>Paid</th>
                  <th>Date</th>

                </tr>
              </thead>
              <tbody id="receiptTableBody1">
              </tbody>
            </table>
            <br /><br />
            <div class="signature-container">
              <div class="left-signature">
                -----------------------------------------
                <p>Customer's Signature & Name</p>
                <!-- Add the customer's signature element here if needed -->
              </div>
              <div class="right-signature">
                ------------------------------------
                <p>Seller's Signature & Name</p>
                <!-- Add the seller's signature element here if needed -->
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">
            Close
            </button>
          <!-- <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button> -->
            <button type="button" class="btn btn-primary btn-sm" onclick="printReceipt()">Print</button>
          </div>
      </div>
    </div>
  </div>
  <!-- End of Modal Receipt -->

  <!-- Script DataTable -->
  <script type="text/javascript">
    $(document).ready(function () {
      $("#live_search_student").keyup(function () {
        var input = $(this).val().trim();
        if (input !== "") {
          $.ajax({
            url: "liveSearchSchoolFee.php",
            method: "POST",
            data: { input: input },
            success: function (data) {
              //console.log(data);
              var result = JSON.parse(data);
              if (result.status === "success") {
                $("#NameInLatin").html(result.NameInLatin);
                $("#ProgramID").html(result.ProgramID);
                $("#AcademicProgram").html(result.AcademicProgram);
                var feeTableBody = "";
                if (result.fees.length > 0) {
                  for (var i = 0; i < result.fees.length; i++) {
                    var fee = result.fees[i];
                    var discount = (fee.Discount != null && parseFloat(fee.Discount) !== 0) ? parseFloat(fee.Discount).toFixed(2) : '0';
                    feeTableBody += `
                    <tr>
                      <td>${i + 1}</td>
                      <td>${fee.YearID}</td>
                      <td>${fee.Semester}</td>
                      <td>$${fee.SchoolFee}</td>
                      <td>${discount} %</td>
                      <td>$${fee.Amount}</td>
                      <td>$${fee.Paid}</td>
                      <td>${fee.Description}</td>
                      <td>$${fee.AmountLack}</td>
                      <td>
                      <a href="#" class="edit-btn" data-id="${fee.SchoolFeeID}" style='text-decoration:none;' >
                        <i class="bi bi-pencil-square"></i>
                      </a>
                        &nbsp;
                        <a href='javascript:void(0);' data-bs-toggle="modal" data-bs-target="#basicModal" class="btnDelete"  data-id='${fee.SchoolFeeID}' style='color:red; text-decoration:none;' href="actionSchoolFee.php?DeleteID=${fee.SchoolFeeID}" id="edit-btn" name="btnDelete" style="color:red;">
                          <i class="bi bi-trash"></i>
                        </a>
                        &nbsp;
                        <a type="button" style="text-decoration:none;" data-bs-toggle="modal" data-bs-target="#largeModal" data-schoolfeeid="${fee.SchoolFeeID}" class="text-info open-modal">
                          <i class="bi bi-printer-fill text-success"></i>
                        </a>
                      </td>
                    </tr>
                  `;
                  }
                  $("#DataTable").html(feeTableBody);
                } else {
                  $("#DataTable").html("<tr><td colspan='10' class='text-danger text-center' >No data available.</td></tr>");
                }
              } else {
                $("#NameInLatin").html("");
                $("#AcademicProgram").html("");
                $("#DataTable").html("<tr><td colspan='10' class='text-danger text-center' >Sorry! We couldn't find any results matching your search.</td></tr>");
              }
            },
            error: function () {
              alert("An error occurred while processing your request. Please try again.");
            }
          });
        } else {
          $("#NameInLatin").html("");
          $("#ProgramID").html("");
          $("#AcademicProgram").html("");
          $("#DataTable").html("");
        }
      });
    });
  </script>
  <!-- End of Script DataTable -->

  <!-- Script Confirm Del & Print Receipt -->
  <script>
    // Confirm Delete
    $("#DataTable").on("click", ".btnDelete", function () {
      var deleteId = $(this).data('id');
      //alert(deleteUrl);
      var deleteUrl = 'actionSchoolFee.php?DeleteID=' + deleteId;
      $('#confirmDelete').attr('href', deleteUrl);
    });

    $('#DataTable').on('click', '.open-modal', function () {
      var schoolFeeID = $(this).data('schoolfeeid');
      //alert(schoolFeeID);

      // Perform AJAX call to fetch specific row data
      $.ajax({
        url: 'getReceiptDetails.php',
        method: 'POST',
        data: { schoolFeeID: schoolFeeID },
        success: function (data) {
          console.log(data);
          var feeDetails = data; // Assuming data directly contains the array

          // Populate modal table with fetched data
          var modalTableBody = '';
          for (var i = 0; i < feeDetails.length; i++) {
            modalTableBody += '<tr>';
            modalTableBody += '<td>' + (i + 1) + '</td>'; // Assuming this is dynamically generated
            modalTableBody += '<td>' + feeDetails[i].Description + '</td>';
            modalTableBody += '<td>$' + feeDetails[i].Amount + '</td>';
            modalTableBody += '<td>' + feeDetails[i].Paid + '</td>';
            modalTableBody += '<td>' + feeDetails[i].PaidDate + '</td>';
            modalTableBody += '</tr>';
          }

          $('#receiptTableBody').html(modalTableBody);
          $('#receiptTableBody1').html(modalTableBody);
        },
        error: function () {
          alert('An error occurred while fetching data.');
        }
      });
    });
    function printReceipt() {
      var printContents = document.querySelector("#largeModal .modal-body").innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>

  <!-- Script edit & Payment -->
  <script>
    $(document).on('click', '.edit-btn', function (e) {
      e.preventDefault();
      var feeID = $(this).data('id');

      $.ajax({
        url: 'getSchoolFeeDetails.php', // The PHP script to fetch the details
        method: 'GET',
        data: { SchoolFeeID: feeID },
        success: function (data) {
          var result = JSON.parse(data);
          if (result.status === "success") {
            $('#live_search_student').val(result.data.StudentStatusID);
            //$('#SchoolFeeID').val(result.data.SchoolFeeID);
            $('#Year').val(result.data.YearID);
            $('#Semester').val(result.data.Semester);
            $('#SchoolFee').val(result.data.SchoolFee);
            $('#Discount').val(result.data.Discount);
            $('#Amount').val(result.data.Amount);
            $('input[name="Paid"]').val(result.data.Paid);
            $('input[name="AmountLack"]').val(result.data.AmountLack);
            $('input[name="ReturnDate"]').val(result.data.ReturnDate);
            $('input[name="Description"]').val(result.data.Description);
            $('input[name="Remark"]').val(result.data.Remark);
            $('input[name="PaidDate"]').val(result.data.PaidDate);
            $('input[name="SchoolFeeID"]').val(result.data.SchoolFeeID);
          } else {
            alert("No data found!");
          }
        },
        error: function () {
          alert("An error occurred while fetching data.");
        }
      });
    });
    //Payment
    $(document).ready(function () {
      function calculateAmount() {
        var SchoolFee = parseFloat($('#SchoolFee').val()) || 0;
        var Discount = parseFloat($('#Discount').val()) || 0;
        var AmountLack = parseFloat($('#AmountLack').val()) || 0.00;
        var DiscountAmount = (Discount / 100) * SchoolFee;
        var Amount = SchoolFee - DiscountAmount;
        var Paid = Amount;
        var NewPaid = Paid - AmountLack;

        $('#Amount').val(Amount); // Display amount with 2 decimal places
        $('#Paid').val(NewPaid); // Display amount with 2 decimal places
        // $('#Amount').val(Amount.toFixed(2)); // Display amount with 2 decimal places
      }


      $('#SchoolFee, #Discount, #AmountLack').keyup(function () {
        calculateAmount();
      });

      // Optionally, if you want to calculate the amount on page load
      calculateAmount();

      // Reload student data if StudentStatusID is present
      var studentStatusID = $('#live_search_student').val();
      if (studentStatusID) {
        $("#live_search_student").keyup();
      }
    });

  </script>
<!-- Script confirm delete -->
<script>
    $(document).ready(function() {
        $('.btnDelete').on('click', function() {
            var deleteId = $(this).data('id');
            var deleteUrl = '<?php echo BASE_URL ?>actions/YearAction.php?id=' + deleteId;
            $('#confirmDelete').attr('href', deleteUrl);
        });
    });
</script>