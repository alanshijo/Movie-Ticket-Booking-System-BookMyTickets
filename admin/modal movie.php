<div class="col">
              <!-- USER DATA-->
              <div class="user-data m-b-30">

                <button type="button" class="btn btn-success" style="float: right; margin: 15px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                  <i class="fa fa-plus"></i>&nbsp; Add movie</button>
                <h3 class="title-3 m-b-30">
                  <i class="zmdi zmdi-account-calendar"></i>Movie data
                </h3>
                <div class="table-responsive table-data">
                  <table id="movieTable" class="table">
                    <thead>
                      <tr>
                        <th>Sl.No.</th>
                        <th>Poster image</th>
                        <th>Title</th>
                        <th>Language</th>
                        <th>Certificate</th>
                        <th>Total runtime</th>
                        <th>Release date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $selectmovie = "SELECT * FROM `tbl_movies`";
                      $selectmovie_run = mysqli_query($conn, $selectmovie);
                      $i = 1;
                      while ($movie = mysqli_fetch_array($selectmovie_run)) {
                      ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><img src="uploads/<?php echo $movie['movie_poster']; ?>" alt="poster"></td>
                          <td><?php echo $movie['movie_name']; ?></td>
                          <td><?php echo $movie['movie_lang']; ?></td>
                          <td><?php echo $movie['movie_certificate']; ?></td>
                          <td><?php echo $movie['movie_runtime']; ?></td>
                          <td><?php echo $movie['movie_releasedate']; ?></td>
                          <td>
                            <a href="" class="fa fa-edit"></a>&ensp;
                            <a href="" class="fa fa-trash"></a>
                          </td>
                        </tr>
                      <?php
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- END USER DATA-->
            </div>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter movie details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="errorMessage" class="alert alert-warning d-none"></div>
                    <form id="saveStudent">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Poster image</label>
                        <input type="file" class="form-control" name="poster" id="poster" accept=".jpg">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter movie name here">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Language</label>
                        <select name="lang" id="lang" class="form-control">
                          <option hidden>Select language</option>
                          <option value="English">English</option>
                          <option value="Malayalam">Malayalam</option>
                          <option value="Tamil">Tamil</option>
                          <option value="Hindi">Hindi</option>
                          <option value="Telugu">Telugu</option>
                          <option value="Kannada">Kannada</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Certificate</label>
                        <select name="certificate" id="certificate" class="form-control">
                          <option hidden>Select certificate type</option>
                          <option value="U">U certificate</option>
                          <option value="U/A">U/A certificate</option>
                          <option value="A">A certificate</option>
                          <option value="S">S certificate</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Total runtime</label>
                        <input type="text" name="runtime" class="form-control" id="runtime" placeholder="00hr 00min">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Release date</label>
                        <input type="date" name="release" class="form-control" id="release" placeholder="DD/MM/YYYY">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="addmovie" id="addmovie" class="btn btn-success">Add</button>
                  </div>
                </div>
              </div>
            </div>