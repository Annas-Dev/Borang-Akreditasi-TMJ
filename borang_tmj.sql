-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Feb 2022 pada 02.25
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borang_tmj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_pendukung`
--

CREATE TABLE `tb_data_pendukung` (
  `id_data_pendukung` int(11) NOT NULL,
  `nama_data_pendukung` varchar(200) NOT NULL,
  `tipe_data_pendukung` varchar(50) NOT NULL,
  `ukuran_data_pendukung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lampiran`
--

CREATE TABLE `tb_lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_sub_sub_sub_standar` int(11) DEFAULT NULL,
  `id_sub_sub_standar` int(11) DEFAULT NULL,
  `id_sub_standar` int(11) DEFAULT NULL,
  `id_standar` int(11) DEFAULT NULL,
  `nama_lampiran` varchar(200) DEFAULT NULL,
  `tipe_lampiran` varchar(50) DEFAULT NULL,
  `ukuran_lampiran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lampiran`
--

INSERT INTO `tb_lampiran` (`id_lampiran`, `id_sub_sub_sub_standar`, `id_sub_sub_standar`, `id_sub_standar`, `id_standar`, `nama_lampiran`, `tipe_lampiran`, `ukuran_lampiran`) VALUES
(1, 2, 2, 2, 2, 'coba', 'pdf', 2),
(2, 2, 1, 12, 2, 'Annas - SPJTM.pdf', 'pdf', 538294),
(3, NULL, NULL, 1, 1, 'WhatsApp Image 2022-02-01 at 22.01.13.jpeg', 'jpeg', 126899),
(4, NULL, NULL, 2, 1, 'Metode_EG-EGJ_Penyelesaian SPL Simultan.pdf', 'pdf', 810606),
(5, NULL, NULL, 1, 1, '4-Diferensiasi Numerik.pdf', 'pdf', 593517),
(6, NULL, NULL, 1, 1, 'Surat Rekomendasi Annas.pdf', 'pdf', 560369),
(7, NULL, NULL, 1, 1, 'Surat Rekomendasi Annas.pdf', 'pdf', 560369),
(8, NULL, NULL, 1, 1, 'WhatsApp Image 2022-02-01 at 22.01.13.jpeg', 'jpeg', 126899),
(9, NULL, NULL, 10, 2, 'WhatsApp Image 2022-02-01 at 22.01.13.jpeg', 'jpeg', 126899);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_standar`
--

CREATE TABLE `tb_standar` (
  `id_standar` int(20) NOT NULL,
  `nm_standar` varchar(200) DEFAULT NULL,
  `gbr_standar` varchar(255) DEFAULT NULL,
  `uk_gbr_standar` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_standar`
--

INSERT INTO `tb_standar` (`id_standar`, `nm_standar`, `gbr_standar`, `uk_gbr_standar`) VALUES
(1, 'Visi, Misi & Tujuan', 'icon\\visi.png', '35%'),
(2, 'Sumber Daya Manusia', 'icon\\sdm.png', '25%'),
(3, 'Penelitian', 'icon\\penelitian.png', '31.5%'),
(4, 'Pendidikan', 'icon\\pendidikan.png', '26%'),
(5, 'Pengabdian Kepada Masyarakat', 'icon\\pengabdian.png', '34.5%'),
(6, 'Tata Pamong, Tata Kelola & Kerjasama', 'icon\\tata.png', '37%'),
(7, 'Keluaran & Capaian Tri Dharma', 'icon\\tridarma.png', '31%'),
(8, 'Keuangan, Sarana & Prasarana', 'icon\\ksp.png', '29%'),
(9, 'Mahasiswa', 'icon\\mahasiswa.png', '27%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_standar`
--

CREATE TABLE `tb_sub_standar` (
  `id_sub_standar` int(20) NOT NULL,
  `id_standar` int(20) NOT NULL,
  `nm_sub_standar` varchar(500) DEFAULT NULL,
  `isi_sub_standar` longtext DEFAULT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sub_standar`
--

INSERT INTO `tb_sub_standar` (`id_sub_standar`, `id_standar`, `nm_sub_standar`, `isi_sub_standar`, `last_update`) VALUES
(1, 1, 'Visi, misi dan tujuan: Institusi/Jurusan/PS', '<p style=\"text-align:center\"><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:16px\"><strong>BAB I PENDAHULUAN</strong></span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Latar Belakang</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Keamanan web, sangat erat kaitannya dengan jaringan, karena untuk mengakses sebuah website pasti dibutuhkan koneksi jaringan. Saat ini sangat pesat sekali perkembangan teknologi website, jaringan dan bermacam ancaman keamanan yang dihadapi, seperti ancaman terhadap kerahasiaan yang sering dihadapi adalah hacker, Masquerader,virus virus dari internet maupun dari media transfer data seperti flasdisk, hardisk eksternal, melalui jaringan LAN, download file tanpa proteksi, Trojan horse, Aktifitas user yang tidak terotorisasi dan masih banyak lagi ancaman keamanan yang kadang tidak kita sadari.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Keamanan suatu website atau web security system merupakan salah satu prioritas yang sangat utama bagi seorang webmaster. Tetapi kebanyakan para webmaster hanya mengutamakan design dan topik apa yang harus disediakan supaya menarik pengunjung sebanyak-banyaknya. Padahal jika seorang webmaster mengabaikan keamanan suatu website, maka yang dirugikan adalah webmaster itu sendiri karena seorang hacker dapat mengambil data-data penting pada suatu website dan bahkan pula dapat mengacak-acak tampilan website(deface) tersebut.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>BAB II PEMABAHASAN</strong></span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>A. Pengertian Website</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Website adalah sebutan bagi sekelompok halaman web (webpage) yang umumnya merupakan bagian dari suatu nama domain atau subdomain di WWW di internet. Website juga dapat diartikan sebagai kumpulan halaman yang menampilkan informasi data teks, data gambar diam atau gerak, data animasi, suara atau video atau gabungan dari semuanya. Baik yang bersifat statis maupun dinamis yang membentuk 1 rangkaian bangunan yang saling terkait, dimana masing-masing dihubungkan dengan jaringan (hyperlink).</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Bersifat statis apabila isi informasi tetap, jarang berubah dan informasinya searah hanya dari pemilik website. Bersifat dinamis apabila isi informasi website selalu berubah-ubah.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>B. PengertianWebBrowser</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Webrowser adalah suatu program yang digunakan untuk menjelajahi dunia internet atau untu mencari informasi tentang suatu halaman web yang tersimpan di komputer. Awalnya, web browser hanya berorientasi pada teks dan belum dapat menampilkan gambar. Namun web browser sekarang tidak hanya menampilkan gambar dan teks dan belum dapat menampilkan gambar dan teks saja, tetapi sudah memutar tes multimedia. Browser juga dapat mengirim dan</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">menerima email, mengolah bahasa HTML sebagai input dan menjadikan halaman web sebagai output yang informatif. Contoh Web browser antara lain:</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Internet explorer</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Mozila Firefox</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">c. Opera<br />\r\nd. Netscape, dll.</span></p>\r\n\r\n<p><a href=\"http://localhost/Borang-Akreditasi-TMJ/DataPendukung/Standar1/1/1.png\">here</a></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Pengertian Web Server</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Web Server adalah software yang menjadi tulang belakang dari WWW (World Wide Web). Web server menunggu permintaan dari client yang menggunakan browser, seperti Microsoft Internet Explorer, Mozilla Firefox, dan browser lainnya. Jika ada permintaan dari browser, maka web server akan memproses permintaan itu kemudian memberikan hasil prosesnya berupa data yang diinginkan kembali ke browser.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Data ini mempunyai format yang standar, disebut dengan format SGML (Standar General Markup Language). Data yang berupa format ini kemudian akan ditampilkan oleh browser sesuai dengan kemampuan browser tersebut. Contohnya, bila data yang dikirim berupa gambar, browser yang hanya mampu menampilkan teks (misalnya lynx) tidak akan mampu menampilkan gambar tersebut, dan jika ada akan menampilkan alternatifnya saja.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Web server, untuk berkomunikasi dengan client-nya (web browser) mempunyai protokol sendiri, yaitu HTTP (HyperText Transfer Protocol). Dengan protokol ini, komunikasi antar web server dengan client-nya dapat saling dimengerti dan lebih mudah. Seperti telah dijelaskan diatas, format data pada world wide web adalah SGML. Tapi para pengguna internet saat ini lebih banyak menggunakan format HTML (HyperText Markup Language) karena penggunaannya lebih sederhana dan mudah dipelajari.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>Serangan Terhadap Web</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Berikut adalah beberapa metode yang biasa sering digunakan para hacker untuk menyerang suatu website:</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">a. Remote File Inklusi (RFI)<br />\r\nMetode yang memanfaatkan kelemahan script PHP include(),</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">include_once(), require(), require_once() yang variabel nya tidak dideklarasikan dengan sempurna. Dengan RFI seorang attacker dapat menginclude kan file yang berada di luar server yang bersangkutan. Salah satu tehnik paling aman bagi seorang administrator adalah selalu memperhatikan usaha-usaha infiltrasi dan usaha eksploitasi lokal. Gunakan firewall guna</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">mencegah penyusupan orang-orang yang tidak bertanggung jawab dan memperhatikan port-port server yang sedang terbuka.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Local File Inclusion (LFI)<br />\r\nMetode yang memanfaatkan kelemahan script PHP include(),</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">include_once(), require(), require_once() yang variabel nya tidak dideklarasikan dengan sempurna. Dengan LFI seorang attacker dapat menginclude kan file yang berada di dalam server yang bersangkutan.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">SQL injection<br />\r\nSQL Injection adalah kode injeksi teknik yang memanfaatkan</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">kelemahan keamanan yang terjadi pada lapisan aplikasi database. kerentanan ini hadir ketika masukan pengguna tidak benar baik disaring untuk menghindari karakter string literal tertanam dalam pernyataan SQL atau masukan pengguna tidak kuat diketik dan dengan demikian tak terduga dieksekusi. Ini adalah sebuah instance dari kelas yang lebih umum dari kerentanan yang dapat terjadi kapan pun salah satu bahasa pemrograman atau script yang tertanam di dalam yang lain. serangan injeksi SQL juga dikenal sebagai serangan penyisipan SQL.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Cross Site Scripting (XSS)<br />\r\nCross-site scripting (XSS) adalah jenis kerentanan keamanan</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">komputer biasanya ditemukan di aplikasi web yang memungkinkan penyerang berbahaya untuk menyuntik script sisi klien ke dalam halaman web dilihat oleh pengguna lain. lubang Cross-site scripting adalah kelemahan aplikasi web yang memungkinkan penyerang untuk mem-bypass mekanisme klien-sisi keamanan biasanya dikenakan pada konten web oleh browser modern. Dengan mencari cara suntik script jahat ke dalam halaman web, penyerang bisa mendapatkan hak akses diangkat ke konten halaman sensitif, cookie sesi, dan berbagai informasi lainnya yang dikelola oleh browser atas nama pengguna.seranganCross-sitescriptingOlehkarenaitukasus khusus injeksi kode.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">XSS data diatasi dengan menggunakan Open Source Libraries mengenai pencegahan XSS attack seperti PHP AntiXSS, HTML Purifier , xssprotect , XSS HTML Filter</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>3. Paket Keamanan Web</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">a. SSL (Secure Sockets Layer) Sebuah protokol yang dikembangkan oleh Netscape untuk komunikasi dokumen yang membutuhkan privasi melalui Internet. SSL menggunakan suatu sistem enkripsi</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">yang menggunakan dua kunci untuk melakukan enkripsi data. SSL terdiri dari 4 jenis, yaitu:</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">SSL web server certificate with EV SSL jenis ini digunakan bila pengunjung harus input data sensitif seperti credit cards, PIN number, dst yang membutuhkan keamanan ekstra. Bila menggunakan SSL jenis ini, address bar pada browser akan berwarna hijau dan menunjukan nama ogranisasi bersangkutang yang telah diverifikasi.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">SSL web server certificates<br />\r\nSSL jenis ini digunakan bila pengunjung harus log in atau sign in. SSL jenis ini menggunakan enkripsi sekuat SSL web server certificate with EV namun tidak adanya warna hijau pada address bar browser.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">SGC SuperCerts<br />\r\nSSL ini digunakan untuk kompatibilitas browser lama. Jika pengunjung menggunakan browser lama, atau cara lain untuk mengunjungi suatu website, maka SSL jenis ini cocok untuk diterapkan di browser tersebut, karena SSL jenis ini memungkinkan kompatibilitas browser lama untuk enkripsi 128 atau 256 bit.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">SSL 123 Certificate SSL ini digunakan untuk komunikasi internal dan intranet private. SSL ini melakukan enkripsi unutk pegawai dan user di dalamnya. Hanya nama domain yg diverifikasi.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">IDS (Intrusion Detection System) Intrusion Detection System digunakan untuk mendeteksi aktivitas yang mencurigakan dalam sebuah sistem atau jaringan. Intrusion adalah aktivitas tidak sah atau tidak diinginkan yang mengganggu konfidensialitas, integritas dan atau ketersediaan dari informasi yang terdapat di sebuah sistem. IDS akan memonitor lalu lintas data pada sebuah jaringan atau mengambil data dari berkas log. IDS akan menganalisa dan dengan algoritma tertentu akan memutuskan untuk memberi peringatan kepada seorang administrator jaringan atau tidak</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">IPS (Intrusion Prevention System) Intrusion Prevention System (IPS) adalah sebuah aplikasi yang bekerja untuk monitoring traffic jaringan, mendeteksi aktivitas yang mencurigakan, dan melakukan pencegahan dini terhadap intrusi atau kejadian yang dapat membuat jaringan menjadi berjalan tidak seperti sebagaimana mestinya. Bisa jadi karena adanya serangan dari luar, dan sebagainya. Produk IPS</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">sendiri dapat berupa perangkat keras (hardware) atau perangkat lunak (software).Secara umum, ada dua jenis IPS, yaitu Host-based Intrusion Prevention System (HIPS) dan Network-based Instrusion Prevention System (NIPS).</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>4. Standar Pengamanan Web</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">XML signatures merupakan dokumen XML yang berisi informasi mengenai tanda tangan digital. Tanda tangan digital dapat dilakukan terhadap dokumen dengan tipe apapun, termasuk dokumen XML. XML signatures dapat ditambahkan pada dokumen XML yang ditandatangani ataupun dapat berupa sebuah dokumen XML tersendiri.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Secara garis besar, struktur XML signatures adalah sebagaimana (dimana &ldquo;?&rdquo; menandakan nol atau satu kemunculan, &ldquo;+&rdquo; menandakan satu atau lebih kemunculan, dan &ldquo;*&rdquo; menandakan nol atau lebih kemunculan) ditampilkan pada :</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Kode XML<br />\r\nSalah satu keuntungan penggunaan standar XML signature adalah dapat dilakukannya penandatanganan sebuah dokumen XML oleh lebih dari satu pihak. Pihak tertentu hanya akan menandatangani elemen XML yang menjadi tanggung jawabnya</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">XML Encryption<br />\r\nPengamanan terhadap data yang dipertukarkan merupakan salah</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">satu kebutuhan yang muncul pada proses pertukaran data. W3C telah merekomendasikan Enkripsi XML sebagai metode alternatif untuk pengamanan data dengan menggunakan format XML. Namun demikian, Enkripsi XML dirancang untuk dapat diterapkan baik pada data XML maupun data non XML. Implementasi Enkripsi XML memungkinkan penggabungan data yang telah dienkripsi dengan data yang tidak dienkripsi di dalam satu dokumen XML. Dengan demikian, proses enkripsi maupun dekripsi dapat dilakukan hanya pada data yang memang perlu diamankan saja.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Enkripsi XML telah diimplementasikan baik pada level aplikasi maupun pada level parser. Pada level aplikasi, implementasi Enkripsi XML paling banyak dibuat dengan menggunakan DOM, Document Object Model.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Sementara pada level parser, implementasi Enkripsi XML di antaranya dibuat dengan menggunakan parser Xerces. Enkripsi XML secara umum dapat dianggap sebagai proses transformasi dokumen XML yang belum terenkripsi ke dokumen XML yang sudah terenkripsi.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">W3C telah merekomendasikan XSLT, Extensible Stylesheet Language Transformations, sebagai bahasa transformasi untuk dokumen XML. Dengan demikian, maka XSLT sebagai bahasa transformasi untuk XML dapat digunakan untuk mengimplementasikan Enkripsi XML.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">c. Xml Key Management Specification<br />\r\nXML key management specification (XMKS) merupakan sebuah</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">spesifikasi infrastruktur yang digunakan untuk pengamanan transaksi berbasis XML. Pada web services digunakan format komunikasi data berbasis XML dan untuk keamanan data-data tersebut digunakan teknik kriptografi kunci-publik. Pengelolaan terhadap kunci-publik ditentukan dengan adanya public-key infrastructure (PKI).</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">XKMS merupakan bentuk pengembangan berikutnya dari PKI yang ada saat ini (PKIX) dan juga melakukan perubahan standar PKI sebagai salah satu bentuk web services. Dengan demikian XKMS dapat melakukan proses registrasi pasangan kunci-publik (private-key dan public-key), penentuan lokasi penyimpanan kunci- publik, validasi kunci-publik, pencabutan (revoke) kuncipublik, dan pemulihan (recover) kuncipublik. Oleh karena itu, keseluruhan struktur PKI akan dikembangkan ke dalam lingkungan berbasis XML. XML Key Management Specification yang diterapkan sebagai web service akan mengurangi bentuk &ldquo;ketergantungan&rdquo; terhadap fungsi PKI yang terintegrasi dalam aplikasi. Sebelumnya penyedia PKI haruslah mengembangkan fungsi-fungsi khusus yang diterapkan pada produk aplikasi yang akan digunakan sedangkan dengan adanya XKMS sebagai web service, pada pengembangan produk aplikasi cukup dibuat fungsi untuk menentukan pengguna (client) yang mengakses fungsi/layanan yang disediakan oleh XKMS. Fungsi-fungsi pada XMKS meliputi:</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Registration (registrasi). Layanan pada XKMS dapat digunakan untuk mendaftarkan (registrasi) pasangan kunci dengan menggunakan fungsi &ldquo;register&rdquo;. Pembangkitan pasangan kunci- publik dapat dilakukan oleh client ataupun layanan. Pada saat kunci- kunci telah terdaftarkan, layanan XKMS akan melakukan pengelolaan pencabutan ataupun pemulihan kunci-kunci, yang dibangkitkan oleh server ataupun client.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Locating. Pada XKMS terdapat fungsi yang digunakan untuk mendapatkan kembali kunci-publik yang terdaftar.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Validation (validasi). Fungsi validasi digunakan untuk memastikan bahwa kunci-publik yang telah didaftarkan dengan layanan XKMS valid dan tidak kadaluarsa ataupun telah dicabut.</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">Keunggulan utama XKMS dibandingkan PKI yang ada sebelumnya adalah proses enkapsulasi kerumitan yang ada pada PKI menjadi komponen pada sisi server. Dengan demikian pihak client hanya perlu mengetahui cara mengakses antarmuka yang disediakan. Sebagai pengembangan lebih lanjut dari PKI yang ada saat ini, XKMS memiliki karakteristik kompatibel (selaras) dengan infrastruktur kunci- publik yang menggunakan X.509 (PKIX); dapat mendukung perubahan struktur dasar kebijakan yang akan digunakan pada PKI, contohnya Federal Bridge CA, ataupun perpaduan X.509 dengan non-509; proses pembangkitan dengan menggunakan XML signature dan encryption; dapatdikembangluaskan. Untuk produk aplikasi yang akan menggunakan spesifikasi XKMS haruslah melakukan implementasi operasi penandaan ataupun verifikasi paling dasar (basic) dan juga dapat mengelola kunci-privat yang dimiliki oleh client kemudian dapat melakukan pembangkitan dan pemrosesan terhadap transaksi-transaksi berbasis XML. Selain itu, berbeda dengan produk aplikasi pada PKIX, produk aplikasi yang akan menerapkan XKMS tidak perlu melakukan pemrosesan terhadap protokol ASN.1 ataupun sertifikasi X.509. Dengan bentuk penggunaan XKMS sebagai web service, maka produk aplikasi &ldquo;terbebaskan&rdquo; dari kebutuhan untuk memahami dan menerapkan PKI tradisional (PKIX) &ndash; cukup dengan memanggil dan menggunakan layanan yang disediakan web service</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><strong>BAB III REFERENSIi</strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">https://id.scribd.com/document/373695615/Makalah-Keamanan-Web-Ksi</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">https://informatika.stei.itb.ac.id/~rinaldi.munir/Kriptografi/2005- 2006/Makalah/Makalah2005-24.pdf</span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\">https://www.slideshare.net/denysyahrir/makalah-keamanan-jaringan-internet-internet- permasalahan-dan-penanggulangan-keamanannya-dalam-dunia-maya</span></p>\r\n', '0000-00-00'),
(2, 1, 'Sasaran mutu', '<div class=\"page\" title=\"Page 2\">\r\n<div class=\"layoutArea\">\r\n<div class=\"column\">\r\n<p style=\"text-align:center\"><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>BAB I PENDAHULUAN </strong></span></span></p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"layoutArea\">\r\n<div class=\"column\">\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:12pt\">Keamanan web, sangat erat kaitannya dengan jaringan, karena untuk mengakses sebuah website pasti dibutuhkan koneksi jaringan. Saat ini sangat pesat sekali perkembangan teknologi website, jaringan dan bermacam ancaman keamanan yang dihadapi, seperti ancaman terhadap kerahasiaan yang sering dihadapi adalah hacker, Masquerader,virus virus dari internet maupun dari media transfer data seperti flasdisk, hardisk eksternal, melalui jaringan LAN, download file tanpa proteksi, Trojan horse, Aktifitas user yang tidak terotorisasi dan masih banyak lagi ancaman keamanan yang kadang tidak kita sadari. </span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:12pt\">Keamanan suatu website atau web security system merupakan salah satu prioritas yang sangat utama bagi seorang webmaster. Tetapi kebanyakan para webmaster hanya mengutamakan design dan topik apa yang harus disediakan supaya menarik pengunjung sebanyak-banyaknya. Padahal jika seorang webmaster mengabaikan keamanan suatu website, maka yang dirugikan adalah webmaster itu sendiri karena seorang hacker dapat mengambil data-data penting pada suatu website dan bahkan pula dapat mengacak-acak tampilan website(deface) tersebut. </span></span></p>\r\n</div>\r\n</div>\r\n</div>\r\n', '0000-00-00'),
(3, 1, 'Analisis capaian sasaran mutu tahun sebelumnya', '<div class=\"page\" title=\"Page 6\">\r\n<div class=\"layoutArea\">\r\n<div class=\"column\">\r\n<p style=\"text-align:center\"><span style=\"font-size:18px\"><strong>Standar Pengamanan Web </strong></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:12pt\">XML signatures merupakan dokumen XML yang berisi informasi mengenai tanda tangan digital. Tanda tangan digital dapat dilakukan terhadap dokumen dengan tipe apapun, termasuk dokumen XML. XML signatures dapat ditambahkan pada dokumen XML yang ditandatangani ataupun dapat berupa sebuah dokumen XML tersendiri. </span></span></p>\r\n\r\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:12pt\">Secara garis besar, struktur XML signatures adalah sebagaimana (dimana &ldquo;?&rdquo; menandakan nol atau satu kemunculan, &ldquo;+&rdquo; menandakan satu atau lebih kemunculan, dan &ldquo;*&rdquo; menandakan nol atau lebih kemunculan) ditampilkan pada :</span></span></p>\r\n</div>\r\n</div>\r\n</div>\r\n', '0000-00-00'),
(4, 1, 'Risk Assesment Audit Eksternal Re Sertifikasi PT. Sai Global Indonesia Mei 2018', '', '0000-00-00'),
(5, 1, 'Dokumen analisis pencapaian kinerja', '', '0000-00-00'),
(6, 1, 'Dokumen pelaksanaan kegiatan Audit dan memiliki bukti yang sahih terkait praktik baik pengembangan budaya mutu di perguruan tinggi melalui rapat tinjauan manajemen', '', '0000-00-00'),
(7, 1, 'SK pejabat', '', '0000-00-00'),
(8, 1, 'Profil program studi', '', '0000-00-00'),
(9, 1, 'Program Kerja Prodi (RKT)', '', '0000-00-00'),
(10, 2, 'Dokumen profil dosen (Daftar Dosen)', NULL, '0000-00-00'),
(11, 2, 'Kejelasan sistem monitoring dan evaluasi serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan', '<p>http://localhost/BROANG%20TMJ%20TERBARU/content.php?mod=borang&amp;standar=2&amp;sub_standar1=11&amp;urut=2</p>', '0000-00-00'),
(12, 2, 'Jadwal kegiatan kuliah dan praktek', NULL, '0000-00-00'),
(13, 2, 'SK Mengajar Dosen', NULL, '0000-00-00'),
(14, 2, 'Daftar tenaga kependidikan beserta jobnya', NULL, '0000-00-00'),
(15, 3, 'Laporan kegiatan penelitian oleh pengelola penelitian', '<p>hj</p>', '0000-00-00'),
(16, 4, 'Dokumen kebijakan pengembangan kurikulum', NULL, '0000-00-00'),
(17, 4, 'Kejelasan Deskripsi,Silabus, dan SAP', NULL, '0000-00-00'),
(18, 4, 'RPS', NULL, '0000-00-00'),
(19, 4, 'SAP dan Rubrik', NULL, '0000-00-00'),
(20, 4, 'Jadwal Kuliah', NULL, '0000-00-00'),
(21, 4, 'Jobsheet/modul lab', NULL, '0000-00-00'),
(22, 4, 'Buku/Bahan Ajar', NULL, '0000-00-00'),
(23, 4, 'Daftar struktur kurikulum praktikum/praktik/ praktik kerja lapangan (PKL) yang memuat sks persemester dan jam perminggu', NULL, '0000-00-00'),
(24, 5, 'Laporan kegiatan PkM oleh pengelola penelitian', NULL, '0000-00-00'),
(25, 6, 'Struktur organisasi dan Tupoksi sesuai struktur yang ada pada Prodi', NULL, '0000-00-00'),
(26, 6, 'Dokumen kerjasama dengan stakeholders internal', NULL, '0000-00-00'),
(27, 6, 'Dokumen Monev kerjasama', NULL, '0000-00-00'),
(28, 6, 'Daftar kerjasama', NULL, '0000-00-00'),
(29, 6, 'Dokumen pengukuran kepuasan pemangku kepentingan internal dan eksternal', NULL, '0000-00-00'),
(30, 7, 'Daftar IPK mahasiswa', NULL, '0000-00-00'),
(31, 7, 'Kejelasan profil mahasiswa dan lulusan, rasio dosen vs mahasiswa, IPS dan IPK, DO, dan layanan mahasiswa', NULL, '0000-00-00'),
(32, 7, 'Daftar Beban Mengajar Maksimal per Pendidik', NULL, '0000-00-00'),
(33, 7, 'Daftar Rasio Maksimal Jumlah Peserta Didik per Pendidik', NULL, '0000-00-00'),
(34, 7, 'Matriks Rasio Dosen – Mahasiswa per program studi', NULL, '0000-00-00'),
(35, 7, 'Form Indeks Prestasi Mahasiswa per kelas, program studi, jurusan dan institusi.', NULL, '0000-00-00'),
(36, 7, 'Daftar sertifikasi kompetensi lulusan', NULL, '0000-00-00'),
(37, 7, 'Daftar prestasi akademik mahasiswa', NULL, '0000-00-00'),
(38, 7, 'Daftar prestasi non Akademik mahasiswa', NULL, '0000-00-00'),
(39, 7, 'Daftar lulusan yang berisi lama studi', NULL, '0000-00-00'),
(40, 7, 'Daftar lulusan tepat waktu', NULL, '0000-00-00'),
(41, 7, 'Daftar lulusan dengan IPK standar atau melebihi', NULL, '0000-00-00'),
(42, 7, 'Daftar pekerjaan pertama alumni yang berisi tanggal mulai bekerja', NULL, '0000-00-00'),
(43, 7, 'Daftar pekerjaan alumni yang berisi kesesuaian kompetensi bidang studi', NULL, '0000-00-00'),
(44, 7, 'Laporan umpan balik kepuasan pengguna lulusan', NULL, '0000-00-00'),
(45, 7, 'Daftar Tempat Kerja Lulusan', 'Transkrip Nilai Annas.pdf', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_sub_standar`
--

CREATE TABLE `tb_sub_sub_standar` (
  `id_sub_sub_standar` int(50) NOT NULL,
  `id_sub_standar` int(50) NOT NULL,
  `nm_sub_sub_standar` varchar(500) DEFAULT NULL,
  `isi_sub_sub_standar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sub_sub_sub_standar`
--

CREATE TABLE `tb_sub_sub_sub_standar` (
  `id_sub_sub_sub_standar` int(50) NOT NULL,
  `id_sub_sub_standar` int(50) NOT NULL,
  `nm_sub_sub_sub_standar` varchar(500) DEFAULT NULL,
  `isi_sub_sub_sub_standar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nip_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `user_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nip_user`, `username`, `user_password`) VALUES
(30, 42619019, 'rachmat', '$2y$10$2Hpu8AMtE.Pvtm0/hTKQyeTYIN0rID.dEDssYxgct1s.KcaiaD9DK'),
(31, 42619015, 'hidayat', '$2y$10$mtu6KWHhxyFQ3K7kOp5FX.Sa0BHf1qKH.7F.eqetXLk6WX2qUyT7a'),
(32, 2323, 'baba', '$2y$10$xNGVHDQelMO5hODgWqOZk.RDM3lmNJfKQ/5Eh0EAzGduFw3gK510i'),
(33, 42619012, 'ilyas', '$2y$10$kCd0h59XGtKwLOARKbUpLOG1sR5U0d23/ZJuYYPtT1Q0F1OLpe7R.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_data_pendukung`
--
ALTER TABLE `tb_data_pendukung`
  ADD PRIMARY KEY (`id_data_pendukung`);

--
-- Indeks untuk tabel `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `id_sub_sub_standar` (`id_sub_sub_standar`),
  ADD KEY `id_sub_sub_sub_standar` (`id_sub_sub_sub_standar`);

--
-- Indeks untuk tabel `tb_standar`
--
ALTER TABLE `tb_standar`
  ADD PRIMARY KEY (`id_standar`);

--
-- Indeks untuk tabel `tb_sub_standar`
--
ALTER TABLE `tb_sub_standar`
  ADD PRIMARY KEY (`id_sub_standar`),
  ADD KEY `id_judul` (`id_standar`);

--
-- Indeks untuk tabel `tb_sub_sub_standar`
--
ALTER TABLE `tb_sub_sub_standar`
  ADD PRIMARY KEY (`id_sub_sub_standar`),
  ADD KEY `id_sub_standar` (`id_sub_standar`);

--
-- Indeks untuk tabel `tb_sub_sub_sub_standar`
--
ALTER TABLE `tb_sub_sub_sub_standar`
  ADD PRIMARY KEY (`id_sub_sub_sub_standar`),
  ADD KEY `id_sub_sub_standar` (`id_sub_sub_standar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_data_pendukung`
--
ALTER TABLE `tb_data_pendukung`
  MODIFY `id_data_pendukung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_lampiran`
--
ALTER TABLE `tb_lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_standar`
--
ALTER TABLE `tb_standar`
  MODIFY `id_standar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_sub_standar`
--
ALTER TABLE `tb_sub_standar`
  MODIFY `id_sub_standar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tb_sub_sub_standar`
--
ALTER TABLE `tb_sub_sub_standar`
  MODIFY `id_sub_sub_standar` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sub_sub_sub_standar`
--
ALTER TABLE `tb_sub_sub_sub_standar`
  MODIFY `id_sub_sub_sub_standar` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_sub_standar`
--
ALTER TABLE `tb_sub_standar`
  ADD CONSTRAINT `tb_sub_standar_ibfk_1` FOREIGN KEY (`id_standar`) REFERENCES `tb_standar` (`id_standar`);

--
-- Ketidakleluasaan untuk tabel `tb_sub_sub_standar`
--
ALTER TABLE `tb_sub_sub_standar`
  ADD CONSTRAINT `tb_sub_sub_standar_ibfk_1` FOREIGN KEY (`id_sub_standar`) REFERENCES `tb_sub_standar` (`id_sub_standar`);

--
-- Ketidakleluasaan untuk tabel `tb_sub_sub_sub_standar`
--
ALTER TABLE `tb_sub_sub_sub_standar`
  ADD CONSTRAINT `tb_sub_sub_sub_standar_ibfk_1` FOREIGN KEY (`id_sub_sub_standar`) REFERENCES `tb_sub_sub_standar` (`id_sub_sub_standar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
