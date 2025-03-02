<!-- resources/views/admin/view-clouser-details.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clouser Details</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    h1,
    h3 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-image: linear-gradient(#1141d6, #335ad4 50%, #607fe0);
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .button-link {
        display: inline-block;
        padding: 10px 20px;
        background-image: linear-gradient(#7787b8, #2f468f 50%, #02103d);
        color: white;
        text-align: center;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s ease;
        margin-bottom: 20px;
    }

    .button-link:hover {
        background-color: #66bfe8;
    }

    .action-links a {
        color: #4A90E2;
        text-decoration: none;
        margin-right: 10px;
    }

    .action-links a:hover {
        text-decoration: underline;
    }

    .no-records {
        text-align: center;
        color: #777;
        font-style: italic;
        margin-top: 20px;
    }
    </style>
</head>

<body>

    <h1 align="center">Clouser Details</h1>


    <a href="{{ route('go_Adminclouseradd') }}" class="button-link">Add Closures</a></br>





    @if($admins->isNotEmpty())
    <h3>Admin Clousers</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Clouser ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Clouser Type</th>
                <th>Amount</th>
                <th>Location</th>
                <!-- <th>Number Of Location</th>
                <th>Connection Type</th> -->
                <th>Message</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $clouser)
            <tr>
                <td>{{ $clouser->date_time }}</td>
                <td>{{ $clouser->clouser_ID }}</td>
                <td>{{ $clouser->service_id }}</td>
                <td>{{ $clouser->name }}</td>
                <td>{{ $clouser->category }}</td>
                <td>{{ $clouser->clouser_type }}</td>
                <td>{{ rtrim(rtrim(number_format($clouser->clouser_amount, 2, '.', ''), '0'), '.') }}</td>
                <td>{{ $clouser->location }}</td>
                <!-- <td>{{ $clouser->nooflocation }}</td>
                    <td>{{ $clouser->connectiontype }}</td> -->
                <td>{{ $clouser->message }}</td>
                <td class="action-links">
                    <a href="{{ url('clouser-edit', $clouser->id) }}">Update</a>
                </td>
                <td class="action-links">
                    <a onclick="deleteSubmit(event)" href="{{ url('clouser-delete', $clouser->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="no-records">No closure records found for Admins.</p>
    @endif

    @if($technicians->isNotEmpty())
    <h3>Technician Clousers</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Clouser ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Clouser Type</th>
                <th>Amount</th>
                <th>Location</th>
                <th>Number Of Location</th>
                <th>Connection Type</th>
                <th>Message</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($technicians as $clouser)
            <tr>
                <td>{{ $clouser->date_time }}</td>
                <td>{{ $clouser->clouser_ID }}</td>
                <td>{{ $clouser->service_id }}</td>
                <td>{{ $clouser->name }}</td>
                <td>{{ $clouser->category }}</td>
                <td>{{ $clouser->clouser_type }}</td>
                <td>{{ rtrim(rtrim(number_format($clouser->clouser_amount, 2, '.', ''), '0'), '.') }}</td>
                <td>{{ $clouser->location }}</td>
                <td>{{ rtrim(rtrim(number_format($clouser->nooflocation, 2, '.', ''), '0'), '.') }}</td>
                <td>{{ $clouser->connectiontype }}</td>
                <td>{{ $clouser->message }}</td>
                <td class="action-links">
                    <a href="{{ url('clouser-edit', $clouser->id) }}">Update</a>
                </td>
                <td class="action-links">
                    <a onclick="deleteSubmit(event)" href="{{ url('clouser-delete', $clouser->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="no-records">No clouser records found for Technicians.</p>
    @endif






    {{-- <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Clouser ID</th>
                <th>User ID</th>
                <th>Category</th>
                <th>Clouser Type</th>
                <th>Amount</th>
                <th>Location</th>
                <th>Number Of Location</th>
                <th>Connection Type</th>
                <th>Message</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($clousers->isEmpty()) <!-- Check if the $clousers collection is empty -->
                <tr>
                    <td colspan="8">No Clouser records found.</td>
                </tr>
            @elseif ($clousers->users->userType == 'admin')
                @foreach($clousers as $clouser) <!-- Loop through the $clousers collection -->
                <tr>
                    <td>{{ $clouser->date_time }}</td>
    <td>{{ $clouser->clouser_ID }}</td>
    <td>{{ $clouser->service_id }}</td>
    <td>{{ $clouser->category }}</td>
    <td>{{ $clouser->clouser_type }}</td>
    <td>{{ $clouser->clouser_amount }}</td>
    <td>{{ $clouser->location }}</td>
    <td>{{ $clouser->nooflocation }}</td>
    <td>{{ $clouser->connectiontype }}</td>
    <td>{{ $clouser->message }}</td>


    <td><a href="{{ url('clouser-edit',$clouser->id)}}">Update</a></td>
    <td><a onclick="deleteSubmit(event)" href="{{ url('clouser-delete',$clouser->id)}}">Delete</a></td>
    </tr>
    @endforeach
    @endif
    </tbody>
    </table> --}}





    <script>
    function deleteSubmit(event) {

        event.preventDefault();


        const urlLink = event.currentTarget.getAttribute('href');

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this project!",
            icon: "warning",
            buttons: true,
            dangerMode: true,


        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = urlLink;
            }
        });
    }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>