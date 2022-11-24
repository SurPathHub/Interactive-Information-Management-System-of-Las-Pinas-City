<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header bg-info">
                    <h3 class="card-title">View All Posts</h3>
                </div>
                <!-- /.card-header -->

                <!-- ADD ITEM BUTTON -->

                <buttton class="btn btn-lg btn-success" data-toggle="modal" data-target="#form_modal"><span class="fas fa-plus"></span> ADD POST</buttton>
            </div>

            <!-- ADD IMAGE MODAL -->
            <div class="modal fade" id="form_modal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h3 class="modal-title">Add Post to News</h3>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-12 ">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="PostTitle">Post Title</label>
                                            <input type="text" id="inputName" class="form-control" name="post_title" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="PostCategory">Post Category</label>
                                            <select class="custom-select" name="post_category_id" required>
                                                <?php
                                                $query = "SELECT * FROM categories";
                                                $select_all_cat = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_assoc($select_all_cat)) {
                                                    $cat_title = $row['cat_title'];
                                                    $cat_id = $row['cat_id'];

                                                    echo "<option value='$cat_id'> {$cat_title}</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Post Author</label>
                                            <input type="text" id="inputName" class="form-control" name="post_author" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="PostCategory">Post Status</label>
                                            <select class="custom-select" name="post_status" required>
                                                <option value="draft" active>Select Status</option>
                                                <option value="published">Publish</option>
                                                <option value="draft">Draft</option>
                                                <option value="resubmit for approval">resubmit for approval</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputClientCompany">Post Image</label>
                                            <div id="selectedBanner"></div>

                                            <input type="file" class="form-control" id="img" name="post_image" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="PostTags">Post Tags</label>
                                            <input type="text" id="inputName" class="form-control" name="post_tags" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="PostTags">Post Desc</label>
                                            <textarea name="" id="" cols="30" rows="5" class="form-control" name="post_desc" required></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="PostCOntent">Post Content</label>
                                            <textarea name="post_content" id="summernote" class="form-control" required></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br style="clear:both;" />
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                <button class="btn btn-primary" name="submit_post"><span class="glyphicon glyphicon-save"></span> Submit</button>
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

                                <input type="hidden" name="img_id" id="delete_id">

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

                                <input type="hidden" name="post_id" id="delete_id">

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

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Images</h3>
                    </div>
                    <!-- /.card-header -->
                    <?php insertPost(); ?>
                    <?php deletePost(); ?>

                    <div class="card-body">

                        <table id="postTable" class="table table-head-fixed table-bordered table-striped">

                            <thead>


                                <tr>

                                    <th><input type="checkbox">ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>


                                    <th></th>



                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $query = "SELECT * FROM posts ORDER BY post_id DESC";
                                $all_post_query = mysqli_query($connection, $query);
                                if (!$all_post_query) {
                                    die("CONNECTION FAILED" . " " . mysqli_error($connection));
                                }
                                while ($row = mysqli_fetch_array($all_post_query)) {
                                    $post_id = $row["post_id"];
                                    $post_category_id = $row["post_category_id"];
                                    $post_title = $row["post_title"];
                                    $post_author = $row["post_author"];
                                    $post_date = date("F j, Y, g:i a", strtotime($row["post_date"]));
                                    $post_image = $row["post_image"];
                                    $post_tags = $row["post_tags"];
                                    $post_status = $row["post_status"];


                                    $query1 = "SELECT * FROM post_comments WHERE comment_post_id = {$post_id}";
                                    $query1 .= "AND comment_status = 'approved' ";
                                    $select_comment_query = mysqli_query($connection, $query);
                                    $post_comment_count = mysqli_num_rows($select_comment_query);

                                    $query = "SELECT * FROM categories WHERE cat_id =  $post_category_id";
                                    $all_cat_query = mysqli_query($connection, $query);
                                    if (!$all_cat_query) {
                                        die("CONNECTION FAILED" . " " . mysqli_error($connection));
                                    }
                                    while ($row = mysqli_fetch_array($all_cat_query)) {
                                        $post_category = $row["cat_title"];

                                ?>
                                        <tr>
                                            <td><?php echo $post_id; ?></td>
                                            <td><?php echo "<img src='$post_image' height='100px' width='100px' alt='posts_image'>"; ?></td>
                                            <td><a href='../../singleNews.php?an_id=<?php echo $post_id; ?>' target="_blank"><?php echo $post_title ?></td>
                                            <td><?php echo $post_category; ?></td>
                                            <td><?php echo $post_status; ?></td>



                                            <td><button class='btn btn-sm btn-secondary' data-toggle='modal' data-target="#viewImage<?php echo $post_id ?>"><i class='fas fa-eye'></i></button><a class='btn  btn-sm  btn-primary' href="posts.php?source=edit_post&an_edit=<?php echo $post_id; ?>"><i class='fas fa-pen'></i><small class='align-self-end'>Edit</small></a><button class="btn  btn-sm  btn-danger" data-toggle="modal" data-target="#modal<?php echo $post_id; ?>"><i class='fas fa-trash'></i><small class='align-self-end'>Delete</small></button></td>




                                            <!-- View Image Modal -->
                                            <div class="modal fade" id="viewImage<?php echo $post_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <!-- w-100 class so that header div covers 100% width of parent div -->
                                                            <h5 class="modal-title w-100" id="exampleModalLabel"><strong>Post Details
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">
                                                                    ×
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <!--Modal body with image-->
                                                        <div class="modal-body">
                                                            <div class="red"></div>
                                                            <div class="row">
                                                                <div class="col-6 align-items-around justify-content-around d-flex mb-5 mb-lg-0">
                                                                    <div class="form-group ">
                                                                        <img src="<?php echo $post_image ?>" height="450" width="400" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 align-items-around justify-content-around d-flex mb-5 mb-lg-0">
                                                                    <div class="blockabout">
                                                                        <div class="blockabout-inner text-left text-sm-start">

                                                                            <div class="">
                                                                                <span class="text-small text-muted">Title:</span>
                                                                                <h3><strong><?php echo $post_title ?></strong></h3>
                                                                                <hr>
                                                                            </div>
                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Author:</span>
                                                                                <h4><?php echo $post_author ?></h4>
                                                                                <hr>
                                                                            </div>
                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Category:</span>
                                                                                <h4><?php echo $post_category ?></h4>
                                                                                <hr>
                                                                            </div>
                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Status:</span><br>
                                                                                <span class="badge badge-success"><?php echo $post_status ?></span>
                                                                                <hr>
                                                                            </div>
                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Post Tags:</span>
                                                                                <h4><?php echo $post_tags; ?></h4>
                                                                                <hr>
                                                                            </div>

                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Comment Count:</span>
                                                                                <h4><?php echo $post_comment_count; ?></h4>
                                                                                <hr>
                                                                            </div>
                                                                            <p> <span class="text-small text-muted">Date:</span>
                                                                                <span><?php echo $post_date ?></span>
                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>


                                        <div class="modal fade" id="modal<?php echo $post_id; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">System Information</h3>
                                                    </div>
                                                    <div class="modal-body">

                                                        <h3 class="text-danger text-center">Are you sure you want to delete this Post?</h3>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="functions.php?mem_id=<?php echo $post_id; ?>" class="btn btn-danger">Yes</a>
                                                        <button class="btn btn-primary" type="button" data-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <?php }
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>

                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>

                                    <th></th>



                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
</div>
</section>
</div>