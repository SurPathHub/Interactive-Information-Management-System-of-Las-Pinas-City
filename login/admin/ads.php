<!-- Admin Header -->
<?php include "includes/admin_header.php"; ?>


<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div> -->

<!-- Navbar -->
<?php include "includes/admin_navbar.php"; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include "includes/admin_sidebar_menu.php"; ?>

<style>
  /* Content of modal div is center aligned */
  .modal {
    text-align: center;
  }
</style>
<!-- CONTENT WRAPPER. CONTAINS PAGE CONTENT -->
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- CATEGORY FORM -->
        <div class="card card-primary col-12">
          <div class="card-header">
            <h3 class="card-title">Manage ADS</h3>
          </div>

          <!-- ADD ITEM BUTTON -->

          <buttton class="btn btn-lg btn-success" data-toggle="modal" data-target="#form_modal"><span class="fas fa-plus"></span> ADD</buttton>
        </div>

        <!-- ADD IMAGE MODAL -->
        <div class="modal fade" id="form_modal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                  <h3 class="modal-title">Add Advertisement</h3>
                </div>
                <div class="modal-body">
                  <div class="col-md-2"></div>
                  <div class="col-md-12 ">

                    <div class="form-group text-left">
                      <label>Image:</label>
                      <div id="selectedBanner"></div>
                      <input type="file" class="form-control" name="ads_image" id="ads_image" required="required" />
                    </div>
                    <div class="form-group text-left">
                      <label>Title</label>
                      <input type="text" class="form-control" name="ads_title" required="required" />
                    </div>
                    <div class="form-group text-left">
                      <label>Product or Service Link</label>
                      <input type="text" class="form-control" name="ads_link" required="required" />
                    </div>

                  </div>
                </div>
                <br style="clear:both;" />
                <div class="modal-footer">
                  <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                  <button class="btn btn-primary" name="submit_ads"><span class="glyphicon glyphicon-save"></span> Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Delete Category Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>




              <form method="POST">

                <div class="modal-body">

                  <input type="hidden" name="ads_id" id="delete_id">

                  <h4> Do you want to Delete this Data ??</h4>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                  <button type="submit" name="delete_data" class="btn btn-primary"> Yes </butron>
                </div>
              </form>

            </div>
          </div>
        </div>

        <!-- List  of Category Table -->
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of Ads</h3>
            </div>
            <!-- /.card-header -->
            <?php insertAds(); ?>
            <?php updateAds(); ?>
            <?php deleteAds(); ?>
            <div class="card-body">
              <table id="adsTable" class="table table-head-fixed ">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Link</th>

                    <th></th>


                  </tr>
                </thead>
                <tbody>

                  <?php
                  $query = "SELECT * FROM ads ORDER BY ads_id DESC ";
                  $all_ads_query = mysqli_query($connection, $query);
                  if (!$all_ads_query) {
                    die("CONNECTION FAILED" . " " . mysqli_error($connection));
                  }
                  while ($row = mysqli_fetch_assoc($all_ads_query)) {
                    $ads_id = $row['ads_id'];
                    $ads_title = $row['ads_title'];
                    $ads_image = $row['ads_image'];
                    $ads_link = $row['ads_link'];


                  ?>
                    <tr>
                      <td> <?php echo $ads_id; ?> </td>
                      <td><?php echo "<img src='$ads_image' alt=''height='100px' width='100px'>"; ?> </td>
                      <td><?php echo $ads_title; ?> </td>
                      <td><a href="<?php echo $ads_link; ?>" target="_blank"><?php echo $ads_link; ?></a> </td>

                      <td><button class='btn btn-secondary' data-toggle='modal' data-target="#viewImage<?php echo $ads_id ?>"><i class='fas fa-eye'></i></button><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $ads_id ?>"><i class='fas fa-pen'></i></button><button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i></button></td>

                      <!-- View Image Modal -->
                      <div class="modal fade" id="viewImage<?php echo $ads_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- w-100 class so that header
                div covers 100% width of parent div -->
                              <h5 class="modal-title w-100" id="exampleModalLabel"><strong> <?php echo $ads_title; ?></strong>

                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                  ×
                                </span>
                              </button>
                            </div>
                            <!--Modal body with image-->
                            <div class="modal-body">
                              <img src="<?php echo $ads_image; ?>" width="50%" />
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- ========EDIT MODAL=========== -->
                      <div class="modal fade" id="edit<?php echo $ads_id ?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="POST" enctype="multipart/form-data" action="">
                              <div class="modal-header bg-info">
                                <h4 class="modal-title">Edit Advertisement</h4>
                              </div>
                              <div class="modal-body">

                                <div class="col-md-12">
                                  <div class="form-group">
                                    <h5 class="text-left">Current Photo</h5>
                                    <img src="<?php echo $ads_image; ?>" height="120" width="150" />
                                    <input type="hidden" name="previous" value="<?php echo $ads_image; ?>" />
                                    <hr>
                                    <h5 class="text-left">New Photo</h5>
                                    <input type="file" class="form-control" name="ads_image" value="<?php echo $ads_image; ?>" />
                                  </div>
                                  <div class="form-group text-left">
                                    <label for="editCategory">Title:</label>
                                    <div class="input-group">
                                      <input type="hidden" value="<?php echo $ads_id; ?>" name="ads_id" />
                                      <input type="text" class="form-control mb-3" name="ads_title" id="ads_title" value="<?php echo $ads_title; ?>">
                                    </div>
                                    <label for="editCategory">Link:</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control mb-3" name="ads_link" id="ads_link" value="<?php echo $ads_link; ?>">
                                    </div>

                                  </div>

                                </div>
                              </div>
                              <br style="clear:both;" />
                              <div class="modal-footer">
                                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                <button type="submit" class="btn btn-primary" name="update-ads"><span class="glyphicon glyphicon-save"></span> Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </tr>

                  <?php
                  } ?>
                </tbody>
              </table>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
    </div>

  </section>

</div>

<!-- /.content-wrapper -->




<!-- Admin Footer -->
<?php include "includes/admin_footer.php" ?>


<script>
  $(document).ready(function() {
    $('#adsTable').DataTable({
        autoWidth: false,
        columns: [{
            width: '5px'
          },
          {
            width: '50px'
          },
          {
            width: '50px'
          },
          {
            width: '50px'
          },
          {
            width: '50px'
          }
        ],
        order: false,
        "scrollY": "700px",
        "scrollCollapse": true,
        "paging": true,
        responsive: true,
        lengthChange: false,
        autoWidth: false,

        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      })
      .buttons()
      .container()
      .appendTo("#adsTable_wrapper .col-md-6:eq(0)");


  });
</script>


<!-- DISPLAY SELECTED IMAGE -->
<script>
  var selDiv = "";
  var storedFiles = [];
  $(document).ready(function() {
    $("#img").on("change", handleFileSelect);
    selDiv = $("#selectedBanner");
  });

  function handleFileSelect(e) {
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function(f) {
      if (!f.type.match("image.*")) {
        return;
      }
      storedFiles.push(f);

      var reader = new FileReader();
      reader.onload = function(e) {
        var html =
          '<img src="' +
          e.target.result +
          "\" data-file='" +
          f.name +
          "alt='Category Image'  width='20%'>";
        selDiv.html(html);
      };
      reader.readAsDataURL(f);
    });
  }
</script>
<script>
  $(document).ready(function() {

    // DELETE FUNCTION
    $('.deletebtn').on('click', function() {

      $('#deletemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[0]);

    });

  });
</script>

<!-- DISPLAY SELECTED IMAGE -->
<script>
  var selDiv = "";
  var storedFiles = [];
  $(document).ready(function() {
    $("#ads_image").on("change", handleFileSelect);
    selDiv = $("#selectedBanner");
  });

  function handleFileSelect(e) {
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function(f) {
      if (!f.type.match("image.*")) {
        return;
      }
      storedFiles.push(f);

      var reader = new FileReader();
      reader.onload = function(e) {
        var html =
          '<img src="' +
          e.target.result +
          "\" data-file='" +
          f.name +
          "alt='Category Image' width='40%' height='200px'>";
        selDiv.html(html);
      };
      reader.readAsDataURL(f);
    });
  }
  // ALERT FADE EFFECT
  $(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
  });
</script>
<script src="../dist/js/script.js"></script>