@extends('layouts.app')

@section('title', '社交購物商場')

@section('content')
    <div class="container mx-auto py-8">
        <div class="max-w-2xl mx-auto">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Show error message -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                {{$A=false}}
            @if ($markets!=null)
                    @foreach($markets as $market)
                        @if ($market->seller_id == $seller->id)
                            {{$A=true}}
                <h1>賣場</h1>
                <p>這是你的賣場內容。</p>
                       <div class="card-body">
                        <form method="POST" action="{{ route('market.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('賣場名稱') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" name="name" value="{{ $market->name }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('賣場描述') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" name="contact" value="{{ $market->description }}" required autocomplete="contact">

                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('修改') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                        @endif
                    @endforeach
            @else
                <p>你尚未建立賣場。</p>
                <div class="mt-4 flex items-center justify-end gap-x-4">
                    <form action="{{ route('market.create') }}">
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">建立賣場</button>
                    </form>
                </div>
            @endif
                @if($A!=true)
                    <p>你尚未建立賣場。</p>
                    <div class="mt-4 flex items-center justify-end gap-x-4">
                        <form action="{{ route('market.create') }}">
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">建立賣場</button>
                        </form>
                    </div>
                @endif
        </div>
    </div>
@endsection
