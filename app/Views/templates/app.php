<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: "Poppins";
        }
        .bg-color-1{
            background-color: #B5EAEA;
        }
        .bg-color-2{
            background-color: #EDF6E5;
        }
        .bg-color-4{
            background-color: #FFBCBC;
        }
        .bg-color-4{
            background-color: #F38BA0;
        }
        .text-color-1{
            color: #B5EAEA;
        }
        .text-color-2{
            color: #EDF6E5;
        }
        .text-color-3{
            color: #FFBCBC;
        }
        .text-color-4{
            color: #F38BA0;
        }
        .border-color-1{
            border-color: #B5EAEA;
        }
        .border-color-2{
            border-color: #EDF6E5;
        }
        .border-color-3{
            border-color: #FFBCBC;
        }
        .border-color-4{
            border-color: #F38BA0;
        }

    </style>

    <title><?= $title ?></title>
</head>
<body class="relative">
    <!-- Navbar -->
    <div class="grid grid-cols-1">
        <div class="px-4 xl:px-12">
            <div class="flex items-center justify-between h-28">
                <div class="flex gap-x-20">
                    <div class="text-xl font-bold">
                        <a href="<?=route_to('books.home')?>" class="flex items-center gap-x-3">
                            <i class="material-icons text-color-1">auto_stories</i>
                            Baca Buku
                        </a>
                    </div>
                    <div class="flex items-center gap-x-8 font-medium">
                        <div class="<?=service('uri')->getSegment(1) == '' ? 'border-b-2 border-black' : ''?>"><a href="<?=route_to('books.home')?>">Beranda</a></div>
                        <div class="<?=service('uri')->getSegment(1) == 'books' || service('uri')->getSegment(1) == 'book' ? 'border-b-2 border-black' : ''?>"><a href="<?=route_to('books.all')?>">Buku</a></div>
                        <div class="<?=service('uri')->getSegment(1) == 'dashboard' ? 'border-b-2 border-black' : ''?>"><a href="<?=route_to('books.dashboard')?>">Dashboard</a></div>
                    </div>
                </div>
                <div>
                    <div class="bg-color-1 px-5 py-3 text-sm">
                        <form action="<?=route_to('books.search')?>" method="get" class="flex items-center gap-x-3">
                            <i class="material-icons">search</i>
                            <input class="bg-color-1 focus:outline-none placeholder-black" type="text" name="q" placeholder="Cari buku atau penulis">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->renderSection('content') ?>
    <?= $this->renderSection('scripts') ?>
</body>
</html>