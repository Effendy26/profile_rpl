@extends('layouts.user')

<br>
<br>

@section('content')
    {{-- Welcome Start --}}


    <section class="welcome" id="welcome" style="display: flex">
        <div style="padding: 50px 8%; margin: auto;">
            <H2><B>WELCOME TO SOFTWARE ENGINEERING</B></H2>
            <br>
            <div class="container">
                @foreach ($posts as $post)
                    <b>
                        <h2>{{ $post->title }}</h2>
                    </b>
                    <p style="width: 65%; text-align: center">{!! $post->content !!}</p>
                @endforeach
            </div>
        </div>
    </section>




    {{-- welcome end --}}



    {{-- Fasilitas Start --}}

    <section class="fasility" id="fasility">
        <div style="padding:  120px 8% ;">
            <center>
                <h4><b>FASILITAS</b></h4>
                <br>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit, similique. Deserunt animi
                    suscipit, quas praesentium facilis atque, quia nesciunt veritatis eum vitae pariatur. Quisquam atque
                    quidem illum asperiores, impedit perspiciatis.
                </p>
                <br>
                @foreach ($fasilitass as $fasilitas)
                    <p>{{ $fasilitas->title }}</p>
                    <p>{!! $fasilitas->content !!}</p>
                @endforeach
            </center>

        </div>
    </section>

    {{-- fasilitas END --}}




    {{-- Teacher start --}}

    <section class="teachers" id="teachers">
        <div style="padding:  120px 10%  ;">
            <h4><b>DAFTAR GURU </b> </h4>
            <br>

            @foreach ($gurus as $guru)
                <img src="{{ asset('/storage/guru/' . $guru->image) }}" class="rounded" style="width: 150px">
                <p><b> {{ $guru->title }} </b></p>
                <p>{!! $guru->content !!}</p>
            @endforeach
        </div>
    </section>

    {{-- Teacher END  --}}



    {{-- Documentation start --}}

    <section class="documentation" id="documentation">
        <div style="padding:  120px 8% ;">
            <h4><b>DOKUMENTASI</b> </h4>
            <br>
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
    </section>

    {{-- Documentation END --}}




    {{-- Project start --}}

    <section class="project" id="project">
        <div style="padding:  120px 8% ;">
            <h4><b>PROJEK</b> </h4>
            <br>


        </div>
    </section>

    {{-- Project END --}}




    {{-- Contact start --}}

    <section class="contact" id="contact">
        <div style="padding:  120px 8% ;">
            <h4><b>CONTACT</b> </h4>
            <br>
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
    </section>

    <footer>

    </footer>a


    {{-- Contact End --}}
@endsection
