<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="container">
                <div class="row">
                  <h1>Halaman category</h1>

                  <!-- alert -->
                  @if(session('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                  @endif

                  <div class="col-md-8">
                    <div class="table-responsive">

                      <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Created At</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php($i = 1)
                          @foreach($categories as $row)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->category_name }}</td>
                            @if($row->created_at == NULL)
                              <td>-</td>
                            @else
                              <td>{{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}</td>
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                    </div>
                  </div>

                  <div class="col-md-4">
                    <h5>Add Category</h5>
                    <form action="{{ route('store.category') }}" method="post">
                      <!-- csrf token -->
                      @csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="category" autocomplete="off">
                        <!-- error -->
                        @error('category')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>
