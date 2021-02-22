<?php

$database = \Config\Database::connect();

$semua_kategori = ['pengumuman','berita','pengajian','kegiatan'];
$all_post_parsial = [];

for($i=0;$i<count($semua_kategori);$i++){
    $category = $semua_kategori[$i];
    $all_post_parsial[$i]['kategori']= $category;
    $all_post_parsial[$i]['konten']= $database->table("tb_postingan")->select("kategori,judul,slug,thumbnail,created_at,updated_at")->where(['kategori'=>$category,'data_status'=>'ditampilkan'])->orderBy('updated_at', 'DESC')->limit(2)->get()->getResultArray();
    
}

function getElapsedTime($datetime){
    $interval = date_diff(date_create($datetime), date_create('now'));
    $tahun = $interval->y;
    $bulan = $interval->m;
    $hari = $interval->d;
    $jam = $interval->h;
    $menit = $interval->i;
    $detik = $interval->s;

    if($tahun>0){
        return $tahun." Tahun ".$bulan." Bulan";
    }elseif($bulan>0){
        return $bulan." Bulan ".$hari." Hari";
    }elseif($hari>0){
        return $hari." Hari ".$jam." Jam";
    }elseif($jam>0){
        return $jam." Jam ".$menit." Menit";
    }elseif($menit>=0){
        return $menit." Menit ".$detik." Detik";
    }
};

?>

<div class="sidebar">
    <?php foreach($semua_kategori as $sk) :?>
    <div class="sidebar-section">
        <div class="title d-flex justify-content-between">
            <span>
                <?= ucfirst($sk); ?>
            </span>
            <a href="<?= base_url($sk) ?>" class="d-block my-auto">Lihat semua ></a>
        </div>
        <div class="sidebar-section-body">
            <?php foreach($all_post_parsial as $ps) :?>
            <?php if($sk == $ps['kategori']) :?>
            <?php foreach($ps['konten'] as $p) :?>
            <a href="<?= base_url($p['kategori']."/".$p['slug']) ?>" class="kartu d-flex">
                <?php if($p['thumbnail']!="default.jpg") :?>
                <img src="<?= base_url("asset/images/thumbnails/".$p['thumbnail']) ?>" load="lazy" alt="...">
                <?php endif; ?>
                <div class="kartu-body">
                    <h6 class="mb-0" title="<?= $p['judul']; ?>">
                        <?= strlen($p['judul'])>50?substr($p['judul'],0,50)."..." : $p['judul']; ?></h6>
                    <?php if($p['created_at']==$p['updated_at']) :?>
                    <small class="text-muted font-italic"><i class="fa fa-clock"></i> Diposting
                        <?= getElapsedTime($p['created_at'])?> yang lalu
                    </small>
                    <?php else: ?>
                    <small class="text-muted font-italic"><i class="fa fa-clock"></i> Diupdate
                        <?= getElapsedTime($p['updated_at'])?> yang lalu
                    </small>
                    <?php endif; ?>
                </div>
            </a>
            <?php endforeach; ?>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>