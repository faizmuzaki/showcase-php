<?php include 'layout.php'; ?>
<div class="home">
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-jum">
            <h1 class="text-title">
                It's Himakom
                <span id="typed" style="color: #FAC213;"></span>
            </h1>
        </div>
    </div>
    <section id="about" class="about">
        <div class="custom-shape-divider-top">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="container-fluid py-5">
            <div class="row text-about">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                </div>
                <div class="col-md-5">
                    <h2 class="featurette-heading">Description</h2>
                    <p class="">
                        Himakom Project Showcase merupakan wadah untuk memamerkan atau memperkenalkan hasil projek maupun karya mahasiswa jurusan Ilmu Komputer FMIPA UNILA sebagai bentuk apresiasi terhadap projek dan karya yang telah di pamerkan.
                    </p>
                </div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" class="shape-fill"></path>
            </svg>
        </div>
    </section>

    <section class="showcase">
        <div class="container">
            <div class="row text-show">
                <div id="carouselExampleCaptions" class="carousel slide col-md-7" data-bs-ride="carousel">
                    <h2 class="">Latest Showcase</h2>
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class=""></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="active" aria-current="true"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner mt-3">
                    <?php 
                    $j = 0;
                    	$query = mysqli_query($sql, "SELECT project.id, project.projectDescription, project.judul,project.projectThumbnail, author.nama FROM project INNER JOIN author ON project.author = author.id_author ORDER BY project.id DESC LIMIT 3");
                    	while($i = mysqli_fetch_array($query)) {
                    ?>
                        <div class="carousel-item <?php if($j==0){echo"active";}?>">
                            <a href="detail.php?id=<?= $i['id'] ?>">
                                <img src="<?= $i['projectThumbnail'] ?>" class="d-block w-100" alt="{{sample.0.judul}}">
                            </a>
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?= $i['judul'] ?></h5>
                                <p><?= $i['projectDescription'] ?>.</p>
                            </div>
                        </div>
                         <?php $j++; ?>
                    <?php  } ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>


<?php include 'footer.php'; ?>