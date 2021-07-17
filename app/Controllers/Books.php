<?php

namespace App\Controllers;

use App\Models\BookModel;

class Books extends BaseController
{
	public function __construct()
	{
		$this->bookModel = new BookModel;
	}

	public function index()
	{
        $data = [
            'title' => "Baca Buku",
			'popular_books' => $this->bookModel->orderBy('views', 'desc')->orderBy('created_at', 'desc')->get(5)->getResult('array'),
			'latest_books' => $this->bookModel->orderBy('created_at', 'desc')->get(6)->getResult('array'),
        ];

		return view('pages/home', $data);
	}

	public function dashboard()
	{
		$data = [
			'book' => $this->bookModel->orderBy('created_at', 'desc')->findAll(),
            'title' => "Dashboard | Baca Buku"
        ];
		return view('pages/index', $data);
	}

	public function create()
	{
		$data = [
            'title' => "Buat Buku Baru | Baca Buku",
			'validation' => \Config\Services::validation()
        ];
		return view('pages/create', $data);
	}

	public function store(){
		$validation = \Config\Services::validation();
        $isValid = $this->validate([
			'judul' => [
				'rules' => 'required|is_unique[books.judul]',
				'errors' => [
					'required' => '{field} buku harus diisi.',
					'is_unique' => '{field} buku sudah terdaftar di database.',
				]
			],
			'penulis' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} buku harus diisi.',
				]
			],
            'sampul' => [
				'rules' => 'uploaded[sampul]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/gif,image/png]|max_size[sampul,4096]',
				'errors' => [
					'uploaded' => '{field} buku harus dipilih terlebih dahulu.',
					'is_image' => '{field} buku harus dalam bentuk gambar.',
					'mime_in' => '{field} buku harus dalam format .jpg, .jpeg, .gif, .png.',
					'max_size' => '{field} buku harus tidak boleh lebih dari 4 MB.',
				]
			],
			'isi' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} buku harus diisi.',
				]
			],
        ]);

        if($isValid){
			$file = $this->request->getFile('sampul');
			$new_file_name = $file->getRandomName();
			$file->move('img/buku', $new_file_name);

            $this->bookModel->insert([
                "judul" => $this->request->getPost('judul'),
				"slug" => url_title($this->request->getPost('judul'), '-', true),
                "penulis" => $this->request->getPost('penulis'),
                "sampul" => $new_file_name,
                "isi" => $this->request->getPost('isi')
            ]);
            return redirect()->route('books.all');
        }
		else{
			$validation = \Config\Services::validation();
			return redirect()->back()->withInput();
		}
	}

	public function show($slug){
		$this->bookModel->addView($slug);
		$book = $this->bookModel->where('slug', $slug)->first();

		$data = [
            'title' => $book['judul'] . " | Baca Buku",
			'book' => $book
        ];
		return view('pages/show', $data);
	}

	public function all(){
		$book = $this->bookModel->orderBy('created_at', 'desc')->findAll();

		$data = [
            'title' => "Semua Buku | Baca Buku",
			'book' => $book,
			'judul' => 'Semua Buku'
        ];
		return view('pages/all', $data);
	}

	public function popular(){
		$book = $this->bookModel->orderBy('views', 'desc')->orderBy('created_at', 'desc')->findAll();

		$data = [
            'title' => "Buku Populer | Baca Buku",
			'book' => $book,
			'judul' => 'Buku Populer'
        ];
		return view('pages/all', $data);
	}

	public function edit($id){
		$book = $this->bookModel->where('id', $id)->first();

		$data = [
            'title' => "Edit {$book['judul']} | Baca Buku",
			'book' => $book,
			'validation' => \Config\Services::validation()
        ];
		return view('pages/edit', $data);
	}

	public function update($id){
		$validation = \Config\Services::validation();
        $isValid = $this->validate([
			'judul' => [
				'rules' => "required|is_unique[books.judul,id,$id]",
				'errors' => [
					'required' => '{field} buku harus diisi.',
					'is_unique' => '{field} buku sudah terdaftar di database.',
				]
			],
			'penulis' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} buku harus diisi.',
				]
			],
            'sampul' => [
				'rules' => 'is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/gif,image/png]|max_size[sampul,4096]',
				'errors' => [
					'is_image' => '{field} buku harus dalam bentuk gambar.',
					'mime_in' => '{field} buku harus dalam format .jpg, .jpeg, .gif, .png.',
					'max_size' => '{field} buku harus tidak boleh lebih dari 4 MB.',
				]
			],
			'isi' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} buku harus diisi.',
				]
			],
        ]);

        if($isValid){
			$book = $this->bookModel->where('id', $id)->first();

			if(!empty($_FILES['sampul']['name'])){
				$file = $this->request->getFile('sampul');
				$file->move('img/buku', $book['sampul'], true);
			}

            $this->bookModel->update($id, [
                "judul" => $this->request->getPost('judul'),
				"slug" => url_title($this->request->getPost('judul'), '-', true),
                "penulis" => $this->request->getPost('penulis'),
                "isi" => $this->request->getPost('isi')
            ]);
            return redirect()->route('books.all');
        }
		else{
			$validation = \Config\Services::validation();
			return redirect()->back()->withInput();
		}
	}

	public function search(){
		$keyword = $this->request->getGet('q');
		$book = $this->bookModel->like('judul', $keyword)->orLike('penulis', $keyword)->orderBy('created_at', 'desc')->findAll();

		$data = [
            'title' => "\"$keyword\" di Semua Buku | Baca Buku",
			'book' => $book,
			'judul' => "\"$keyword\" di Semua Buku",
        ];
		return view('pages/all', $data);
	}

	public function filter(){
		$filter = $this->request->getGet('filter');
		$order_by = $this->request->getGet('order_by');

		$book = $this->bookModel->orderBy($filter, $order_by)->findAll();

		$data = [
            'title' => "Semua Buku | Baca Buku",
			'book' => $book,
			'judul' => "Semua Buku",
        ];
		return view('pages/all', $data);
	}

	public function destroy($id){
		$book = $this->bookModel->where('id', $id)->first();
		$this->bookModel->delete($id);
		unlink('img/buku/' . $book['sampul']);
		return redirect()->route('books.all');
	} 
}
