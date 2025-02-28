<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">

    <style>
        label{
            display: inline-block;
            width: 200px;
        }
    </style>

    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.navbar')
        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center" style="padding:100px;">
                <form action="{{url('editdoctor', $data->id)}}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div style="padding: 15px;">
                        <label for="">Doctor Name</label>
                        <input type="text" style="black" value="{{$data->name}}" name="name">
                    </div>

                    <div style="padding: 15px;">
                        <label for="">Phone</label>
                        <input type="text" style="black" value="{{$data->phone}}" name="phone">
                    </div>

                    <div style="padding: 15px;">
                        <label for="">Speciality</label>
                        <input type="text" style="black" value="{{$data->speciality}}" name="speciality">
                    </div>

                    <div style="padding: 15px;">
                        <label for="">Room No</label>
                        <input type="text" style="black" value="{{$data->room}}" name="room">
                    </div>

                    <div style="padding: 15px;">
                        <label for="">Old Image</label>
                        <img height="150" width="150" src="docorimage/{{$data->image}}" alt="">
                    </div>

                    <div style="padding: 15px;">
                        <label for="">Change Image</label>
                        <input type="file" name="image">
                    </div>

                    <div style="padding: 15px;">
                        <input type="submit" class="btn btn-primary">
                    </div>

                </form>

            </div>
            
        </div>
        @include('admin.script')
    </div>
</body>

</html>
