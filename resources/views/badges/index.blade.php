<x-layout.app>
    @push('title', 'Badges')

    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h3 class="text-dark mb-4">Badge Management</h3>

            @if(hasPermission('write_article'))
                <a href="{{ route('badges.create') }}">
                    <button class="btn btn-primary d-flex align-self-start">Add badge</button>
                </a>
            @endif
        </div>

        <x-messages.flash-messages/>

        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">User List</p>
            </div>
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                        <tr>
                            <th>Badge</th>
                            <th>Code</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($badges as $badge)
                            <tr>
                                <td><img src="https://cdn.habbis.nl/c_images/badges/{{ $badge }}"></td>
                                <td>{{ str_replace('.gif','', $badge) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    {{ $badges->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
