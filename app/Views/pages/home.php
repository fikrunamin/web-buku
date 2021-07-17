<?= $this->extend('templates/app') ?>

<?= $this->section('content') ?>
<div class="bg-color-1 mb-10">
    <div class="xl:container mx-auto px-4">
        <div class="grid grid-cols-12 gap-4 h-96 ">
            <div class="col-span-6 text-left flex items-center">
                <div>
                    <h4 class="font-medium text-gray-700 tracking-widest">BUKU PILIHAN</h4>
                    <h1 class="text-6xl font-semibold mb-14 tracking-tight"><span class="font-light">Paling Populer</span><br>Bulan Ini</h1>
                    <a href="<?=route_to('books.popular')?>" class="py-4 px-10 bg-black text-white">Selengkapnya</a>
                </div>
            </div>
            <div class="col-span-6 flex items-center justify-center">
                <img src="<?= base_url('img/buku-jumbotron.png') ?>" alt="buku populer bulan ini">
            </div>
        </div>
    </div>
</div>
<div class="xl:container mx-auto px-4 mb-16">
    <div class="py-8 flex justify-between items-center">
        <h1 class="text-2xl">Paling Sering Dibaca</h1>
        <a href="<?=route_to('books.popular')?>" class="flex items-center gap-x-3">Lihat Semua<i class="material-icons">chevron_right</i></a>
    </div>
    <div class="grid grid-cols-5">
        <?php foreach($popular_books as $pb):?>
            <div class="border h-96 py-5 px-8">
                <div class="h-1/2 flex justify-center">
                    <img src="<?=base_url('img/buku/' . $pb['sampul'])?>" alt="" class="h-full object-cover">
                </div>
                <div class="h-1/2 pt-5">
                    <h1 class="text-xl font-medium mb-1"><?=$pb['judul']?></h1>
                    <p class="text-sm text-gray-800 mb-1"><?=$pb['penulis']?></p>
                    <a href="<?=route_to('books.show', $pb['slug'])?>" class="text-sm">Baca Sekarang</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="xl:container mx-auto px-4 mb-16">
    <div class="py-8 flex justify-between items-center">
        <h1 class="text-2xl">Buku Terbaru</h1>
        <a href="<?=route_to('books.all')?>" class="flex items-center gap-x-3">Lihat Semua<i class="material-icons">chevron_right</i></a>
    </div>
    <div class="grid grid-cols-6">
        <?php foreach($latest_books as $lb):?>
            <div class="border h-96 py-5 px-5">
                <div class="h-1/2 flex justify-center">
                    <img src="<?=base_url('img/buku/' . $lb['sampul'])?>" alt="" class="h-full object-cover">
                </div>
                <div class="h-1/2 pt-5">
                    <h1 class="text-xl font-medium mb-1"><?=$lb['judul']?></h1>
                    <p class="text-sm text-gray-800 mb-1"><?=$lb['penulis']?></p>
                    <a href="<?=route_to('books.show', $lb['slug'])?>" class="text-sm">Baca Sekarang</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>