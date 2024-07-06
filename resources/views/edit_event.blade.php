<x-app-layout>
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
                    <h3 class="text-center">Event full edit</h3>
                    <form action="{{ route('update_event') }}" method="post" enctype="multipart/form-data" class="needs-validation">
                        @csrf
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td wideth="10%" class="text-right pr-2"><b>Title: </b></td>
                                    <td width="80%" class="text-left pl-3">
                                        <input type="hidden" name="id" value="{{ $data->id }}">                                 
                                        <input type="text" name="title" class="form-control" id="title" value="{{ $data->title }}" placeholder="Event title" required>                                 
                                    </td>
                                </tr>
                                <tr>
                                    <td wideth="10%" class="text-right pr-2"><b>description: </b></td>
                                    <td width="80%" class="text-left pl-3">
                                        <input type="text" name="description" class="form-control" id="description" value="{{ $data->description }}" placeholder="Event description" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td wideth="10%" class="text-right pr-2"><b>date: </b></td>
                                    <td width="80%" class="text-left pl-3">                                        
                                        <input type="date" name="date" class="form-control" id="date" value="{{ $data->date }}" placeholder="Event date" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td wideth="10%" class="text-right pr-2"><b>location: </b></td>
                                    <td width="80%" class="text-left pl-3">
                                        <input type="text" name="location" class="form-control" id="location" value="{{ $data->location }}" placeholder="Event location" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-success px-4 mt-2 float-right">Save</button>
                    </form>          
                    <a href="{{route('dashboard')}}" class="btn btn-info px-3 mt-2">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>