@extends('layouts.app')

@section('title', 'About - Partial Views Demo')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="theme-demo {{ $theme === 'dark' ? 'bg-dark border-light' : 'bg-white border' }} mb-4 p-4 rounded">
            <h1 class="mb-4">Welcome My Website</h1>
            <p class="lead">
                Halaman ini mendemonstrasikan penggunaan <strong>Partial Views</strong> dengan 
               <code>@{{ include }}</code> directive untuk membuat komponen Blade yang bisa digunakan ulang.
            </p>
        </div>

        <h3 class="mb-4">Team Kami</h3>

        @php
            $avatars = ['👨💻', '👨💻', '👨💻','👩🎨','👩💼','👩💻','👩💻',];
        @endphp

        <div class="row">
            @foreach($team as $member)
                <x-team-member
                    name="{{ $member['name'] }}"
                    role="{{ $member['role'] }}"
                    theme="{{ $theme }}"
                    avatar="{{ $avatars[$loop->index] ?? '👤' }}"
                    description="Bergabung sejak 2024 dan berkontribusi dalam pengembangan." />
            @endforeach
        </div>
    </div>
</div>
@endsection
