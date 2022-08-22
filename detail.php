<?php 
include 'layout.php'; 

if(!empty($_GET['id'])) {
    $id = mysqli_real_escape_string($sql, $_GET['id']);
   $djaya = mysqli_query($sql, "SELECT project.id, project.judul, project.projectVideo,project.githubUrl,project.projectDescription, author.nama, author.npm, author.angkatan, author.programStudi FROM project INNER JOIN author ON project.author = author.id_author WHERE project.id = '$id'");
   if($i = mysqli_fetch_array($djaya)){
?>
<div class="detail">
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12 text-center my-3">
                    <h2><?= $i['judul'];?></h2>
                </div>
            </div>
            <div class="row">
                <div class="py-3 col-md-7">
                    <iframe style="width:100%; height:445px;" src="<?=$i['projectVideo'];?>"></iframe>
                </div>
                <div class="py-3 col-md-4">
                    <table class="table table-borderless">
                        <tr>
                            <td class="link-45deg"><i class="bi bi-link-45deg"></i></i> <a class="text-decoration-none" href="<?= $i['githubUrl'];?>"><?= $i['githubUrl'];?></a></td>
                        </tr>
                    </table>
                    <h5 class="text-heading">Author</h5>
                    <table class="table table-borderless">
                        <tr>
                            <td class="col-2">Nama</td>
                            <td class="col-1">:</td>
                            <td><?= $i['nama'];?></td>
                        </tr>
                        <tr>
                            <td class="col-2">NPM</td>
                            <td class="col-1">:</td>
                            <td><?= $i['npm'];?></td>
                        </tr>
                        <tr>
                            <td class="col-2">Angkatan</td>
                            <td class="col-1">:</td>
                            <td><?= $i['angkatan'];?></td>
                        </tr>
                        <tr>
                            <td class="col-2">Program Studi</td>
                            <td class="col-1">:</td>
                            <td><?= $i['programStudi'];?></td>
                        </tr>
                    </table>
                    <h5 class="text-heading" style="padding-top: 1rem!important;">Project Description</h5>
                    <table class="table table-borderless">
                        <tr>
                            <td class="text-description"><?= $i['projectDescription'];?></td>
                        </tr>
                    </table>
                    <!-- <div class="">Nama: {{ project.author.nama }}</div>
                    <div class="">NPM: {{ project.author.npm }}</div>
                    <div class="">Angkatan: {{ project.author.angkatan }}</div>
                    <div class="">Program Studi: {{ project.author.program_studi }}</div>
                    <div class="">{{ project.deskripsi }}</div>
                    <div class="">
                        <a href="{{ project.link_github }}">{{ project.link_github }}</a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

    <?php 
    }else{
            header('Location:index.php?page=showcase');
        } 
        }else{
            header('Location:index.php?page=showcase');
        } 
    ?>
<?php include 'footer.php'; ?>