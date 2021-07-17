<?= $this->extend('templates/app') ?>

<?= $this->section('content') ?>
<div class="xl:container mx-auto px-4 mb-16">
    <div class="py-8 flex justify-between items-center">
        <h1 class="text-2xl"><?=$judul?></h1>
        <div>
            <form action="<?=route_to('books.filter')?>" method="get">
                <select name="filter" class="border-2 mr-5 px-3 py-1 border-color-1">
                    <option value="created_at">Tanggal Dibuat</option>
                    <option value="judul">Judul Buku</option>
                    <option value="penulis">Penulis</option>
                </select>
                <select name="order_by" class="border-2 mr-5 px-3 py-1 border-color-1">
                    <option value="asc">A-Z</option>
                    <option value="desc">Z-A</option>
                </select>
                <button type="submit" class="px-3 py-1 bg-black text-color-1">Filter</button>
            </form>
        </div>
    </div>
    <div class="grid grid-cols-6">
        <?php foreach($book as $index => $buku):?>
            <div class="border max-h-96 py-5">
                <div class="h-1/2 flex justify-center">
                    <img src="<?=base_url("img/buku/{$buku['sampul']}")?>" alt="" class="h-full">
                </div>
                <div class="h-1/2 px-8 pt-5">
                    <h1 class="text-xl font-medium mb-1"><?= $buku['judul']?></h1>
                    <p class="text-sm text-gray-800 mb-1"><?= $buku['penulis']?></p>
                    <p class="text-xs text-gray-800 mb-1 flex items-center"><i class="material-icons-sharp text-sm mr-2">visibility</i> <?=$buku['views']?>x dilihat</p>
                    <a href="<?= route_to('books.show', $buku['slug'])?>" class="text-sm">Baca Sekarang</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>