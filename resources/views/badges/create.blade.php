<x-layout.app>
    @push('title', 'Add badge')

    <div class="container-fluid">
        <h3 class="text-dark mb-4">Add badge</h3>
        <x-messages.flash-messages />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('badges.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="gifFile">Select a file to upload:</label>
                        <input type="file" class="form-control-file" id="gifFile" name="gifFile">
                        <label for="code">Badge code:</label>
                        <x-form.input name="code" placeholder="Enter badge code"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</x-layout.app>
