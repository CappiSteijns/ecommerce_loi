<!-- Hier tonen we de categorieën van de website. -->
@extends('frontend.main_master')

@section('content')

<style>
    .categories-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        padding: 40px;
        max-width: 1400px;
        margin: auto;
    }

    .category-card {
        border: 3px solid #bbb;
        border-radius: 15px;
        text-align: center;
        padding: 25px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #f3f3f3;
        font-size: 20px;
    }

    .category-card:hover {
        transform: translateY(-7px);
        box-shadow: 0px 7px 20px rgba(0, 0, 0, 0.2);
        background-color: #fff;
    }

    .category-card img {
        max-width: 150px;
        height: auto;
        margin-bottom: 15px;
    }

    .category-card h5 {
        font-size: 18px;
        color: #222;
        margin: 0;
        font-weight: bold;
    }

    @media (max-width: 1200px) {
        .categories-container {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .categories-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .categories-container {
            grid-template-columns: repeat(1, 1fr);
        }
    }
</style>

<div class="categories-container">
    @foreach($categories as $category)
    <a href="{{ route('category.products', $category->id) }}" class="category-card">
        <img src="{{ asset('frontend/assets/images/category-icons/' . $category->category_icon) }}" alt="">
        <h5>{{ $category->category_name_en }}</h5> 
    </a>
    @endforeach
</div>
@endsection
