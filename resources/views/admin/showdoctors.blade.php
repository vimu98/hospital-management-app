<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">

            <div align="center" style="padding-top: 100px">
                <table style="background-color: black">
                    <tr align="center">
                        <th style="padding: 10px; color: white;">Doctor name</th>
                        <th style="padding: 10px; color: white;">Phone</th>
                        <th style="padding: 10px; color: white;">Speciality</th>
                        <th style="padding: 10px; color: white;">Room No</th>
                        <th style="padding: 10px; color: white;">Image</th>
                    </tr>

                    @foreach ($data as $doctors)
                        
                  
                    <tr align="center">
                        <td>{{$doctors->name}}</td>
                        <td>{{$doctors->phone}}</td>
                        <td>{{$doctors->speciality}}</td>
                        <td>{{$doctors->room}}</td>
                        <td><img height="100" width="100" src="docorimage/{{$doctors->image}}" alt=""></td>
                        <td><a href="{{url('updatedoctor', $doctors->id)}}" class="btn btn-success">Update</a></td>
                        <td><a onclick="return confirm('Are you sure to delete this?')" href="{{url('deletedoctor', $doctors->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>

                    @endforeach
                </table>
            </div>

        </div>
        @include('admin.script')
    </div>
</body>

</html>
