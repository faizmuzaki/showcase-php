<?php 
include 'layout.php'; 
?>
<div class="showcase">
    <div class="album py-5">
        <div class="container">
            <form class="row g-3" method="POST" action="">
                <div class="input-group py-3">
                    <div class="col-md-2">
                        <label for="search" class="visually-hidden">search</label>
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn">
							<i class='bx bx-search-alt'></i>
							<span class="visually-hidden">Button</span>
						</button>
                    </div>
                </div>
            </form>
<?php
if (isset($_POST['search'])) {
    $s = mysqli_escape_string($sql, $_POST['search']);
                $batas = 6;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;    
 
                $previous = $halaman - 1;
                $next = $halaman + 1;
                $data = mysqli_query($sql, "SELECT project.id, project.judul,project.projectThumbnail, author.nama FROM project INNER JOIN author ON project.author = author.id_author WHERE project.judul LIKE '%$s%'");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
                $pewpew = mysqli_query($sql,"SELECT project.id, project.judul,project.projectThumbnail, author.nama FROM project INNER JOIN author ON project.author = author.id_author WHERE project.judul LIKE '%$s%' limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
}else{

                $batas = 6;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;    
 
                $previous = $halaman - 1;
                $next = $halaman + 1;
                $data = mysqli_query($sql, "SELECT project.id, project.judul,project.projectThumbnail, author.nama FROM project INNER JOIN author ON project.author = author.id_author");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
                $pewpew = mysqli_query($sql,"SELECT project.id, project.judul,project.projectThumbnail, author.nama FROM project INNER JOIN author ON project.author = author.id_author limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
}
?>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php
                    if($pewpew) {
                    while($i = mysqli_fetch_array($pewpew)){
                ?>
                <div class="col">
                    <div class="card shadow-sm img-hover-zoom img-hover-zoom--basic">
                        <img src="<?=$i['projectThumbnail']?>">
                        <div class="card-body">
                            <p class="card-text"><?=$i['judul']?></p>
                            <div class="d-flex justify-content-between align-items-center ">
                                <div class="btn-group">
                                    <a href="detail.php?id=<?=$i['id']?>" class="btn btn-sm btn-outline-secondary px-2"><i class="bi bi-eye-fill"> </i>View</a>
                                </div>
                                <small><?=$i['nama']?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                } 
                }else{ ?>
                    <p>Not Found</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>«</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="showcase.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>  
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>»</a>
                </li>
					  </ul>
				</nav>
	</div>	
