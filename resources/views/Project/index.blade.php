@extends('layouts.index')
@section('content')
    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">Data Project</h3>
        </div>
    </div>
    @if (session('success'))
        <div class="w-50 mx-auto mt-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Info</strong> {{ session('success') }}
            </div>
        </div>
    @endif


    <div class="row container mx-auto my-5">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body px-0 overflow-auto">
                    <div class="d-flex">
                        <div class="mt-8">
                            <label for="filter">Filter</label>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="/project" method="get">
                                    <div class="form-group">
                                        <label for="keyword">Project Name</label>
                                        <input type="text" name="keyword" value="{{ request('keyword') }}"
                                            class="form-control" placeholder="Search">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="/project" method="get">
                                    <div class="form-group">
                                        <label for="client">Client</label>
                                        <select id="client" name="pilclient" class="form-control">
                                            <option value="">All Client</option>
                                            @foreach ($tb_m_clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form action="/proses-form" method="post">
                                    <h6>Status</h6>
                                    <select name="project_status" id="project_status" class="form-control">
                                        <option value="">All Status</option>
                                        <option value="Open" {{ old('project_status') == 'Open' ? 'selected' : '' }}>Open
                                        </option>
                                        <option value="Doing" {{ old('project_status') == 'Doing' ? 'selected' : '' }}>
                                            Doing
                                        </option>
                                        <option value="Done" {{ old('project_status') == 'Done' ? 'selected' : '' }}>Done
                                        </option>
                                        <!-- Tambahkan lebih banyak opsi sesuai kebutuhan -->
                                    </select>
                                </form>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm ml-3 btn-info">Search</button>
                            <a href="" class="btn btn-sm ml-3 btn-info">Clear</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body px-0 overflow-auto">
                    <div class="table-responsive">
                        <form action="{{ route('project.deleteSelected') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <a href="/project/create" class="btn btn-sm ml-3 btn-info ">New</a>
                                <button type="submit" class="btn btn-sm ml-3 btn-info ">Delete Selected</button>
                            </div>
                            <table class="table text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>No</th>
                                        <th>Action</th>
                                        <th>Project Id</th>
                                        <th>Project Name</th>
                                        <th>Client</th>
                                        <th>Project Start</th>
                                        <th>Project End</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tb_m_projects as $tb_m_project)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="selected_projects[]"
                                                    value="{{ $tb_m_project->id }}">
                                            </td>
                                            <td>{{ $loop->iteration + ($filteredProjects->perPage() * ($filteredProjects->currentPage() - 1)) }}</td>

                                            <td>
                                                <a href="/project/{{ $tb_m_project->id }}/edit">Edit</a>
                                            </td>
                                            <td>{{ $tb_m_project->id }}</td>
                                            <td>{{ $tb_m_project->project_name }}</td>
                                            <td>{{ $tb_m_project->client ? $tb_m_project->client->client_name : 'Nama Client telah dihapus' }}
                                            </td>
                                            <td>{{ $tb_m_project->project_start }}</td>
                                            <td>{{ $tb_m_project->project_end }}</td>
                                            <td>{{ $tb_m_project->project_status }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Menampilkan link pagination -->
                            <div class="mt-2">
                                {{ $filteredProjects->links() }}
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Check/uncheck all checkboxes
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.getElementsByName('selected_projects[]');
            for (let checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });

        // Confirm deletion when the Delete Selected button is clicked
        document.getElementById('deleteSelectedBtn').addEventListener('click', function() {
            return confirm('Are you sure you want to delete the selected projects?');
        });

        // Trigger form submission when the Delete button is clicked
        document.getElementById('deleteSelected').addEventListener('click', function() {
            document.getElementById('deleteForm').submit();
        });
    </script>
@endsection
