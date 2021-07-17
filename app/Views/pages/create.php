<?= $this->extend('templates/app') ?>

<?= $this->section('content') ?>
<div class="xl:container mx-auto px-4 mb-16" id="app">
    <div class="py-8 flex justify-between items-center">
        <h1 class="text-2xl"><a href="<?=route_to('books.dashboard')?>" class="border-b-2 border-black">Dashboard</a> / Buat Buku</h1>
    </div>
    <div class="grid grid-cols-2 mb-16">
        <div class="col-span-2 bg-color-1 p-10">
            <form action="<?= route_to('books.store') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-5">
                    <label class="text-lg">Sampul Buku</label><br>
                    <input type="file" class="focus:outline-none px-5 py-2 w-full mt-2" name="sampul" value="<?=old('sampul') ?? ''?>">
                    <?php if($validation->hasError('sampul')): ?>
                        <p class="text-red-900 mt-1"><?= $validation->getError('sampul')?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-5">
                    <label class="text-lg">Judul</label><br>
                    <input type="text" class="focus:outline-none px-5 py-2 w-full mt-2" name="judul" placeholder="Masukkan judul" value="<?=old('judul') ?? ''?>">
                    <?php if($validation->hasError('judul')): ?>
                        <p class="text-red-900 mt-1"><?= $validation->getError('judul')?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-5">
                    <label class="text-lg">Penulis</label><br>
                    <input type="text" class="focus:outline-none px-5 py-2 w-full mt-2" name="penulis" placeholder="Masukkan penulis" value="<?=old('penulis') ?? ''?>">
                    <?php if($validation->hasError('penulis')): ?>
                        <p class="text-red-900 mt-1"><?= $validation->getError('penulis')?></p>
                    <?php endif; ?>
                </div>
                <div class="">
                    <label class="mb-10">Isi Buku</label>
                    <div class="h-2"></div>
                    <textarea name="isi" placeholder="Ceritakan isi buku disini" id="editor"><?=old('isi') ?? ''?></textarea>
                    <?php if($validation->hasError('isi')): ?>
                        <p class="text-red-900 mt-1"><?= $validation->getError('isi')?></p>
                    <?php endif; ?>
                </div>
                <div class="text-right">
                    <button type="submit" class="py-2 px-5 bg-black text-white text-sm mt-5">Simpan</button>
                </div>
            </form>
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