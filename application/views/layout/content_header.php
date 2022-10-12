    <?php $uri1 =  $this->uri->segment(1); ?>
    <?php $uri2 =  $this->uri->segment(2); ?>
    <?php
    if (isset($uri1) && !isset($uri2)) {
        $judul = $uri1;
    } elseif (isset($uri1) && isset($uri2)) {
        $judul = $uri2;
    }


    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <?php if (isset($uri1) && !isset($uri1)) { ?>
                            $judul = $uri1;
                            <li class="breadcrumb-item active"><?= $uri1 ?></li>
                        <?php } elseif (isset($uri1) && isset($uri1)) { ?>

                            <li class="breadcrumb-item"><a href="#"><?= $uri1 ?></a></li>
                            <li class="breadcrumb-item active"><?= $uri2 ?></li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>