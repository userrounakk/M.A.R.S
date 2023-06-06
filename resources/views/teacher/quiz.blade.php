@extends('teacher.layout')

@section('quiz')
    active
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>Quiz Datatable</h5>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#question">Add Quiz</button>
                    <div class="modal container-fluid" id="question">
                        <div class="modal-dialog">
                            <form action="/quiz" method="POST">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">Add a Quiz</h2>
                                        <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-dark">

                                        @csrf
                                        <div class="h6"><label for="sub" class="form-label ">Subject</label></div>
                                        <input type="text" id="sub" class="form-control mb-3" name="title">
                                        <div class="h6"><label for="description" class="form-label ">Description</label>
                                        </div>
                                        <input type="text" id="description" class="form-control mb-3" name="description">
                                        <div class="h6"><label for="type" class="form-label ">Status</label></div>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="type">
                                                <option value="objective" selected>Objective</option>
                                                <option value="subjective">Subjective</option>
                                            </select>
                                        </fieldset>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive-lg">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quizes as $quiz)
                            <tr>
                                <td>{{ $quiz->id }}</td>
                                <td>{{ $quiz->title }}</td>
                                <td>{{ $quiz->description }}</td>
                                <td>{{ $quiz->type }}</td>
                                <td>
                                    @if ($quiz->status == 'completed')
                                        <span class="badge bg-success">Completed</span>
                                    @elseif($quiz->status == 'draft')
                                        <span class="badge bg-danger">Draft</span>
                                    @else
                                        <span class="badge bg-warning">Published</span>
                                    @endif
                                    {{-- <span class="badge bg-success">Active</span> --}}
                                </td>
                                <td class="align-middle">
                                    <button class="btn btn-outline-warning btn-sm mt-1" data-bs-toggle="modal"
                                        data-bs-target="#edit-{{ $quiz->id }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <form class='d-inline' action="/quiz/{{ $quiz->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-sm mt-1 btn-outline-danger btn"
                                            onclick="return confirm('Are you sure you want to remove {{ $quiz->title }}?')"><i
                                                class="bi bi-trash"></i></i></button>
                                    </form>
                                </td>
                            </tr>
                            <div class="modal container-fluid" id="edit-{{ $quiz->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title">Add a Quiz</h2>
                                            <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <form>
                                                <div class="h6"><label for="sub"
                                                        class="form-label ">Subject</label>
                                                </div>
                                                <input type="text" id="sub" class="form-control mb-3"
                                                    name="title" value="{{ $quiz->title }}">
                                                <div class="h6"><label for="description"
                                                        class="form-label ">Description</label></div>
                                                <input type="text" id="description" class="form-control mb-3"
                                                    name="description" value="{{ $quiz->description }}">
                                                <div class="h6"><label for="type" class="form-label">Quiz
                                                        type</label></div>
                                                <fieldset class="form-group mb-3">
                                                    <select class="form-select" id="basicSelect">
                                                        <option @if ($quiz->type == 'objective') 'selected' @endif>
                                                            Objective</option>
                                                        <option @if ($quiz->type == 'subjective') 'selected' @endif>
                                                            Subjective
                                                        </option>
                                                    </select>
                                                </fieldset>
                                                <div class="h6"><label for="type" class="form-label">Quiz
                                                        type</label></div>
                                                <fieldset class="form-group mb-3">
                                                    <select class="form-select" id="basicEdit">
                                                        <option value="completed"
                                                            @if ($quiz->status == 'completed') 'selected' @endif>
                                                            Completed</option>
                                                        <option value="draft"
                                                            @if ($quiz->status == 'draft') 'selected' @endif>
                                                            Draft</option>
                                                        <option value="published"
                                                            @if ($quiz->status == 'published') 'selected' @endif>
                                                            Published</option>

                                                    </select>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
