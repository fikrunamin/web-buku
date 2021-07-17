<?= $this->extend('templates/app') ?>

<?= $this->section('content') ?>
<div class="xl:container mx-auto px-4 mb-16">
    <div class="py-8 flex justify-between items-center">
        <h1 class="text-2xl">Dashboard</h1>
        <a href="<?=route_to('books.create')?>" class="flex items-center gap-x-3 py-2 px-5 bg-black text-white">Tambah Buku<i class="material-icons">add</i></a>
    </div>
    <div class="grid grid-cols-1 mb-1">
        <div class="bg-color-2 px-5">
            <?php foreach($book as $index => $buku):?>
            <div class="<?= $index != 0 ? 'border-t-4 border-white' : ''?> flex items-center gap-x-4 relative h-36">
                <div>
                    <img src="<?=base_url("img/buku/{$buku['sampul']}")?>" alt="" class="h-20 w-36 object-cover">
                </div>
                <div>
                    <h1 class="text-xl font-medium mb-1"><?=$buku['judul']?></h1>
                    <p class="text-sm text-gray-800"><?=$buku['penulis']?></p>
                    <div class="absolute bottom-5 right-5 flex gap-x-3 items-center">
                        <a href="<?=route_to('books.show', $buku['slug'])?>"><i class="material-icons-sharp">visibility</i></a>
                        <a href="<?=route_to('books.edit', $buku['id'])?>"><i class="material-icons-sharp">edit</i></a>
                        <form action="<?=route_to('books.destroy', $buku['id'])?>" method="post">
                            <?= csrf_field() ?>
                            <button type="submit" onclick="return confirm('Apakah anda yakin menghapus buku ini?')"><i class="material-icons-sharp text-red-800">delete</i></a>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector('#editor'))
        .catch( error => {
            console.error( error );
        } );
</script>
<?= $this->endSection() ?>
