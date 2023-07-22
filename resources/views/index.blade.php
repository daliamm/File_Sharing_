<!DOCTYPE html>
<html>

<head>
    <title>File Sharing App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center" style="height: 100vh;">
    <div class="container mt-5">
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">

                    <div class="col-lg-4">
                        <a href="{{route('file.upload')}}" class="btn btn-primary"
                            style="padding-left: 2rem;padding-right: 2rem;background-color: rgba(107,87,139,0.58);margin-left: 90px; color:#ffffff ; font-weight:500;">
                            <i class="fas fa-plus" style='color:rgba(255,255,255,255)'></i> Add File

                        </a>
                    </div>

                    <div class="col-lg-8">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type of file</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <td>{{$file->name}}</td>
                                    <td>{{$file->extension}} File</td>
                                    <td>
                                        <a href="{{ route('file.download', ['link' => $file->download_link]) }}"
                                            class="btn btn-sm btn-clean btn-icon">

                                            <p style='color:rgba(107,87,139,0.58)'>Download</p>

                                        </a>
                                        <button class="btn btn-sm btn-clean btn-icon"
                                            onclick="copyToClipboard('{{ route('file.download', ['link' => $file->download_link]) }}')">
                                            <p style='color:rgba(107,87,139,0.58)'>Copy</p>
                                        </button>
                                        <button class="btn btn-sm btn-clean btn-icon" onclick="deleteFile('{{ $file->id }}')">
                                    <i class="fas fa-trash-alt" style='color:rgba(107,87,139,0.58)'></i>
                                </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script>
    function copyToClipboard(text) {
        var tempInput = document.createElement('input');
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        Swal.fire({
            icon: 'success',
            title: 'Link Copied!',
        });
    }
    function deleteFile(fileId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this file!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
            }
        });
    }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>