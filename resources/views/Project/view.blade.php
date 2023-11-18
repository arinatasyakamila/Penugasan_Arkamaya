@extends('layouts.index')
@section('content')
    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">View Data Client</h3>
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

        <!-- Filter Section -->
        <!-- ... (your existing filter code) ... -->


        <!-- Table Section -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4 text-center">Data Barang</h4>
                    <div class="table-responsive">
                        <form action="{{ url('/process-form') }}" method="post">
                            @csrf
                            <table class="table text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Select</th>
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
                                            <td>
                                                <a href="/project/{{ $tb_m_project->id }}/edit">Edit</a>
                                            </td>

                                            <td>{{ $tb_m_project->id }}</td>
                                            <td>{{ $tb_m_project->project_name }}</td>
                                            <td>{{ $tb_m_project->client_id }}</td>
                                            <td>{{ $tb_m_project->project_start }}</td>
                                            <td>{{ $tb_m_project->project_end }}</td>
                                            <td>{{ $tb_m_project->project_status }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Add a submit button for the form -->
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
