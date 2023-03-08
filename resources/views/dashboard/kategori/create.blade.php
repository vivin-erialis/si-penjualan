@extends ('dashboard.layouts.main')
@section ('container')
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-warning rounded h-100 p-4">
                            <h6 class="mb-4">Form Add kategori</h6>
                            <form action="/kategori/{{ $kategori->id }}" method="POST">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">KODE</label>
                                    <input type="email" class="form-control @error('kode') is-invalid @enderror" id="kode" name="kode">
                                </div>
                                @error('kode')
					            {{ $message }}
				                @enderror

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">NAMA SPESIALIS </label>
                                    <input type="password" class="form-control" id="nama" name="nama">
                                </div>
                                @error('nama')
					            {{ $message }}
				                @enderror
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
</div>
@endsection