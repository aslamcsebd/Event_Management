<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
        </h2>
    </x-slot>
    @if ($errors)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger text-center alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong class="text-light">{{ $error }}</strong>
            </div>
        @endforeach
    @endif

    @foreach (['success', 'danger', 'warning', 'info'] as $alert)
        @if ($message = Session::get($alert))
            <div class="alert alert-{{ $alert }} text-center alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong class="">{{ $message }}</strong>
            </div>
        @endif
    @endforeach

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button class="btn btn-sm btn-primary text-light mb-2" data-toggle="modal"
                        data-original-title="test" data-target="#addEvent">
                        + Add new event
                    </button>

                    <table class="table table-bordered">
                        <thead class="bg-info text-light">
                            <tr>
                                <th width="5%">Sl</th>
                                <th>title</th>
                                <th>description</th>
                                <th>date</th>
                                <th>location</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['title'] }}</td>
                                    <td>{{ $item['description'] }}</td>
                                    <td>{{ $date = $item['date'] }}</td>
                                    <td>{{ $item['location'] }}</td>
                                    <td width="auto">
                                        <a href="{{ route('view_event', $item['id']) }}" class="btn btn-sm btn-outline-primary">View</a>
                                        <a href="{{ route('edit_event', $item['id']) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <a href="{{ route('delete_event', $item['id']) }}" class="btn btn-sm btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="timeline"></div>

    <div class="modal fade" id="addEvent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h6 class="modal-title text-center" id="exampleModalLabel">Add new event</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('add_event') }}" method="post" enctype="multipart/form-data"
                        class="needs-validation">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title*</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Event title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description*</label>
                            <input type="text" name="description" class="form-control" id="description"
                                placeholder="Event description" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date*</label>
                            <input type="date" name="date" class="form-control" id="date"
                                placeholder="Event date" required>
                        </div>
                        <div class="form-group">
                            <label for="location">location*</label>
                            <input type="text" name="location" class="form-control" id="location"
                                placeholder="Event location" required>
                        </div>
                        <div class="modal-footer justify-content-between p-1">
                            <button class="btn btn-secondary px-4" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-success px-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
