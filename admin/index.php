<?php
  include '../init/db.php';
  session_start();
  if(isset($_GET['logout'])){
    session_destroy();
    header('Location: index.php');
  }
  if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($sql,$_GET['id']);
    mysqli_query($sql, "DELETE FROM project WHERE id='$id'");
    header('Location: index.php');
  }
	if(isset($_SESSION['username'])) {?>
	 <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Showcase</title>
    <link rel="stylesheet" href="../assets/css/app.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Showcase</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
              <div class="navbar-nav logo-top">
                <a class="nav-link" href="?logout">Logout</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <section class="section">
      <div class="container">
        <td>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Showcase</button>
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Showcase</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
              </div>
              <div class="modal-body">
          <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Judul</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Judul" name="jProject" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Link Youtube</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                placeholder="Link Youtube" name="lYoutube" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Link Cover</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Link Cover"
                                                name="lCover" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Link Github</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                name="github" placeholder="Link Github" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="form-select">Author</label>
                                            <select class="form-select" aria-label="Default select example" name="author">
                                            <option selected>Select</option>
                                            <?php 
                                              $query=mysqli_query($sql, "SELECT * FROM author");
                                              while ($at = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?=$at['id_author']?>"><?= $at['nama'] ?></option>
                                            <?php } ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Deskripsi</label>
                                            <textarea type="email" id="email-id-column" class="form-control"
                                                name="desc" placeholder="Deskripsi" required></textarea>
                                        </div>
                                    </div>
                                    <?php if (isset($_POST['send'])) {
                                      $jProject = mysqli_real_escape_string($sql,$_POST['jProject']);
                                      $lYoutube = mysqli_real_escape_string($sql,$_POST['lYoutube']);
                                      $lCover = mysqli_real_escape_string($sql,$_POST['lCover']);
                                      $github = mysqli_real_escape_string($sql,$_POST['github']);
                                      $author = mysqli_real_escape_string($sql,$_POST['author']);
                                      $desc = mysqli_real_escape_string($sql,$_POST['desc']);
                                      $g = "INSERT INTO project VALUES (NULL, '$jProject', '$lCover', '$lYoutube', '$github','$desc','$author')";
                                      $query = mysqli_query($sql, $g);
                                      if($query) {
                                        echo '<script> location.replace("index.php"); </script>';
                                      }
                                    } ?>
                              <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="send" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Add Author</button>
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Author</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">NPM</label>
                                            <input type="number" id="first-name-column" class="form-control"
                                                placeholder="NPM" name="npm" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Nama</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                placeholder="Nama" name="nama" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Angkatan</label>
                                            <input type="text" id="city-column" class="form-control" placeholder="Angkatan"
                                                name="angkatan" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="form-select">Program Studi</label>
                                            <select class="form-select" aria-label="Default select example" name="programStudi">
                                            <option selected>Select</option>
                                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                                                <option value="Ilmu komputer">Ilmu Komputer</option>
                                          </select>
                                        </div>
                                    </div>
                                    <?php if (isset($_POST['add'])) {
                                      $npm = mysqli_real_escape_string($sql,$_POST['npm']);
                                      $nama = mysqli_real_escape_string($sql,$_POST['nama']);
                                      $angkatan = mysqli_real_escape_string($sql,$_POST['angkatan']);
                                      $programStudi = mysqli_real_escape_string($sql,$_POST['programStudi']);
                                      $g = "INSERT INTO author VALUES (NULL, '$npm', '$nama', '$angkatan', '$programStudi')";
                                      $query = mysqli_query($sql, $g);
                                      if($query) {
                                       echo '<script> location.replace("index.php"); </script>';
                                      }

                                    } ?>
                              <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="add" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
        </div>
      </div>
      
    </div>
  </div>
        </td>
            <div class="row" id="basic-table">
                <div class="col-12 col-md-12 py-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Showcase List</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-lg">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Judul</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                        $data = mysqli_query($sql, "SELECT project.id, project.projectVideo,project.githubUrl, project.judul,project.projectThumbnail, author.nama, project.projectDescription FROM project INNER JOIN author ON project.author = author.id_author");
                                        $j=1;
                                            while($i = mysqli_fetch_array($data)){
                                            ?>
                                            <tr>
                                                <td><?=$j?></td>
                                                <td class="text-bold-500"><?=$i['nama'];?></td>
                                                <td class="text-bold-500"><?=$i['judul'];?></td>
                                                <td>
                                              <a href="" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#modal<?=$i['id']; ?>">Edit</a>
                                            <div class="modal fade" id="modal<?=$i['id']; ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Showcase</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Judul</label>
                                                                    <input type="text" class="form-control"
                                                                        value="<?php echo $i['judul']; ?>" name="newJudul" >
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                                                                    <textarea class="form-control"
                                                                        rows="5" name="newDesc"><?php echo $i['projectDescription']; ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Link Youtube</label>
                                                                    <input type="text" name="newlinkYT" class="form-control"
                                                                        value="<?php echo $i['projectVideo']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Link Cover</label>
                                                                    <input type="text" name="newlinkCover" class="form-control"
                                                                        value="<?php echo $i['projectThumbnail']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Link Github</label>
                                                                    <input type="text" name="newlinkGithub" class="form-control"
                                                                        value="<?php echo $i['githubUrl']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Author</label>
                                                                    <input type="text" class="form-control bg-light"
                                                                        value="<?php echo $i['nama']; ?>" aria-label="readonly input example" readonly>
                                                                    <input type="hidden" name="idP" value="<?= $i['id']; ?>">
                                                                </div>
                                                                <?php 
                                                                  if (isset($_POST['save'])) {
                                                                    $jProject = mysqli_real_escape_string($sql,$_POST['newJudul']);
                                                                    $lYoutube = mysqli_real_escape_string($sql,$_POST['newlinkYT']);
                                                                    $lCover = mysqli_real_escape_string($sql,$_POST['newlinkCover']);
                                                                    $github = mysqli_real_escape_string($sql,$_POST['newlinkGithub']);
                                                                    $desc = mysqli_real_escape_string($sql,$_POST['newDesc']);
                                                                    $id = mysqli_real_escape_string($sql,$_POST['idP']);
                                                                    $query = mysqli_query($sql, "UPDATE project SET judul = '$jProject', projectThumbnail = '$lCover', projectVideo = '$lYoutube', githubUrl = '$github', projectDescription = '$desc' WHERE project.`id` = '$id'");
                                                                    if($query) {
                                                                      echo '<script> location.replace("index.php"); </script>';
                                                                    }
                                                                  }
                                                                ?>
                                                                <div class="col-12 d-flex justify-content-end">
                                                                  <button type="submit" name="save" class="btn btn-primary me-1 mb-1">Save Changes</button>
                                                              </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <a href="?id=<?=$i['id'];?>" class="btn btn-sm btn-danger">Delete</a>
                                              </td>
                                            </tr>
                                          <?php $j++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </section>

	<?Php }else{?>
    <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="description" content="">
          <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
          <meta name="generator" content="Hugo 0.101.0">
          <title>Himakom</title>
          <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
          <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
          <link href="../assets/css/signin.css" rel="stylesheet">
          <meta name="theme-color" content="#712cf9">
        </head>
        <body class="text-center">
            <main class="form-signin w-100 m-auto">
              <form method="POST">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInput" placeholder="example" name="username" required>
                  <label for="floatingInput">username</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                  <label for="floatingPassword">Password</label>
                </div>
            <?php 
              if(isset($_POST['username'])) {
                $username = mysqli_real_escape_string($sql,$_POST['username']);
                $password = mysqli_real_escape_string($sql,$_POST['password']);
                $query = mysqli_query($sql, "SELECT * FROM admin WHERE username = '$username' AND password='$password'");
                if(mysqli_fetch_array($query)){
                  $_SESSION['username'] = $username;
                  header("Refresh:0");
                }else{?>
                  <div>
                    <p type="button" class="btn btn-outline-danger">Invalid</p>
                  </div>
              <?php
                }
              }
              ?>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
               </form>
            </main>
          </body>
<?php } ?>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>
