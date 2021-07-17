<?= $this->extend('templates/app') ?>

<?= $this->section('content') ?>
<div class="xl:container mx-auto px-4 mb-16" id="app">
    <div class="py-8 flex justify-between items-center">
        <h1 class="text-2xl"><a href="<?=route_to('books.all')?>" class="border-b-2 border-black">Buku</a> / Judul Buku</h1>
    </div>
    <div class="grid grid-cols-1 gap-y-5">
        <div class="flex justify-center">
            <img src="<?=base_url('img/buku/' . $book['sampul'])?>" alt="" class="h-72 object-cover w-72">
        </div>
        <div class="text-center">
            <h1 class="text-xl font-medium mb-1"><?=$book['judul']?></h1>
            <p class="text-sm text-gray-800 mb-1">Oleh <?=$book['penulis']?> &middot; <?=\Carbon\Carbon::parse($book['created_at'])->diffForHumans()?></p>
            <p class="text-sm text-gray-800 mb-1 flex items-center justify-center"><i class="material-icons-sharp text-sm mr-2">visibility</i> <?=$book['views']?>x dilihat</p>
        </div>
        <div class="leading-loose">
            <?=$book['isi']?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>