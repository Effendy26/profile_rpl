@extends('layouts.user')

@section('content')

    {{-- Welcome Section --}}
    <section class="welcome" id="welcome">
        <div style="padding: 50px 8%; margin: auto;">
            <center>
                <h2><b>WELCOME TO SOFTWARE ENGINEERING</b></h2>
            </center>
            <br>
            <div class="container">
                <p>
                    Bidang aplikasi teknik komputer & informatika sangat luas, hampir tidak ada ruang kehidupan yang tidak tersentuh oleh teknologi komputer. Luasnya bidang ini memberikan prospek kerja yang cerah.
                    Jurusan RPL - Rekayasa perangkat lunak adalah satu bidang profesi yang mendalami cara-cara pengembangan software termasuk pembuatan, pengembanganannya dan manajemen kualitas.
                </p>
                <p>
                    Siswa akan belajar bagaimana membangun perangkat lunak dari awal. Materi belajar mencakup pengetahuan dan penggunaan bahasa pemrograman tertentu; metodologi manajemen proyek; dan desain, pengkodean, dan teknik pengujian yang digunakan dalam pengembangan perangkat lunak.
                </p>
                <p>
                    Lulusan dari jurusan RPL sangat dibutuhkan untuk menjawab banyaknya kebutuhan industri pengembangan software. Ruang lingkup pekerjaan di bidang ini antara lain adalah Software Developer, Game Development, Software Tester, Software Engineering, Software Analis dan Integrator, Konsultan IT, dan Programmer.
                </p>
             </div>
        </div>
    </section>

    {{-- Fasilitas Section --}}
    <section class="fasility" id="fasility">
        <div style="padding: 50px 8%; margin: auto;">
            <center>
                <h2><b>FASILITAS</b></h2>
            </center>
            <br>
            <div class="container">
                <p>
                    Fasilitas Laboratorium komputer Teknik Komputer dan Informasi SMK PI sebagai sarana pembelajaran, pelatihan, penelitian maupun pengabdian pada masyarakat. Setiap unit komputer terhubung ke Local Area Network (LAN) yang dilengkapi dengan router sebagai fasilitas untuk dapat mengakses Internet, sedang bagi pengguna Laptop/mobile device dapat menggunakan wifi untuk terhubung dengan Internet.
                    SMK PI memiliki 8 (delapan) Ruangan laboratorium sesuai dengan fungsinya dan 3 unit server, dimana salah satunya merupakan duplikasi dari server Universitas Indonesia dengan kecepatan akses mencapai 10Mbp.
                </p>
                <br>
                @foreach ($fasilitis as $fasiliti)
                    <img src="{{ asset('/storage/fasiliti/' . $fasiliti->image) }}" class="rounded" style="width: 150px">
                    <p>{{ $fasiliti->title }}</p>
                    <p>{!! $fasiliti->content !!}</p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Teacher Section --}}
    <section class="teachers" id="teachers">
        <div style="padding: 50px 8%; margin: auto;">
            <center>
                <h2><b>DAFTAR GURU</b></h2>
            </center>
            <br>
            @foreach ($gurus as $guru)
                <img src="{{ asset('/storage/guru/' . $guru->image) }}" class="rounded" style="width: 150px">
                <p><b>{{ $guru->title }}</b></p>
                <p>{!! $guru->content !!}</p>
            @endforeach
        </div>
    </section>

    {{-- Documentation Section --}}
    <section class="documentation" id="documentation">
        <div style="padding: 50px 8%; margin: auto;">
            <center>
                <h2><b>DOKUMENTASI</b></h2>
            </center>
            <br>
            <div class="container">
                @foreach ($dokumens as $dokumen)
                    <img src="{{ asset('/storage/dokumen/' . $dokumen->image) }}" class="rounded" style="width: 150px">
                    <p><b>{{ $dokumen->title }}</b></p>
                    <p>{!! $dokumen->content !!}</p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Project Section --}}
    <section class="project" id="project">
        <div style="padding: 120px 8%; margin: auto;">
            <center>
                <h2><b>PROJEK</b></h2>
            </center>
            <br>
            <div class="container">
                @foreach ($projects as $project)
                    <img src="{{ asset('/storage/project/' . $project->image) }}" class="rounded" style="width: 150px">
                    <p><b>{{ $project->title }}</b></p>
                    <p>{!! $project->content !!}</p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="contact" id="contact">
        <div style="padding: 120px 8%; margin: auto;">
            <center>
                <h2><b>CONTACT</b></h2>
            </center>
            <br>
            <div class="container">
                <p style="width: 65%">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at illo itaque
                    voluptates, alias obcaecati rerum, eveniet quidem, harum repudiandae amet et distinctio quas. Ipsam impedit
                    voluptatum provident odit praesentium.</p>
                <p style="width: 65%">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at illo itaque
                    voluptates, alias obcaecati rerum, eveniet quidem, harum repudiandae amet et distinctio quas. Ipsam impedit
                    voluptatum provident odit praesentium.</p>
                <p style="width: 65%">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi at illo itaque
                    voluptates, alias obcaecati rerum, eveniet quidem, harum repudiandae amet et distinctio quas. Ipsam impedit
                    voluptatum provident odit praesentium.</p>
            </div>
        </div>
    </section>

    {{-- Footer Section --}}
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2023 Your Website. All Rights Reserved.</p>
    </footer>

@endsection
