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
                        <th style="padding: 10px; color: white;">Customer name</th>
                        <th style="padding: 10px; color: white;">Email</th>
                        <th style="padding: 10px; color: white;">Phone</th>
                        <th style="padding: 10px; color: white;">Doctor name</th>
                        <th style="padding: 10px; color: white;">Date</th>
                        <th style="padding: 10px; color: white;">Message</th>
                        <th style="padding: 10px; color: white;">Status</th>
                        <th style="padding: 10px; color: white;">Approve</th>
                        <th style="padding: 10px; color: white;">Cancal</th>
                    </tr>

                    @foreach ($data as $appoints)
                        
                  
                    <tr align="center">
                        <td>{{$appoints->name}}</td>
                        <td>{{$appoints->email}}</td>
                        <td>{{$appoints->phone}}</td>
                        <td>{{$appoints->doctor}}</td>
                        <td>{{$appoints->date}}</td>
                        <td>{{$appoints->message}}</td>
                        <td>{{$appoints->status}}</td>
                        <td><a href="{{url('approved', $appoints->id)}}" class="btn btn-success">Approved</a></td>
                        <td><a href="{{url('canceled', $appoints->id)}}" class="btn btn-danger">Cancal</a></td>
                    </tr>

                    @endforeach
                </table>
            </div>

        </div>
        @include('admin.script')
    </div>
</body>

</html>
