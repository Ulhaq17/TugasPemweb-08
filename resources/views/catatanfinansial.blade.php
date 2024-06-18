<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finansialku</title>
    <link rel="stylesheet" href="css/catatanFinansialStyle.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
</head>
<body>

    <header class="header">
        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-logo">
                    <a href="#">Finansialku</a>
                </div>
                <div class="menu-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <ul class="navbar-menu">
                    <li><a href="/">Home</a></li>
                    <li><a href="/catatanfinansial">Catatan Finansial</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="main-content">
        <div class="content-container">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Tipe Transaksi</th>
                            <th>Kategori</th>
                            <th>Nominal</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($catatanFinansial as $index => $catatan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $catatan->tanggal_transaksi }}</td>
                            <td>{{ $catatan->tipe_transaksi }}</td>
                            <td>{{ $catatan->kategori_transaksi }}</td>
                            <td>{{ number_format($catatan->nominal_transaksi, 0, ',', '.') }}</td>
                            <td>{{ $catatan->deskripsi_transaksi }}</td>
                            <td>
                                @if($catatan->file_path)
                                    <a href="{{ asset('storage/' . $catatan->file_path) }}" target="_blank">View File</a>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn-update" data-id="{{ $catatan->id }}" data-tanggal="{{ $catatan->tanggal_transaksi }}" data-tipe="{{ $catatan->tipe_transaksi }}" data-kategori="{{ $catatan->kategori_transaksi }}" data-nominal="{{ $catatan->nominal_transaksi }}" data-deskripsi="{{ $catatan->deskripsi_transaksi }}" data-file="{{ $catatan->file_path }}">Update</a>
                                <form action="{{ route('catatanFinansial.destroy', $catatan->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-container">
                <form id="addTransactionForm" method="POST" action="{{ route('catatanFinansial.store') }}" enctype="multipart/form-data">
                    @csrf <!-- Add CSRF token for security -->
                    <h3>Catat Transaksi</h3>

                    <label for="tanggal_transaksi">Tanggal</label>
                    <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" required max="{{ date('Y-m-d') }}">

                    <label for="tipe_transaksi">Tipe Transaksi</label>
                    <select id="tipe_transaksi" name="tipe_transaksi" required>
                        <option value="Pengeluaran">Pengeluaran</option>
                    </select>

                    <label for="kategori_transaksi">Kategori</label>
                    <select id="kategori_transaksi" name="kategori_transaksi" required>
                        <option value="Makanan & Minuman">Makanan & Minuman</option>
                        <option value="Transportasi">Transportasi</option>
                    </select>

                    <label for="nominal_transaksi">Nominal</label>
                    <div class="nominal-wrapper">
                        <span class="currency">Rp</span>
                        <input type="text" id="nominal_transaksi" name="nominal_transaksi" required>
                    </div>
                    <input type="hidden" id="nominal_transaksi_hidden" name="nominal_transaksi_hidden" required>

                    <label for="deskripsi_transaksi">Deskripsi</label>
                    <input type="text" id="deskripsi_transaksi" name="deskripsi_transaksi" required maxlength="30">

                    <label for="file_transaksi">Upload File</label>
                    <input type="file" id="file_transaksi" name="file_transaksi" accept=".jpg,.png,.pdf">

                    <button type="submit">Tambah</button>
                </form>
            </div>
            <div id="updateTransactionFormPopup" class="form-popup">
                <form id="updateTransactionForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3>Update Transaksi</h3>

                    <label for="update_tanggal_transaksi">Tanggal</label>
                    <input type="date" id="update_tanggal_transaksi" name="tanggal_transaksi" required>

                    <label for="update_tipe_transaksi">Tipe Transaksi</label>
                    <select id="update_tipe_transaksi" name="tipe_transaksi" required>
                        <option value="Pengeluaran">Pengeluaran</option>
                    </select>

                    <label for="update_kategori_transaksi">Kategori</label>
                    <select id="update_kategori_transaksi" name="kategori_transaksi" required>
                        <option value="Makanan & Minuman">Makanan & Minuman</option>
                        <option value="Transportasi">Transportasi</option>
                    </select>

                    <label for="update_nominal_transaksi">Nominal</label>
                    <div class="nominal-wrapper">
                        <span class="currency">Rp</span>
                        <input type="text" id="update_nominal_transaksi" name="nominal_transaksi" required>
                    </div>

                    <label for="update_deskripsi_transaksi">Deskripsi</label>
                    <input type="text" id="update_deskripsi_transaksi" name="deskripsi_transaksi" required maxlength="30">

                    <label for="update_file_transaksi">Upload File</label>
                    <input type="file" id="update_file_transaksi" name="file_transaksi" accept=".jpg,.png,.pdf">

                    <button type="submit">Update</button>
                    <button type="button" class="btn-cancel" onclick="closeUpdateForm()">Cancel</button>
                </form>
            </div>

        </div>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pengeluaran</a></li>
                    <li><a href="#">Transaksi</a></li>
                    <li class="logout"><a href="/">Logout</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Punya pertanyaan lainnya? Hubungi kami di:</h4>
                <p><a>+62 851 5664 9517</a></p>
                <p><a>ulhaqmdhiya04@student.uns.ac.id</a></p>
                <div class="social-icons">
                    <a href="#"><img src="/img/instagram-icon.png" alt="Instagram"></a>
                    <a href="https://www.linkedin.com/in/mochammad-dhiya-ulhaq-a9744a255/"><img src="/img/linkedin-icon.png" alt="LinkedIn"></a>
                    <a href="https://github.com/Ulhaq17"><img src="/img/Github-icon.png" alt="Github"></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 Finansialku</p>
        </div>
    </footer>

    <script src="js/catatanFinansialScript.js"></script>
</body>
</html>
