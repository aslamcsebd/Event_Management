<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">  
                    <h3 class="text-center">Event full view</h3>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td wideth="10%" class="text-right pr-2"><b>Title: </b></td>
                                <td width="80%" class="text-left pl-3">{{ $data->title }}</td>
                            </tr>
                            <tr>
                                <td wideth="10%" class="text-right pr-2"><b>description: </b></td>
                                <td width="80%" class="text-left pl-3">{{ $data->description }}</td>
                            </tr>
                            <tr>
                                <td wideth="10%" class="text-right pr-2"><b>date: </b></td>
                                <td width="80%" class="text-left pl-3">{{ $data->date }}</td>
                            </tr>
                            <tr>
                                <td wideth="10%" class="text-right pr-2"><b>location: </b></td>
                                <td width="80%" class="text-left pl-3">{{ $data->location }}</td>
                            </tr>
                        </tbody>            
                    </table>
                    <a href="{{route('dashboard')}}" class="btn btn-info px-3 mt-2">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>